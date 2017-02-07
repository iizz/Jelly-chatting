/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
(function() {

	var htmlEl = document.body.parentElement,
		content = document.querySelector( '.content-wrap' ),
		openbtn = document.getElementById( 'open-button' ),
		closebtn = document.getElementById( 'close-button' ),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents() {
		openbtn.addEventListener( 'click', toggleMenu );
		if( closebtn ) {
			closebtn.addEventListener( 'click', toggleMenu );
		}

		// close the menu element if the target it´s not the menu element or one of its descendants..
//		content.addEventListener( 'click', function(ev) {
//			var target = ev.target;
//			if( isOpen && target !== openbtn ) {
//				toggleMenu();
//			}
//		} );
	}

	function toggleMenu() {
		if( isOpen ) {
			classie.remove( htmlEl, 'show-menu' );
		}
		else {
			classie.add( htmlEl, 'show-menu' );
		}
		isOpen = !isOpen;
	}

	init();

})();