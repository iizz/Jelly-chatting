<?

// [STR] 유저정보 설정
$user['ip'] = $_SERVER['REMOTE_ADDR'];
$user['seq'] = checkUserSeq($user['ip']);
$user['nickname'] = getUserName($user['seq']);
$user['roomNumber'] = getUserRoomNumber($user['seq']);
// [END] 유저정보 설정

?>