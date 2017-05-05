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
	
	//
	$(".menu-button").click( function() {
		$("html").addClass("show-menu");
	});
	
	$(".contents-curtains").click( function() {
		$("html").removeClass("show-menu");
	});
	
	
	
	
	
	//
	$(".rc-open").change( function() {
		if( $(this).val() == 0 ) {
			$(".rc-pw").css("display", "block");
		}
		else {
			$(".rc-pw").css("display", "none");
		}
	});
	
	
	
	
});

