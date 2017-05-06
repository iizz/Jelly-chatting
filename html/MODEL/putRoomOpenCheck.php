<? require('../INC/INC_main.php'); ?>
<?

$roomNumber = $_POST['seq'];

$tableName = "roomList";
$tableColumn = "open";
$tableWhere = "AND seq = ".$roomNumber;
$row = selectTable($tableName, $tableColumn, $tableWhere);

echo $row[0][0];

?>