// 유저의 닉네임을 수정한다.
function changeUserName() {

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