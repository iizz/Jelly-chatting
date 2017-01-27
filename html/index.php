<?php
	if (!$_POST['location']) {
		$_POST['location'] = 'main';
	}

	require_once('INC/INC_main.php');

	require_once('header.php');
	require_once('VIEW/VIEW_'.$_POST['location'].'.php');
	require_once('bottom.php');

?>