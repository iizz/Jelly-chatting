<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['joinRoomNumber'];
$roomName = $_POST['ModifyRoomNameInput'];
$roomOpen = $_POST['modifyRoomOpen'];
$roomPassword = crypt($_POST['ModifyRoomPasswordInput']);

// [STR] 잘못된 접근방식인지 체크
$tableName = "roomList";
$tableColumn = "reg_user_seq";
$tableWhere = "AND seq = ".$seq;
$row = selectTable($tableName, $tableColumn, $tableWhere);

if ($row[0][0] != $user['seq']) {
	echo "error";
	exit;
}
// [END] 잘못된 접근방식인지 체크

// 정상처리
$tableName = "roomList";
$tableColumn = "seq, reg_user_seq";
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
} else { // 중복된 이름이 있을 경우
	echo "fail";
}

?>