
<? require('../INC/INC_main.php'); ?>

<?

$seq = $_POST['del_seq'];

$tableName = 'chatApply';
$tableData['del_flag'] = 'Y';
$tableWhere = 'AND seq = '.$seq;
updateTable($tableName, $tableData, $tableWhere);

?>