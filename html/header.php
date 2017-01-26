<!DOCTYPE html>
<head>
	<title> Jelting </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet">
	<!-- //font -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/app.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="JS/main.js"></script> <!-- 기본 스크립트 -->
	<script src="JS/userInfo.js"></script> <!-- 유저 -->
	<script src="JS/room.js"></script> <!-- 룸 -->
	<script src="JS/chatting.js"></script> <!-- 채팅내용 -->
</head>

<script type="text/javascript">


</script>	

<body>
	<div class="header">
		<h1>Jelly Chatting</h1>
	</div>
	<form name="main_form" method="POST">
	<input type="hidden" name="joinRoomNumber" value="<?=$user['roomNumber']?>" />
