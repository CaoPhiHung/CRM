<?php
include __DIR__ . '/app.php';

$col_phone = $mongo->$db->phone_duplicated;
$phones = $col_phone->find();

$report = "";

foreach ($phones as $item) {
        $phone = $item['phone'];
        $ids = $item['account'];

        $report .= '<div class="panel-body">
                        <ul class="list-group">
                                <a href="#" class="list-group-item active">' . $phone .'</a>
                        <li class="list-group-item">
                                <table class="table">
                                <tr>
                                        <th>Account ID</th>
                                        <th>Full Name</th>
                                </tr>';

        foreach ($ids as $id) {

                $sql = "select FirstName,MiddleName,LastName,Gender,Email from MstAcctCVLedger where AccountsIDName='$id'";

                // Prepare and execute SQL Command
                $result = sql($sql);

                $report .= '<tr><td>' . $id . '</td>';
                $report .= '<td>' . $result['FirstName'].' '.$result['MiddleName'] . ' '.$result['LastName'] . '</td>';
        }

        $report .= '</table></li></ul></div>';
}
?>
<html>
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
	#wrapper {
		width : 850px;
		margin : 20px auto;
	}
</style>
<body>
	<div id="wrapper">
		<div class="panel panel-default">
  			<div class="panel-heading">
  				DUPLICATE CELLPHONE
  			</div>
  			<?php echo $report ?>
  		</div>
	</div>
</body>
</html>
*/

