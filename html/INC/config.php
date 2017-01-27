<?

// 유저정보
$user['ip'] = $_SERVER['REMOTE_ADDR'];
$user['seq'] = checkUserSeq($user['ip']);
$user['nickName'] = getUserName($user['seq']);

// 룸
$user['roomNumber'] = getUserRoomNumber($user['seq']);
$user['roomName'] = getUserRoomName($user['roomNumber']);


?>