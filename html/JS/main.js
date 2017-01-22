
$(document).ready(function() {
	pageUpdate();
	setInterval(function() {
		pageUpdate();
	}, 3000);

});
		

function pageUpdate() {
	getChattingContent();
	getRoomList();
	getRoomUserList();
}