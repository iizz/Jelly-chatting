<?
// 채팅 상태 SELECT BOX 를 만든다.
function getChattingStateSelectBox() {

	// SELECT BOX 만들 값을 가져온다.
	$tableName = "chatState";
	$tableColumn = "seq, name";
	$row = selectTable($tableName, $tableColumn);

	// SELECT BOX 출력 코드를 만든다.
	$output = CreateChattingSelectBox($row);

	echo $output;
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

	echo $output;
}

function CreateRoomClassSelectBox($stateValue) {
	foreach ($stateValue as $val) {
		$selectBoxOption .= "<option value='$val[0]'>$val[1]</option>";
	}

	return $selectBoxOption;
}



?>