(function($) {
	$.noConflict();
	jQuery( document ).ready(function( $ ) {
	    $('.fitVid').fitVids();
	    $('#demo1').scrollbox();
	    $('#demo5').scrollbox({
		  direction:'h',
		  linear: "true",
		  step: 1,
		  delay: 0
		});
		$('nav.primary ul > li:not(:has(>ul))').css('border-left', '1px solid white');
	});
})(jQuery);

