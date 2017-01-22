
// 방 목록을 불러온다.
function getRoomList() {
	$.ajax({
		url:'MODEL/getRoomList.php',
		dataType:'json',
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li style="font-size:14px;">';
				for (j=0; j<data[i].length; j++) {
					str += data[i][j] + ' - ';
				}
				
				str += '</li>'
			} // End of for
			$('.room_list').html('<ul>'+str+'</ul>');
		} // End of success
	}) // End of $.ajax
} // ENd of getRoomList()

// 접속한 방 번호를 변경한다.
function changeRoomNumber() {

	var post_data = $("input[name=roomNumberInput]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomNumberChange.php",
		data:post_data,
		success:function(data) {
			if (data == 'fail') {
				alert('방번호 변경을 실패했습니다. \n선택하신 방 번호는 개설되지 않았습니다.');
			} else {
				pageUpdate();
				var roomNumber = $('input[name=roomNumberInput]').val();
				$('input[name=joinRoomNumber]').val(roomNumber);
				$('.userRoomNumberSpan').html(roomNumber);
			}
		}
	});

}

// 방 접속자를 불러온다.
function getRoomUserList() {
	$.ajax({
		url:'MODEL/getRoomUserList.php',
		dataType:'json',
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li style="font-size:14px;">';
				for (j=0; j<data[i].length; j++) {
					str += data[i][j];
				}
				
				str += '</li>'
			} // End of for
			$('.roomUserList').html('<ul>'+str+'</ul>');
		} // End of success
	}) // End of $.ajax
} // ENd of getRoomList()