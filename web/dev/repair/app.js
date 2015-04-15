var path = require('path')
var events = require('events');
var mongo = require('mongodb').MongoClient;
var exec = require('child_process').exec, child;

config = {
    user: 'sa',
    password: '123@123a',
    server: '10.240.212.18',
    database: 'TBFLive',
    options: {
    }
}

config = {
    user: 'crm',
    password: '123@123a',
    //server: '10.240.212.18',
    server: '90.0.0.12',
    database: 'TBF2013',
    options: {
    }
}

var db = {}
var sql = require('mssql');
var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var process = new events.EventEmitter();
var thread = new events.EventEmitter();
var job_bill = [];
var users = [];
var process_queue = [];
var process_complete = [];
var thread_queue = [];
var progress = {}

server.listen(1234);

app.get('/', function (req, res) {
    res.sendfile(__dirname + '/app/index.html');
});

function trickDone() {
    jobqueue = db.doc.collection('jobqueue')
    jobqueue.find({status: {'$ne': true }}).toArray(function(err, jobs) {
        for (i in jobs) {
            job = jobs[i]
            jobqueue.update({_id : job._id},{$set : {status:true}}, function(err, result) {
                if (i == jobs.length - 1) {
                    db.socket.emit('done', {});
                }
            })
        }
    })
}

function callbackItem(data) {

    db.socket.emit('thread', {
        id: data.process_id,
        percent: Math.round((data.current / data.cmds.length) * 100)
    })

    db.socket.emit('progress', {
        percent: Math.round(( progress.count / progress.total) * 100)
    })

    user = db.doc.collection('users')
    users_old = db.doc.collection('users_old')
    billinfos = db.doc.collection('aevitaslog')

    ccode = data.cmds[0].ccode
    ccode = ccode.substring(1)
    ccode = ccode.toString()

    user.find({CCode : ccode}).toArray(function(err, users) {

        if(users.length==0)
            return

        totalpayment_bill=0

        info = users[0]

        var bill_filter_options = {
            "sort":[['totalPayment','desc']]
        }

        bills = billinfos.find({'user.$id':info._id},bill_filter_options).toArray(function(err,bills){

            billinfo = null

            data.totalPayment = 0

            if (bills.length>0)
                billinfo = bills[0]

            if (billinfo != null && billinfo.totalPayment!=='undefined')
                data.totalPayment=billinfo.totalPayment
            users_old.find({CCode : ccode}).toArray(function(err, users_2) {
                users_2_0 = users_2[0]
                

                data.point = 0
                data.old_level = ''

                if (users_2_0 != null) {
                    data.point = users_2_0.point
                    data.old_level = users_2_0.level
                    if (data.old_level == 1) {
                        data.old_level = 'Silver'
                    } else
                    if (data.old_level == 2) {
                        data.old_level = 'Gold'
                    } else
                    if (data.old_level == 3) {
                        data.old_level = 'Platinum'
                    }
                }

                data.dob = "";

                if (info.dob != null&& info.dob!='') {
                    date = info.dob
                    if(date instanceof Date)
                    {
                        //date = date_str.substring(0, 10);
                        //dob = date[2] + "/" + date[1] + "/" + date[0];
                        month = date.getMonth() + 1
                        data.dob = month + "/" + date.getDate() + "/" + date.getFullYear();
                    }else
                        data.dob=date
                
                }

                //dob = (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear();

                db.socket.emit('point', {
                    id: data.process_id,
                    points: info.point,
                    level: (info.level==1)?'Silver':
                                                    (
                                                        (info.level==2)?'Gold':
                                                                                (
                                                                                    (info.level==3)?'Platinum':'Undefined'
                                                                                )
                                                    ),
                    totalpayment: data.totalPayment,
                    oldpoint: data.point,
                    birthday: data.dob,
                    old_level: data.old_level
                })
            })
        })

    })

    if (data.current <= data.cmds.length) {
        data.current += 1
        progress.count+=1

        thread.emit('thread_item', {
            process_id: data.process_id,
            current: data.current,
            cmds: data.cmds,
            max: data.max
        })
    }
}

// Continous command
thread.on('thread_item', function(data) {

    // STOP OVER
    if (data.current == data.cmds.length + 1) {
        process_complete[data.process_id] = true;

        var flag = true;

        // Check all
        for (i in process_complete) {
            if (i == 0) continue
            per_process = process_complete[i]
            if (!per_process) {
                flag = false;
                break;
            }
        }

        if (flag) {
            //trickDone();
            db.socket.emit('done', {});
        }

        if (db.current_process <= process_queue.length + 1) {
            return process.emit('process', {
                process_id: db.current_process++,
                max: data.max
            });
        }
    }

    if (data.current > data.cmds.length) {
        return;
    }

    current = data.current
    cmd = data.cmds[current - 1].process_cmd
    data.job_id = data.cmds[current - 1].job_id

    exec(cmd, function(err, stdout, stderr) {

        if (err) {
            jobqueue = db.doc.collection('jobqueue')
            jobqueue.update({_id : data.job_id},{$set : {status:true}}, function(err, jobs) {
                if (i == jobs.length - 1) {
                    db.socket.emit('done', {});
                }
                callbackItem(data)
            })
        } else {
            callbackItem(data)
        }
    })
})

