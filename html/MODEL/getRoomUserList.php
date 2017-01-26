<? require('../INC/INC_main.php'); ?>

<?


// 접속한 방 번호를 가져온다.
$tableName = "userList";
$tableColumn = "join_room_seq";
$tableWhere = " AND seq = ".$user['seq'];
$row = selectTable($tableName, $tableColumn, $tableWhere);

$room_seq = $row[0][0];

// 접속한 방의 접속자 리스트를 가져온다.
$nowTime = date("Y-m-d H:i:s", time()-8);

$tableName = "userList";
$tableColumn = "name";
$tableWhere = " AND join_room_seq = ".$room_seq." AND last_access	> '".$nowTime."'";
$row = selectTable($tableName, $tableColumn, $tableWhere);

echo json_encode($row);

?>