
<? require('../INC/INC_main.php'); ?>

<?

// 채팅 삭제 기능 제거, 현재 소스 필요 없음.

$seq = $_POST['del_seq'];

$tableName = 'chatApply';
$tableData['del_flag'] = 'Y';
$tableWhere = 'AND seq = '.$seq;
updateTable($tableName, $tableData, $tableWhere);

?>