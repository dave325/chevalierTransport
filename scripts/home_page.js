/**
 * Theme: Chevalier Transport Custom Theme Description: Javascript file for the
 * home page. DO NOT ALTER!
 */
jQuery(document).ready(function() {
	var $j = jQuery;
	if ($j(window).width() <= 990) {
		window.location = "http://m.chevaliertransport.com";
	}
	$j(window).resize(function() {
		if ($j(window).width() <= 990) {
			window.location = "http://m.chevaliertransport.com";
		}
	});
});