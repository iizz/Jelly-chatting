
$(document).ready(function() {
	pageUpdate();
	setInterval(function() {
		//pageUpdate();
	}, 5000);

});

// AJAX 를 호출해서 페이지를 업데이트 한다.
function pageUpdate() {
	checkJoinRoomLive();
	getChattingContent();
	getRoomList();
	getRoomUserList();
}