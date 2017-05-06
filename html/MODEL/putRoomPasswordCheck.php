<? require('../INC/INC_main.php'); ?>
<?

$seq = $_POST['seq'];
$inputPassword = $_POST['passwordValue'];

$tableName = "roomList";
$tableColumn = "password";
$tableWhere = "AND seq = ".$seq;
$row = selectTable($tableName, $tableColumn, $tableWhere);
$roomPassword = $row[0][0];

$inputPassword = crypt($inputPassword, $roomPassword);

if ($inputPassword == $roomPassword) {
	echo 'success';
}

?>