thread.on('thread', function(data) {
    thread.emit('thread_item', {
        job_id: data.job_id,
        process_id: data.process_id,
        current: 1,
        cmds: data.cmds,
        max: data.max
    })
})

process.on('process', function(data) {

    if (data.process_id >= process_queue.length + 1) {
        return;
    }

    partyID = process_queue[data.process_id - 1]
    bills = users[partyID]
    cmds = []

    for (var i in bills) {

        bill = bills[i]
        app_root = path.resolve(__dirname + '/../../../')
        cmd =  'php ' + app_root + '/app/console crm:processbill '
        cmd += ' --ledgerid=' + bill.ledgerID + ' '
        cmd += ' --billidno=' + bill.Billidno + ' '
        cmd += ' --env=prod'

        cmds.push({
            job_id: bill.job_id,
            process_cmd: cmd,
            ccode: partyID
        })

    }

    data.name = bills[0]['PartyName']
    data.account = partyID

    // Send process to client
    db.socket.emit('process', {
        id: data.process_id,
        name : data.name,
        account: data.account.substring(1),
        process_id : i,
        process_name : 'Process ' + i,
        process_percent : i*10
    });

    // Start one thread per process
    thread.emit('thread', {
        process_id: data.process_id,
        cmds: cmds,
        max: data.max
    })
})

function drop(db, callback) {
	var c_users = db.collection('users');
    var c_jobqueue = db.collection('jobqueue');
    var c_aevitaslog = db.collection('aevitaslog');
    callback();
}

function start_process(num) {
    db.current_process = 1;

    for (var i = 0; i <= process_queue.length; i++) {
        process_complete[i] = false;
    }

    for (var i = 0; i < num; i++) {
        process.emit('process', {
            process_id: db.current_process++,
            max: num
        })
    }
}

function search_bill(db, callback) {
    jobqueue = db.collection('jobqueue')
    jobqueue.find({status: {'$ne': true}}, function(err, jobs) {
        jobs.each(function(err, job) {
            job_bill.push(job)
        })
    })
}

function queue_bill(bill) {
    db.collection('jobqueue')
}

function process_bill(results) {

    job_bill = [];
    users = [];
    process_queue = [];
    thread_queue = [];

    progress.total = results.length
    progress.count = 0
    console.log("TOTAL = " +progress.total)

    for (i in results) {

        bill = results[i];
        key = '_' + bill.PartyID;

        if (users[key] === undefined) {
            users[key] = [];
        }

        //queue_bill(bill);
        users[key].push(bill);
    }

    // Order bill by date for every user
    for (i in users) {
        users[i].sort(sortF);
        process_queue.push(i);
    }

    db.current_process = 1;
    start_process(50);
}

function sortF(a, b) {
    var dateA = new Date(a.BillDate).getTime();
    var dateB = new Date(b.BillDate).getTime();
    return dateA > dateB ? 1 : -1;
};

var connection = new sql.Connection(config, function(err) {
    db.sql = new sql.Request(connection);
});

start = function() {
    app_root = path.resolve(__dirname + '/../../../')
    cmd =  'php ' + app_root + '/app/console crm:syncbill '
    cmd += ' --env=prod'

    exec(cmd, function(err, stdout, stderr) {
        repair();
    })
}

repair = function() {

    var results = []

    // Scan in job queue
    jobqueue = db.doc.collection('jobqueue')

    jobqueue.find({status: {'$ne': true }}).toArray(function(err, jobs) {
        
        for (i in jobs) {
            job = jobs[i]
            data = JSON.parse(job.data)
            results.push({
                job_id: job._id,
                PartyID: data.PartyID,
                PartyName: data.PartyName,
                ledgerID: data.ledgerID,
                Billidno: data.Billidno
            })
        }

        process_bill(results)
    })
}

stop = function() {

}

mongo.connect('mongodb://127.0.0.1:27017/levis_20', function(err, doc) {
    if(err) throw err;
    db.doc = doc
});

io.on('connection', function (socket) {

    db.socket = socket

  	socket.on('start', function(data) {
        start()
   	})

    socket.on('repair', function(data) {
        repair()
        //trickDone();
    })

  	socket.on('stop', function() {
        stop()
  	})
});

require('daemon')();
