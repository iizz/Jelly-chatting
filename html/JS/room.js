// 방 목록을 불러온다.
function getRoomList() {
	$.ajax({
		url:'MODEL/getRoomList.php',
		dataType:'json',
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li>';

				for (j=0; j<data[i].length; j++) {
					if (j == 0) {
						var seq = data[i][j];
						str += '<a href="javascript:moveRoom('+seq+')">';
					} else if (j == 1) {
						str += data[i][j];
					} else if (j == 2) {
						str += " ("+data[i][j]+")";
					} else if (j == 3) {
						str += '<span style="float:right;">'+data[i][j] + '</span><span class="clearfix"></span>';
					} else if (j == 4) {
						str += data[i][j];
					}
				}

				str += '</a>';
				//str += '<button onclick="checkDeleteRoom(' + seq + '); return false;">삭제</button>';
				str += '</li>'
			} // End of for
			$('.room-list').html('<ul class="room-item">'+str+'</ul>');
		} // End of success
	}) // End of $.ajax
} // ENd of getRoomList()

// 접속하려는 방이 오픈 상태인지 확인한다.
function moveRoom(seq) {

	var post_data = "seq=" + seq;

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomOpenCheck.php",
		data:post_data,
		success:function(data) {
			if (data == 1) { // 오픈방일경우
				changeRoomNumber(seq);
			} else {
				checkRoomPassword(seq);
			}

		}
	});
}

// 접속하려는 방의 비밀번호를 확인한다.
function checkRoomPassword(seq) {

	var passwordValue = prompt('비밀번호를 입력하십시오.');
	if (!passwordValue) {
		return;
	}

	var post_data = "seq=" + seq;
	post_data += "&passwordValue=" + passwordValue;

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomPasswordCheck.php",
		data:post_data,
		success:function(data) {
			if (data == 'success') {
				changeRoomNumber(seq);
			} else {
				alert('비밀번호가 다릅니다.');
			}
		}
	});
}

// 접속한 방 번호를 변경한다.
function changeRoomNumber(seq) {

	$('input[name=joinRoomNumber]').val(seq);
	var post_data = $("input[name=joinRoomNumber]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomNumberChange.php",
		dataType:'json',
		data:post_data,
		success:function(data) {
			pageUpdate();

			var roomNumber = $('input[name=joinRoomNumber]').val();
			$('.joinRoomNumberSpan').html(data[0]);

			$('input[name=joinRoomName]').val(data[1]);
			$('input[name=ModifyRoomNameInput]').val(data[1]);
			$('.joinRoomNameSpan').html(data[1]);

			// 룸 세팅 박스를 표시하거나 제거한다.
			var reg_user_seq = data[2];
			changeRoomSettingBox(reg_user_seq);
			
			// 좌측 사이드 메뉴를 닫는다.
			$("html").removeClass("show-menu");

		} // End of success:function
	}); // End of $.ajax
}

// 룸 세팅 박스를 표시하거나 제거한다.
function changeRoomSettingBox(reg_user_seq) {
	var userSeq = $('input[name=userSeq]').val();
	if (userSeq == reg_user_seq) {
		$('.room-setting').css('display', 'block');
	} else {
		$('.room-setting').css('display', 'none');
	}
}

// 방 접속자를 불러온다.
function getRoomUserList() {
	$.ajax({
		url:'MODEL/getRoomUserList.php',
		dataType:'json',
		success:function(data) {
			var str = '';
			for (i=0; i<data.length; i++) {
				str += '<li>';
				for (j=0; j<data[i].length; j++) {
					str += data[i][j];
				}
				
				str += '</li>'
			} // End of for
			$('.roomUserList').html('<ul>'+str+'</ul>');

			updateRoomJoinUserCount(data);
		} // End of success
	}) // End of $.ajax
} // ENd of getRoomList()

function updateRoomJoinUserCount(value) {
	var userCount = value.length;
	$('.room-joinuser-count').html(" (" + userCount + ")");
}

// 방 삭제 confirm
function checkDeleteRoom() {
	if(confirm('정말로 삭제하시겠습니까?')) {
		putRoomDelete();
	}
}

// 방 삭제 실행
function putRoomDelete() {

	var seq = $('input[name=joinRoomNumber]').val();
	var post_data = 'del_seq=' + seq;

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomDelete.php",
		data:post_data,
		success:function(data) {
			pageUpdate();
			$('#roomModifyModal').modal('hide');
		}
	});

}

// 방 만들기 confirm
function checkCreateRoom() {
	if(confirm('룸을 생성 하시겠습니까?')) {
		putRoomCreate();
	}
}

// 방 만들기 실행
function putRoomCreate() {

	var post_data = $("form[name=main_form]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomCreate.php",
		data:post_data,
		success:function(data) {
			if (data == 'fail') {
				alert('중복된 방 이름이 있습니다.');
				return;
			}
			
			pageUpdate();
			changeRoomNumber(data);
			$('input[name=roomName]').val('');
			$('input[name=roomPasswordInput]').val('');
			$('#roomCreateModal').modal('hide');
			$("html").removeClass("show-menu");
		}
	});

}

// 접속한 방이 살아 있는지 체크
function checkJoinRoomLive() {
	var seq = $('input[name=joinRoomNumber]').val();
	var post_data = 'room_seq=' + seq;

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomCheckLive.php",
		data:post_data,
		success:function(data) {
			if (data == 'null') {
				changeRoomNumber(1); // 접속한 방이 삭제 되었을 경우 1번방으로 이동한다.
			}
		}
	});
}

// 방속성 수정 confirm
function checkModifyRoomSetting() {
	if(confirm('방속성을 수정 하시겠습니까?')) {
		putRoomSettingModify();
	}
}

// 방속성 수정 실행
function putRoomSettingModify() {

	var post_data = $("form[name=main_form]").serialize();

	$.ajax ({
		type:"POST",
		url:"MODEL/putRoomSettingModify.php",
		data:post_data,
		success:function(data) {
			pageUpdate();
			if (data == 'fail') {
				alert('중복된 방 이름이 있습니다.');
				return;
			} else if (data == 'error') {
				alert('잘못된 접근방식 입니다.');
				return;
			}

			$('input[name=joinRoomName]').val(data);
			$('input[name=ModifyRoomNameInput]').val(data);
			$('input[name=ModifyRoomPasswordInput]').val('');
			$('.joinRoomNameSpan').html(data);
			$('#roomModifyModal').modal('hide');
		}
	});

}

// 이동하는 방의 수정 버튼을 활성화 할지 확인 한다.
function roomModifyBtnCheck() {
	$.ajax ({
		type:"POST",
		url:"MODEL/getRoomModifyBtn.php",
		success:function(data) {
			if (data == 'block') {
				$(".rc-modify-btn").css("display", "block");
			} else {
				$(".rc-modify-btn").css("display", "none");
			}
		}
	});
}