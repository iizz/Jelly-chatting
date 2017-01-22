<?

// [STR] 데이터베이스 접속 정보
$db['hostname'] = "my5510.gabiadb.com"; // 데이터베이스 주소
$db['username'] = "el2a"; // ID
$db['password'] = "alsk145123"; // PW
$db['dbname'] = "elzz"; // 데이터베이스 이름
// [END] 데이터베이스 접속 정보


// [STR] 테이블 이름 설정
$table['mainTable'] = "jelting"; // 테이블명 메인 이름

$table['chatApply']['name'] = $table['mainTable']."_chatApply"; // 채팅 내용

$table['chatState']['name'] = $table['mainTable']."_chatState"; // 상태

$table['modifyList']['name'] = $table['mainTable']."_modifyList"; // 수정 내역

$table['roomClass']['name'] = $table['mainTable']."_roomClass"; // 룸 속성

$table['roomList']['name'] = $table['mainTable']."_roomList"; // 룸 리스트

$table['userList']['name'] = $table['mainTable']."_userList"; // 유저 리스트
// [END] 테이블 이름 설정

// [STR] 변수명
$userRandomNumber['min'] = "100000"; // 익명번호 생성 최소값
$userRandomNumber['max'] = "999999"; // 익명번호 생성 최대값
$anonymouse['left_name'] = "jellpy"; // 익명이름 기본값
$anonymouse['division'] = "_"; // 익명이름 구분자
$anonymouse['defaultRoom'] = "1"; // 익명접속자 기본접속 방
// [END] 변수명


?>