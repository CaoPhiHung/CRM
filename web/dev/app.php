<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
$database = include __DIR__ . '/database.php';

$myServer = $database['dbhost'];
$myUser = $database['dbuser'];
$myPass = $database['dbpassword'];
$myDB = $database['dbname'];
$db = 'levis_20';

$connect = mssql_connect($myServer, $myUser, $myPass) or die("SQL Server fails");
mssql_select_db($myDB, $connect) or die("Couldn't open database");

$mongo = new MongoClient();

function debug($var)
{
   	echo "<pre>";
   	print_r($var);
   	echo "</pre>";
  	die();
}

function castutf8($str)
{
	return utf8_encode(utf8_decode($str));
}

function logger($type, $filename, $message)
{
	$message = $message . PHP_EOL;
	$folder = __DIR__ . "/../app/logs/$type";
	$file = "$folder/$filename.txt";

	system("mkdir -p $folder");

	if (!file_exists($file)) {
		system("touch $file");
		system("chmod a+w $file");
	}

	file_put_contents($file, $message, FILE_APPEND);
}

function sql($query, $assoc = true)
{
	$result = mssql_query($query);

	if ($assoc) {
		return mssql_fetch_assoc($result);
	}

	return $result;
}
