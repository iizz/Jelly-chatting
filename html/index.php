<?
	if (!$_POST['content']) {
		$_POST['content'] = 'main';
	}

	require_once('INC/INC_main.php');

	require_once('header.php');
	require_once('VIEW/VIEW_'.$_POST['content'].'.php');
	require_once('bottom.php');

?>