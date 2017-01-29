<?

// 데이터베이스 연결
function dbConnect() {
	global $db;
	$conn = new mysqli($db['hostname'], $db['username'], $db['password'], $db['dbname']) or die("MySQL Server 연결에 실패했습니다");
	mysqli_query($conn, "set names utf8");
	return $conn;
}

// 데이터베이스 연결 종료
function dbClose($conn) {
	$conn->close();
}

// 결과값을 배열로 담아준다.
function fetch_row($result) {
	$i = 0;
	$value = '';
	while ($row = mysqli_fetch_row($result)) {
		$value[$i] = $row;
		$i++;
	}
	return $value;
}

// 데이터베이스 SELECT
function selectTable($name, $column="*", $where="", $order="REG_DATE DESC", $limit="") {
	global $table;
	$conn = dbConnect();

	$query  = " 
			SELECT
				".$column."
			FROM
				".$table[$name]['name']."

			WHERE ".$table['where']['del_flag']."
				".$where."
			ORDER BY
				".$order."
	";

	if ($limit != "") {
		$query .= $limit;
	}
	//echo $query."<br />";

	$result = mysqli_query($conn, $query);
	$row = fetch_row($result);
	dbClose($conn);

	return $row;
}

// 데이터베이스 INSERT
function insertTable($name, $data) {
	global $table;
	$conn = dbConnect();
	
	$column = "";
	$value = "";
	foreach ($data as $key => $val) {
		$column .= $key.", ";
		$value .= "'".$val."', ";
	}
	$column = substr($column, 0, -2).", reg_date";
	$value= substr($value, 0, -2).", now()";

	$query  = " 
			INSERT INTO
				".$table[$name]['name']."
				(".$column.")
			VALUES
				(".$value.")
	";

	//echo $query; exit;

	$result = mysqli_query($conn, $query);
	dbClose($conn);
}

// 데이터베이스 UPDATE
function updateTable($name, $data, $where="", $modifyCheck="Y") {
	global $table;
	$conn = dbConnect();

	// [STR] 변경사항을 수정내역 테이블에 INSERT 한다
	if ($modifyCheck == "Y") { // $modifyCheck 값이 Y일 경우에만 modify 테이블에 수정내역을 입력한다.
		foreach ($data as $key => $val) {
			modifyListUpdateTable($name, $key, $val, $where);
		}
	}
	// [END] 변경사항을 수정내역 테이블에 INSERT 한다
	
	foreach ($data as $key => $val) {
		$value .= $key." = '".$val."', ";
	}
	$value= substr($value, 0, -2);

	$query  = " 
			UPDATE
				".$table[$name]['name']."
			SET
				".$value."
			WHERE ".$table['where']['del_flag']."
				".$where."
	";

	//echo $query; exit;

	$result = mysqli_query($conn, $query);
	dbClose($conn);
}

// 데이터베이스 COUNT
function countTable($name, $where="") {
	global $table;
	$conn = dbConnect();
	
	$query  = " 
			SELECT count(*) as cnt FROM
				".$table[$name]['name']."
			WHERE ".$table['where']['del_flag']."
				".$where."
	";

	//echo $query; exit;

	$result = mysqli_query($conn, $query);
	$row= fetch_row($result);
	dbClose($conn);

	return $row[0][0];
}

// 데이터베이스 SELECT MAX SEQ
function selectMaxSeqTable($name,  $column="seq") {
	global $table;
	$conn = dbConnect();
	
	$query  = " 
			SELECT max(".$column.") as max FROM
				".$table[$name]['name']."
	";

	//echo $query; exit;

	$result = mysqli_query($conn, $query);
	$row= fetch_row($result);
	dbClose($conn);

	return $row[0][0];
}

// 데이터베이스 수정내역 INSERT
// $name = 변경된 테이블 명 / $column = 변경된 컬럼 명 / $after_data = 변경될 데이터 명
function modifyListUpdateTable($name, $column, $after_data, $where) {
	global $table, $user;

	$result = selectTable($name, $column, $where);
	$before_data = $result[0][0];

	$data["reg_user_seq"] = $user['seq'];
	$data["table_name"] = $name;
	$data["table_column"] = $column;
	$data["before_data"] = $before_data;
	$data["after_data"] = $after_data;

	$tableName = "modifyList";
	insertTable($tableName, $data);
}

// 데이터베이스 SELECT 자유로운 쿼리
function freeQuerySelect($query) {
	$conn = dbConnect();

	$result = mysqli_query($conn, $query);
	$row = fetch_row($result);
	dbClose($conn);

	return $row;
}



	


?>