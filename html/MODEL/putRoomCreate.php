<? require('../INC/INC_main.php'); ?>
<?
$reg_user_seq = $user['seq'];
$room_class_seq = $_POST['roomClass'];
$name = $_POST['roomName'];
$open = $_POST['roomOpen'];
$password = crypt($_POST['roomPasswordInput']);

$tableName = "roomList";
$tableColumn = "seq";
$tableWhere = "AND name = '".$name."'";
$row = selectTable($tableName, $tableColumn, $tableWhere);

if (!$row) {
	$tableName = 'roomList';
	$tableData['reg_user_seq'] = $reg_user_seq;
	$tableData['room_class_seq'] = $room_class_seq;
	$tableData['name'] = $name;
	$tableData['open'] = $open;
	if ($open == 0) {
		$tableData['password'] = $password;
	}
	insertTable($tableName, $tableData);

	$roomSeq = selectMaxSeqTable($tableName);

	echo $roomSeq;
} else {
	echo 'fail';
}


?>