// 유저 닉네임 수정 confirm
function checkModifyUsername() {
	if(confirm('닉네임을 수정 하시겠습니까?')) {
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
			var userName = $('input[name=userNameInput]').val();
			$('.userNameSpan').html(userName);
			$('input[name=userNicknameInput]').val(userName);
			
		}
	});

}