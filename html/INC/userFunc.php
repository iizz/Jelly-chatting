<?

// 접속한 유저의 IP를 이용하여 SEQ값을 돌려준다.
function checkUserSeq($userIP) {
	$tableName = "userList";
	$tableColumn = "seq";
	$tableWhere = "AND ip = '".$userIP."'";
	$userSeq = selectTable($tableName,$tableColumn,$tableWhere);
	$userSeq = $userSeq[0][0];

	if (!$userSeq) {
		$userSeq = insertUser($userIP); // 아이피를 확인 후 없으면 유저를 생성한다.
		$userSeq = $userSeq[0][0];
	}
	return $userSeq;
}

// 유저를 새로 등록한다.
function insertUser($userIP) {
	global $anonymouse;
	$anonymouseName = createName(); // 임의의 유저 이름을 생성한다.
	$anonymouseNumber = getAnonymousNumber($anonymouseName); // 유저이름을 기반으로 익명번호를 가져온다.

	$tableName = "userList";
	$data['ip'] = $userIP;
	$data['name'] = $anonymouseName;
	$data['anony_number'] = $anonymouseNumber;
	$data['join_room_seq'] = $anonymouse['defaultRoom']; // 유저정보 생성시 기본 채팅방

	insertTable($tableName, $data);

	$tableColumn = "seq";
	$tableWhere = "AND ip = '".$userIP."'";
	$userSeq = selectTable($tableName, $tableColumn, $tableWhere);
	return $userSeq;
}

// 임의의 이름을 생성한다.
function createName() {
	global $anonymouse;
	$randomNum = createRandomNumber(); // 익명번호를 가져온다.
	$anonymousName = $anonymouse['left_name'].$anonymouse["division"].$randomNum;

	$tableName = "userList";
	return $anonymousName;
}

// 익명번호를 생성한다.
function createRandomNumber() {
	global $userRandomNumber;
	$randomNum = mt_rand($userRandomNumber['min'], $userRandomNumber['max']);
	return $randomNum;
}

// 유저이름을 기반으로 익명번호를 가져온다.
function getAnonymousNumber($anonymouseName) {
	global $anonymouse;
	$arrayAnonymouse = explode($anonymouse["division"], $anonymouseName);
	$anonymouseNumber = $arrayAnonymouse[1];
	return $anonymouseNumber;
}

// 유저의 이름을 가져온다.
function getUserName($seq) {
	$tableName = "userList";
	$tableColumn = "name";
	$tableWhere = "AND seq = ".$seq;
	$row = selectTable($tableName,$tableColumn,$tableWhere);
	return $row[0][0];
}

// 유저의 현재 접속한 방 번호를 가져온다.
function getUserRoomNumber($seq) {
	$tableName = "userList";
	$tableColumn = "join_room_seq";
	$tableWhere = "AND seq = ".$seq;
	$row = selectTable($tableName,$tableColumn,$tableWhere);
	return $row[0][0];
}

// 유저의 접속상태를 업데이트 한다.
function userConnectUpdate($seq) {
	$time = date("Y-m-d H:i:s");

	$tableName = 'userList';
	$tableData['connect'] = '1';
	$tableData['last_access'] = $time;
	$tableWhere = 'AND seq = '.$seq;
	updateTable($tableName, $tableData, $tableWhere, "N");
}

?>