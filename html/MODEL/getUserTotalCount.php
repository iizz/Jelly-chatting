<? require('../INC/INC_main.php'); ?>
<?

// 접속한 전체 유저수를 가져온다.
$time = date("Y-m-d H:i:s", time()-$defaultTime['checkLastTime']);

$tableName = "userList";
$tableWhere = "AND connect = 1 AND last_access	> '".$time."' ";
$row = countTable($tableName, $tableWhere);

echo $row;

?>