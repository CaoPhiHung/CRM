<?php
include __DIR__ . '/app.php';

//$col = $mongo->levis->users;
$users_old = $mongo->$db->users_old;
// $users_new = $mongo->$db->users_point;
$users_new = $mongo->$db->users;

$users_old = $users_old->find();
$users_new = $users_new->find();

$index_old = [];
$index_new = [];

// Index user old information by account id
foreach ($users_old as $user)
{
	$code = $user['CCode'];
	$index_old[$code] = $user;
}
// Index user new information by account id
foreach ($users_new as $user)
{
	$code = $user['CCode'];
	$index_new[$code] = $user;
}

function level($level)
{
	switch ($level) {
		case '1':
			return "SILVER";

		case '2':
			return "GOLD";

		case '3':
			return "PLATINUM";

		default:
			return 'UNCLEAR';
	}
}

function report($id,$new_acc)
{
	$cols = "";

	$code  = $new_acc['CCode'];
	$name  = castutf8($new_acc['firstname'])  . ' '.
		     castutf8($new_acc['middlename']) . ' '.
		     castutf8($new_acc['lastname']);


	$new_point = $new_acc['point'];
	$new_level = $new_acc['level'];
	$new_level = level($new_level);

	$dob = "";
	if(isset($new_acc['dob']))
	{
		if(is_string($new_acc['dob']))
			$dob=$new_acc['dob'];
		else
			$dob= date('Y-m-d',$new_acc['dob']->sec);
	}

	$cols = "
		<td>$id</td>
		<td>$code</td>
		<td>$name</td>
		<td width=160px>$dob</td>
		<td>$new_point</td>
		<td>$new_level</td>
	";

	return "<tr> $cols </tr>";
}

$report = "";
$id = 0;

// echo '<pre>';
// var_dump($index_old);
// echo '</pre>';
// die();
foreach ($users_new as $user) {
	$key = $user['CCode'];
	
	if(!isset($index_old[$key]))
	{
	
		$new_acc = $index_new[$key];
		$id++;
		$report .= report($id,$new_acc);
		
	}
}
?>

<html>
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
	#wrapper {
		width : 950px;
		margin : 20px auto;
	}
</style>
<body>
	<div id="wrapper">
		<div class="panel panel-default">
  			<div class="panel-heading">
  				POINT COMPARISON
  			</div>
			<table class="table">
				<tr>
					<th>#ID</th>
					<th>Accout ID</th>
					<th>Customer Name</th>
					<th>D.O.B</th>
					<th>New Point</th>
					<th>New Level</th>
				</tr>
				<?php echo $report ?>
			</table>
  		</div>
	</div>
</body>
</html>