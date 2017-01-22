<? require('../INC/INC_main.php'); ?>

<?

// 유저 connect 상태 업데이트
$userSeq = $user['seq'];
userConnectUpdate($userSeq);

$tableName = "userList";
$tableColumn = "join_room_seq";
$tableWhere = " AND seq = ".$user['seq'];
$row = selectTable($tableName, $tableColumn, $tableWhere);

$room_seq = $row[0][0];

// 채팅내용 불러오기
$query  = " SELECT E.seq, E.room_name, E.user_name, F.name, E.talk, chat_reg_date FROM ";
$query .= " (SELECT C.seq, C.talk, C.name as user_name, D.name as room_name, C.state_seq, chat_reg_date FROM ";
$query .= " (SELECT A.seq, A.talk, A.reg_user_seq, A.room_list_seq, A.state_seq, B.name, A.reg_date as chat_reg_date FROM jelting_chatApply A ";
$query .= " LEFT JOIN jelting_userList B ON A.reg_user_seq = B.seq WHERE (A.del_flag != 'Y' OR A.del_flag is null) AND A.room_list_seq = ".$room_seq." Limit 20) C ";
$query .= " LEFT JOIN jelting_roomList D On C.room_list_seq = D.seq) E ";
$query .= " LEFT JOIN jelting_chatState F On E.state_seq = F.seq; ";
$row = freeQuerySelect($query);

echo json_encode($row);


?>