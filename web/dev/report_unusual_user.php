<?php
include __DIR__ . '/app.php';
// $users_new = $mongo->$db->users_point;
$users = $mongo->$db->users;
$bill_info = $mongo->$db->aevitaslog;

$users_info = $users->find();

$index_old = [];
$index_new = [];

// Index user old information by account id
foreach ($users_info as $user)
{
	$code = $user['CCode'];
	$index_old[$code] = $user;
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

function report($id, $user,$bills,$collection)
{
	$cols = "";
	
	$code  = $user['CCode'];
	$f_name="";
	$m_name="";
	$l_name="";
	if(isset($user['firstname']))
		$f_name=$user['firstname'];
	if(isset($user['middlename']))
		$m_name=$user['middlename'];
	if(isset($user['lastname']))
		$l_name=$user['lastname'];
	$name  = castutf8($f_name)  . ' '.
		     castutf8($m_name) . ' '.
		     castutf8($l_name);

	$new_point = $user['point'];
	$new_level = level($user['level']);
	

	$dob = "";
	if(isset($user['dob']))
	{
		if(is_string($user['dob']))
			$dob=$user['dob'];
		else
			$dob= date('Y-m-d',$user['dob']->sec);
	}
	$cols = "
		<td>$id</td>
		<td>$code</td>
		<td>$name</td>
		<td width=160px>$dob</td>
		<td>$new_point</td>
		<td>$new_level</td>
		<td width=250px>
			<table>
			<tr>
			<th>Bill ID</th>
			<th>Action</th>
			<th>Point</th>
			</tr>
			<tr>";
			$total_bill_point=0;
	foreach ($bills as $key => $value) {
		$bill_id="";
		$point=0;
		if(isset($value['schema'][0]) && isset($value['schema'][0]['BillIDNo']))
			$bill_id=$value['schema'][0]['BillIDNo'];
		if(isset($value['point']))
			$point=$value['point'];
		$cols.="<tr>
		<td>$bill_id</td>
		<td>$value[action]</td>
		<td>$point</td>
		</tr>
		";
		$total_bill_point+=$point;
		# code...
	}
        $update_point = array('point'=>$total_bill_point);
	$collection->update(
		array('_id'=>$user['_id']),
		array(
			'$set'=>$update_point
			)
		);
	$cols.=		"</tr>
			<tr>
				<td>
				Total Bill Point
				</td>
				<td>
				$total_bill_point
				</td>
			</tr>
			</table>
		</td>
	";

	return "<tr> $cols </tr>";
}

$report = "";
$id = 0;

foreach ($users_info as $user) {
	$user_id = $user['_id'];

	$bill_details = $bill_info->find(
		array(
			'user.$id'=>$user['_id']
			)
		,
		array(
			'schema.BillIDNo','action','point','totalPayment'
			)
		);
	$bill_point= 0;
	$bills=array();
	foreach ($bill_details as $k => $v) {
		# code...
		if(isset($v['point']))
			$bill_point+=$v['point'];
		$bills[]=$v;
	}

	if($bill_point!=$user['point'] && $user['point']!=0)
	{
		
		$report .= report($id, $user, $bills,$users);
		$id++;
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
					<th>User Point</th>
					<th>User Level</th>
					<th>Bill Point</th>
				</tr>
				<?php echo $report ?>
			</table>
  		</div>
	</div>
</body>
</html>
