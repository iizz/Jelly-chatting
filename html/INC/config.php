<?

// 유저정보
$user['ip'] = $_SERVER['REMOTE_ADDR'];
$user['seq'] = checkUserSeq($user['ip']);
$user['nickName'] = getUserName($user['seq']);

// 룸
$user['roomNumber'] = getUserRoomNumber($user['seq']);
$user['roomName'] = getUserRoomName($user['roomNumber']);

// 전체 유저 수 카운트 및 업데이트
$user['userTotalCount'] = getUserTotalCount();

?>