
<? require('../INC/INC_main.php'); ?>

<?

$reg_user_seq = $user['seq'];
$room_class_seq = $_POST['roomClass'];
$name = $_POST['roomName'];
$open = $_POST['roomOpen'];

$tableName = 'roomList';
$tableData['reg_user_seq'] = $reg_user_seq;
$tableData['room_class_seq'] = $room_class_seq;
$tableData['name'] = $name;
$tableData['open'] = $open;
insertTable($tableName, $tableData);

?>