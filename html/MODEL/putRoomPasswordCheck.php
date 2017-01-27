<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['seq'];
$password = $_POST['passwordValue'];

$tableName = "roomList";
$tableColumn = "seq";
$tableWhere = "AND seq = ".$seq." AND password= ".$password;
$row = selectTable($tableName, $tableColumn, $tableWhere);

if ($row) {
	echo 'success';
}

?>