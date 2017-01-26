<? require('../INC/INC_main.php'); ?>

<?

// 방 리스트 불러오기
$query  = " SELECT C.seq, room_name, reg_name, name as class_name, open FROM ";
$query .= " (SELECT A.seq, A.name as room_name, B.name as reg_name, A.open as open, A.room_class_seq FROM jelting_roomList A ";
$query .= " LEFT JOIN jelting_userList B On A.reg_user_seq = B.seq WHERE (A.del_flag is null OR A.del_flag != 'Y')) C ";
$query .= " LEFT JOIN jelting_roomClass D On C.room_class_seq = D.seq ";
$row = freeQuerySelect($query);

echo json_encode($row);


?>