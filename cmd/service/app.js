var exec = require('child_process').exec, child;

function run(cmd, callback) {
//set max buffer size to 500kb
	child=exec(cmd,{maxBuffer:1024*500}, callback);
}

var times = 0;

var root = '/var/www/html/levis-crm';

/*
*this function will run per minutes, the time will increase and when it multiply of 120
* which mean schedule for 2 hours it will run search bill and process it.
*/
setInterval(function() {

	times++;
	// if(times==2) {
	if (times % 120 == 0) { // 240
		console.log('------------START SCANNING--------------');
		console.log(times);
		run(root+'/cmd/search_bill.sh', function (error, stdout, stderr)  {
		console.log(root+'/cmd/search_bill.sh');	
                       run(root + '/cmd/process_bill.sh', function 
(error, 
stdout, stderr)  
{
console.log(stdout);console.log(error);
				run("sh -c 'echo 1 >/proc/sys/vm/drop_caches'",function (error, stdout, stderr)  {
					// Free memory
				});
			});
		});
	}

	run(root + '/cmd/process_email.sh', function (error, stdout, stderr) {
		run("sh -c 'echo 1 >/proc/sys/vm/drop_caches'",function (error, stdout, stderr)  {
			// Free memory
		});
	});

}, 1000*60);

require('daemon')();
