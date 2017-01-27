
<? require('../INC/INC_main.php'); ?>

<?

$userName = $_POST['userNameInput'];

$tableName = 'userList';
$tableData['name'] = $userName;
$tableWhere = 'AND seq = '.$user['seq'];
updateTable($tableName, $tableData, $tableWhere);

echo $userName;

?>