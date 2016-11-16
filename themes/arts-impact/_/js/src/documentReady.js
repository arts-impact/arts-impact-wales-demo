$ = window.$ = window.jQuery = require('jquery');
import fitVids from 'fitvids';
import squishMenu from 'squishMenu';

$(document).ready(function(){

	$('.site-nav-wrapper').squishMenu();
	fitVids('.site-content-wrapper');

	// Accessible tabs
	// http://accessibility.athena-ict.com/aria/examples/tabpanel2.shtml
	$("[role='tab']").click(function(){
      //deselect all the tabs
      $("li[role='tab']").attr("aria-selected","false");

      // select this tab
      $(this).attr("aria-selected","true");

      //find out what tab panel this tab controls
      var tabpanid= $(this).attr("aria-controls");
      var tabpan = $("#"+tabpanid);

      //hide all the panels
      $("div[role='tabpanel']").attr("aria-hidden","true");

      // show our panel
      tabpan.attr("aria-hidden","false");
   });

	/* EU Cookie Law */
	/* Uncomment to add meesage
	/* TODO - CSS :) */
	// if ( !Cookies( 'cookie-pop' ) ) {
	//   $('body').prepend(
	//     '<div class="cookie-pop site-notice"><svg class="site-notice-icon"><use xlink:href="#notice"></use></svg><span class="cookie-law">Our site uses Cookies</span><button class="button" id="accept-cookie">OK?</button></div>'
	//   );

	//   $( '#accept-cookie' ).click(function () {
	//     Cookies.set( 'cookie-pop', 'set' );
	//     $( '.cookie-pop' ).remove();
	//   });
	// }

});