<? require('../INC/INC_main.php'); ?>

<?

// 유저 connect 상태 업데이트
userConnectUpdate($user['seq']);

$tableName = "userList";
$tableColumn = "join_room_seq";
$tableWhere = " AND seq = ".$user['seq'];
$row = selectTable($tableName, $tableColumn, $tableWhere);

$room_seq = $row[0][0];

// 채팅내용 불러오기
$query  = " SELECT count(*) FROM jelting_chatApply WHERE reg_date > subdate(now(), INTERVAL 3 second) ";
$row = freeQuerySelect($query);

echo json_encode($row);

?>