<?php
include __DIR__ . '/app.php';

$jobqueue = $mongo->$db->jobqueue;
$jobs = $jobqueue->find();

// Remove all status = true
foreach ($jobs as $job) {
	echo $job['_id']. "\n";
	$jobqueue->update(
		array('_id'  => $job['_id']),
	    array('$unset' => array('status' => true))
	);
} 

echo "DONE OK";
