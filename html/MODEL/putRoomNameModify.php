<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['joinRoomNumber'];
$roomName = $_POST['ModifyRoomNameInput'];

$tableName = "roomList";
$tableColumn = "name";
$tableWhere = "AND name = '".$roomName."'";
$row = selectTable($tableName, $tableColumn, $tableWhere);

if (!$row) {
	$tableName = 'roomList';
	$tableData['name'] = $roomName;
	$tableWhere = 'AND seq = '.$seq;
	updateTable($tableName, $tableData, $tableWhere);
	echo $roomName;
} else {
	echo "fail";
}

?>