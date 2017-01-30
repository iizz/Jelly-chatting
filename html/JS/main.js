
$(document).ready(function() {
	pageUpdate();
	checkUserNameFocus(); // 유저네임 변경 INPUT 포커스 확인
	setInterval(function() {
		//pageUpdate();
	}, 5000);
  
  $(".chat-area ul").mCustomScrollbar({
    advanced:{
      updateOnContentResize: true
    }
  });
});

// AJAX 를 호출해서 페이지를 업데이트 한다.
function pageUpdate() {
	checkJoinRoomLive(); // 접속한 방이 살아 있는지 체크
	getChattingContent(); // 채팅 내용을 불러온다.
	getRoomList(); // 룸 리스트를 불러온다.
	getRoomUserList(); // 룸 접속 유저 리스트를 불러온다.
	getUserTotalCount(); // 젤팅 전체 접속자를 불러온다.
}