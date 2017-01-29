<? require('../INC/INC_main.php'); ?>

<?

$time = date("Y-m-d H:i:s", time()-$defaultTime['checkLastTime']);

// 방 목록과 유저리스트를 INNER JOIN 하여 방 리스트 + 방 접속자 를 가져온다.

$query  = " SELECT E.*, F.count FROM ";
$query .= " (SELECT C.seq, room_name, reg_name, name as class_name, IF(open=1,'공개','비공개') as open FROM ";
$query .= " (SELECT A.seq, A.name as room_name, B.name as reg_name, A.open as open, A.room_class_seq FROM jelting_roomList A ";
$query .= " LEFT JOIN jelting_userList B On A.reg_user_seq = B.seq WHERE (A.del_flag is null OR A.del_flag != 'Y')) C ";
$query .= " LEFT JOIN jelting_roomClass D On C.room_class_seq = D.seq) E ";

$query .= " INNER JOIN ";

$query .= " (SELECT seq, IF(count is null, '0', count) as count FROM ";
$query .= " (SELECT seq FROM jelting_roomList WHERE ".$table['where']['del_flag'].") A ";
$query .= " LEFT JOIN ";
$query .= " (SELECT join_room_seq, count(join_room_seq) as count FROM jelting_userList ";
$query .= " WHERE ".$table['where']['del_flag']." AND last_access	> '".$time."' GROUP BY join_room_seq) B ";
$query .= " On A.seq = B.join_room_seq) F ";
$query .= " On E.seq = F.seq ";
$row = freeQuerySelect($query);

echo json_encode($row);


?>