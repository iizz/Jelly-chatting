// 채팅내용 불러오기
function getChattingContent() {
	$.ajax({
		url:'MODEL/getChattingContent.php',
		dataType:'json',
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li style="font-size:14px;">';
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
			$('.chat-area').html('<ul>'+str+'</ul>');
		} // End of success
	}) // End of $.ajax
} // ENd of get_ajax()

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