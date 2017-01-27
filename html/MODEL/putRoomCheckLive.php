<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['room_seq'];

$tableName = "roomList";
$tableColumn = "seq";
$tableWhere = "AND seq = ".$seq;
$row = selectTable($tableName, $tableColumn, $tableWhere);

if (!$row) {
	echo 'null';
}

?>