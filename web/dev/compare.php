<?php
include __DIR__ . '/app.php';

$c_users = $mongo->$db->users;
$c_avitas = $mongo->$db->aevitaslog;
$c_users_tmp = $mongo->$db->users_refactored;

$users     = $c_users->find();
$users_tmp = $c_users_tmp->find();
$avitas = $c_avitas->find();

$users_index = array();
$id_index = array();

foreach ($users as $user) {
	$users_index[] = $user['CCode'];
	$id_index[] = $user['_id'];
}

foreach ($avitas as $log) {
	$id_index[] = $log['user']['$id'];
}

$GLOBALS['index'] = $id_index;

function getFreeId() {
	static $count = 1;

	while (in_array($count, $GLOBALS['index'])) {
		$count++;
	}

	$GLOBALS['index'][] = $count;
	return $count;
}

foreach ($users_tmp as $user) {
	if (!in_array($user['CCode'], $users_index)) {
		$user["_id"] = getFreeId();
		$c_users->insert($user);
	}
}