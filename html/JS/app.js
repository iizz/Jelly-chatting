/* ****************************************************************************
 *
 * Copyright 2017 Jelly Chatting. All right reserved.
 *
 * ****************************************************************************
 * 
 *  CREATOR : river0427@daum.net (Kim, Ga-ram)
 *  DATE    : 2017. 05. 05
 *  ENCODING: UTF-8
 * 
 *  DETAIL: 젤팅 전체 jS
 * 
 *************************************************************************** */

$(document).ready(function() {

	// 채팅방 만들기 기능 비밀번호 input 창 Show and Hide
	$(".rc-input").change( function() {
		if( $(this).val() == 0 ) {
			$(".rc-pw").css("display", "block");
		}
		else {
			$(".rc-pw").css("display", "none");
		}
	});

	// 채팅방 수정 기능 비밀번호 input 창 Show and Hide
	$(".rc-open").change( function() {
		if( $(this).val() == 0 ) {
			$(".rc-modify-pw").css("display", "block");
		}
		else {
			$(".rc-modify-pw").css("display", "none");
		}
	});
	
	// 모바일 체크
	checkMobile();
	function checkMobile() {
		var filter = "win16|win32|win64|mac";
		 
		if (navigator.platform) {
			if (0 > filter.indexOf(navigator.platform.toLowerCase())) {
				userDeviceMobile(); // MOBILE 
			} else {
				userDevicePC(); // PC
				//userDeviceMobile();
			}
		}

		// PC
		function userDevicePC() {
			$("select[name=state]").val("1").prop("checked", true);
		}

		// MOBILE
		function userDeviceMobile() {
			$("select[name=state]").val("2").prop("checked", true);

			$(".chat-content").css("width", "79%");
			$(".chat-btn").css("width", "20%");
		}
	}

	
	
	
});

// 채팅 갱신 변경
function changeChattingUpdate() {

	//alert(getCookie("chattingUpdate"));
	if (getCookie("chattingUpdate")) { // 업데이트 상태로 바꾼다.
		setCookie("chattingUpdate", "", -1);
		changeChattingUpdateIcon(1);
	} else { // 정지 상태로 바꾼다.
		setCookie("chattingUpdate", "1", 7);
		changeChattingUpdateIcon(0);
	}
}

// 아이콘 변경
function changeChattingUpdateIcon(key) {

	if (key) { // 업데이트 상태로 바꾼다.
		$(".changeChattingUpdate > button > .glyphicon-play").css("display", "none");
		$(".changeChattingUpdate > button > .glyphicon-pause").css("display", "block");
	} else { // 정지 상태로 바꾼다.
		$(".changeChattingUpdate > button > .glyphicon-pause").css("display", "none");
		$(".changeChattingUpdate > button > .glyphicon-play").css("display", "block");
	}
}


// 쿠키 생성
function setCookie(cName, cValue, cDay) {
	var expire = new Date();
	expire.setDate(expire.getDate() + cDay);
	cookies = cName + '=' + escape(cValue) + '; path=/ '; // 한글 깨짐을 막기위해 escape(cValue)를 합니다.
	if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
	document.cookie = cookies;
}

// 쿠키 가져오기
function getCookie(cName) {
	cName = cName + '=';
	var cookieData = document.cookie;
	var start = cookieData.indexOf(cName);
	var cValue = '';
	if(start != -1){
			start += cName.length;
			var end = cookieData.indexOf(';', start);
			if(end == -1)end = cookieData.length;
			cValue = cookieData.substring(start, end);
	}
	return unescape(cValue);
}