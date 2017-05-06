<?
// 채팅 상태 SELECT BOX 를 만든다.
function getChattingStateSelectBox() {

	// SELECT BOX 만들 값을 가져온다.
	$tableName = "chatState";
	$tableColumn = "seq, name";
	$row = selectTable($tableName, $tableColumn);

	// SELECT BOX 출력 코드를 만든다.
	$output = CreateChattingSelectBox($row);

	return $output;
}

function CreateChattingSelectBox($stateValue) {
	foreach ($stateValue as $val) {
		$selectBoxOption .= "<option value='$val[0]'>$val[1]</option>";
	}

	return $selectBoxOption;
}

// 룸 클래스 SELECT BOX 를 만든다.
function getRoomClassSelectBox() {

	// SELECT BOX 만들 값을 가져온다.
	$tableName = "roomClass";
	$tableColumn = "seq, name";
	$row = selectTable($tableName, $tableColumn);

	// SELECT BOX 출력 코드를 만든다.
	$output = CreateRoomClassSelectBox($row);

	return $output;
}

function CreateRoomClassSelectBox($stateValue) {
	foreach ($stateValue as $val) {
		$selectBoxOption .= "<option value='$val[0]'>$val[1]</option>";
	}

	return $selectBoxOption;
}

// 룸 세팅 박스 출력
function getRoomSettingBoxDisplay() {
	global $user;
	$joinRoomSeq = $user['roomNumber'];
	
	// 룸의 마스터 SEQ 값을 가져온다.
	$roomMasterSeq = getRoomMasterSeq($joinRoomSeq);

	// 룸의 마스터인지 확인하여 Display의 CSS값을 리턴받는다.
	$output = checkUserRoomMaster($roomMasterSeq);

	return $output;
}

// 룸의 마스터 seq 값을 가져온다.
function getRoomMasterSeq($joinRoomSeq) {
	$tableName = "roomList";
	$tableColumn = "reg_user_seq";
	$tableWhere = "AND seq = ".$joinRoomSeq;
	$row = selectTable($tableName, $tableColumn, $tableWhere);

	return $row[0][0];
}

// 마스터인지 비교해서 맞으면 버튼을 block 해준다.
function checkUserRoomMaster($roomMasterSeq) {
	global $user;
	if ($roomMasterSeq == $user['seq']) {
		return 'block';
	} else {
		return 'none';
	}
}

?>