<? require('../INC/INC_main.php'); ?>
<?

$roomNumber = $_POST['roomNumberInput'];

$tableName = "roomList";
$tableColumn = "seq";
$tableWhere = "AND seq = ".$roomNumber;
$row = selectTable($tableName, $tableColumn, $tableWhere);

if ($row) {
	$tableName = 'userList';
	$tableData['join_room_seq'] = $roomNumber;
	$tableWhere = 'AND seq = '.$user['seq'];
	updateTable($tableName, $tableData, $tableWhere);
} else {
	echo "fail";
}

?>