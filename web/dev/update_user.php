<?php
/*
- PREPARE
 	- FIRST NAME
 	- MIDDLE NAME
 	- LAST NAME
 	- GENDER
 	- EMAIL
*/

include __DIR__ . '/app.php';
$time = time();

// CLONE FROM users_old TO users
//echo "<p> START CLONE users_old TO users</p>";

/*system('rm -rf /tmp/users.json');
system('mongoexport --db levis_release --collection users_old --out /tmp/users.json > /dev/null');
system('mongoimport --db levis_release --collection users --file /tmp/users.json --upsert > /dev/null');
system('rm -rf /tmp/users.json');

echo "<p>DONE CLONE</p>";
echo "<p>START PREPAIRING ... </p>";*/


$col_old = $mongo->$db->users_old;
$col_new = $mongo->$db->users;

$users = $col_old->find();

foreach ($users as $user) {

	// Update missing fields for user information
	$code = $user['CCode'];
	$cmd = "select FirstName,MiddleName,LastName,Gender,Email from MstAcctCVLedger where AccountsIDName='$code'";
	$info = sql($cmd);

	if ($info) {

		$firstname  = castutf8($info["FirstName"]);
        $middlename = castutf8($info["MiddleName"]);
        $lastname   = castutf8($info["LastName"]);
        $gender     = castutf8($info["Gender"]);
        $email      = castutf8($info["Email"]);
        $email = trim($email);
        if (empty($email)) {
            $email = $code . '@tbfvietnam.com';
        }

        $update = array(
        				'firstname'      => $firstname,
        				'middlename'     => $middlename,
        				'lastname'       => $lastname,
        				'sex'            => $gender,
        				'email'		     => $email,
        				'emailCanonical' => $email
        		  );

        try {

        	// Update missing fields for users

			$col_new->update(
	    		array('_id'  => $user['_id']),
	    		array('$set' => $update)
			);

		} catch (\Exception $e) {
		}

	} else {
		//logger('services', 'update_user', "Account does not exist in ERP : $code");
	}
}

echo "FINISH !";
