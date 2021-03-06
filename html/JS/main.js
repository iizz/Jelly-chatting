$(document).ready(function() {
	pageUpdate();
	checkUserNameFocus(); // 유저네임 변경 INPUT 포커스 확인
	if (getCookie("chattingUpdate")) {
		changeChattingUpdateIcon(0);
	} else {
		changeChattingUpdateIcon(1);
	}
	setInterval(function() {
		if (!getCookie("chattingUpdate")) {
			chattingUpdate();
		}
	}, 3000);
});

// AJAX 를 호출해서 페이지를 업데이트 한다.
function pageUpdate() {
	checkJoinRoomLive(); // 접속한 방이 살아 있는지 체크
	getChattingContent(); // 채팅 내용을 불러온다.
	getRoomList(); // 룸 리스트를 불러온다.
	getRoomUserList(); // 룸 접속 유저 리스트를 불러온다.
	getUserTotalCount(); // 젤팅 전체 접속자를 불러온다.
	roomModifyBtnCheck(); // 이동하는 방의 수정 버튼을 만들지 확인 한다.
}

// 채팅 내용만 UPDATE 한다.
function chattingUpdate() {
	getChattingContent(); // 채팅 내용을 불러온다.
}


