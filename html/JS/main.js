
$(document).ready(function() {
	pageUpdate();
	setInterval(function() {
		pageUpdate();
	}, 5000);

});
		

function pageUpdate() {
	getChattingContent();
	getRoomList();
	getRoomUserList();
}