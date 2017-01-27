<? require('../INC/INC_main.php'); ?>
<?

$roomNumber = $_POST['joinRoomNumber'];

$tableName = "roomList";
$tableColumn = "seq, name";
$tableWhere = "AND seq = ".$roomNumber;
$row = selectTable($tableName, $tableColumn, $tableWhere);

if ($row) {
	$tableName = 'userList';
	$tableData['join_room_seq'] = $roomNumber;
	$tableWhere = 'AND seq = '.$user['seq'];
	updateTable($tableName, $tableData, $tableWhere);

	echo json_encode($row[0]);
}

?>