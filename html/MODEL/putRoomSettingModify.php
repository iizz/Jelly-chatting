<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['joinRoomNumber'];
$roomName = $_POST['ModifyRoomNameInput'];
$roomOpen = $_POST['modifyRoomOpen'];
$roomPassword = $_POST['ModifyRoomPasswordInput'];

$tableName = "roomList";
$tableColumn = "seq";
$tableWhere = "AND name = '".$roomName."'";
$row = selectTable($tableName, $tableColumn, $tableWhere);

if (!$row || $row[0][0] == $seq) {
	$tableName = 'roomList';
	$tableData['name'] = $roomName;
	$tableData['open'] = $roomOpen;
	if ($roomOpen == 0) {
		$tableData['password'] = $roomPassword;
	} else {
		$tableData['password'] = '';
	}
	$tableWhere = 'AND seq = '.$seq;
	updateTable($tableName, $tableData, $tableWhere);
	unset($tableData);

	echo $roomName;
} else {
	echo "fail";
}

?>