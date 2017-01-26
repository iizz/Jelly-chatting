<?

// [STR] 경로 설정
$route['mainPath'] = "/host/home1/jelting/html/";
// [END] 경로 설정


// [STD] 인클라우드 파일들
// 기본값
require_once($route['mainPath'].'INC/default.php');

// 유저 정보 함수
require_once($route['mainPath'].'INC/userFunc.php');

// 데이터베이스 함수
require_once($route['mainPath'].'INC/databaseFunc.php');

// 박스 함수
require_once($route['mainPath'].'INC/boxFunc.php');

// 설정
require_once($route['mainPath'].'INC/config.php');

// [END] 인클라우드 파일들


?>