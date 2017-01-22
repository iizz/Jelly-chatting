
<? require('../INC/INC_main.php'); ?>

<?

$reg_user_seq = $user['seq'];
$room_list_seq = $_POST['joinRoomNumber'];
$state_seq = $_POST['state'];
$talk = $_POST['content'];

$tableName = 'chatApply';
$tableData['reg_user_seq'] = $reg_user_seq;
$tableData['room_list_seq'] = $room_list_seq;
$tableData['state_seq'] = $state_seq;
$tableData['talk'] = $talk;
insertTable($tableName, $tableData);

?>