// 유저 닉네임 수정 confirm
function checkModifyUsername() {
	var newUserName = $('input[name=userNameInput]').val();
	$('input[name=userNickName]').val(newUserName);
	if (confirm('닉네임을 수정 하시겠습니까?')) {
		changeUsername();
	}
}

// 유저 닉네임 수정 실행
function changeUsername() {

	var post_data = $("input[name=userNameInput]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putChangeName.php",
		data:post_data,
		success:function(data) {
			pageUpdate();
			$('input[name=userNickName]').val(data);
		}
	});
}

// 유저 닉네임 INPUT FOCUS OUT
function checkUserNameFocus() {
	$('input[name=userNameInput]').blur(function() {
		var oldUserName = $('input[name=userNickName]').val();
		var newUserName = $('input[name=userNameInput]').val();

		if (oldUserName != newUserName && oldUserName) {
			checkModifyUsername();
			$('input[name=userNickName]').val(newUserName);
		}
	});
}

// 전체 접속자 수를 변경
function getUserTotalCount() {

	$.ajax ({
		type:"POST",
		url:"MODEL/getUserTotalCount.php",
		success:function(data) {
			$('.userTotalCount').html(data);
		}
	});
}