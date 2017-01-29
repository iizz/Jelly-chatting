// 채팅내용 불러오기
function getChattingContent() {
	$.ajax({
		url:'MODEL/getChattingContent.php',
		dataType:'json',
        async: false,
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li>';
				for (j=0; j<data[i].length; j++) {
					if (j == 0) {
						var seq = data[i][j];
					} else {
						str += data[i][j] + ' - ';
					}
				}
				
				//str += '<button onclick="checkDeleteChatting(' + seq + '); return false;">삭제</button>';
				str += '</li>'
			} // End of for
			$('.chat-area').html('<ul class="mCustomScrollbar">'+str+'</ul>');
            scrollFocus('.chat-area ul');
            
		} // End of success
	}) // End of $.ajax
} // ENd of get_ajax()



// 스크롤을 맨 밑으로 내림
function scrollFocus(target) {
    $(target).scrollTop($(target).prop('scrollHeight'));
}

// 채팅내용 삭제 confirm
function checkDeleteChatting(seq) {
	if(confirm('정말로 삭제하시겠습니까?')) {
		putChattingDelete(seq);
	}
}

// 채팅내용 삭제 실행
function putChattingDelete(seq) {

	var post_data = 'del_seq=' + seq;

	$.ajax ({
		type:"POST",
		url:"MODEL/putChattingDelete.php",
		data:post_data,
		success:function(data) {
			pageUpdate();
		}
	});

}

// 채팅내용 입력
function putChattingContent() {

	var post_data = $("form[name=main_form]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putChattingContent.php",
		data:post_data,
		success:function(data) {
			$('input[name=content]').val('');
			pageUpdate();
		}
	});

}