window._site.forumUser = "";
$(document).ready( function () {
	window._site.comments( $('div.content div.comments'), [] );
} );window._site.page = "examples\/basic_init\/multiple_tables.html";

$(document).ready( function () {
	window._site.dynamicLoaded();
} );

window._site.csrfToken = '2cc52d3dd7fa81d55d6306f2dbfac912bef2785d8bea9e8f';


$(document).ready(function () {
	var loaded = false;
	var headerAd = true;

	if (window.ethicalads) {
		ethicalads.wait.then(function (placements) {
			if (headerAd) {
				$('div.fw-header').addClass('ad');
			}

			if (! placements.length) {
				$('div.ad').html('<div class="ad-backup"><a href="/purchase">Please consider supporting DataTables by joining us as a supporter or white listing this site in your ad-blocker.</a></div>');
			}
		});
	}
	else {
		$('div.ad').html('<div class="ad-backup"><a href="/purchase">Please consider supporting DataTables by joining us as a supporter or white listing this site in your ad-blocker.</a></div>');
	}

	var run = function () {
		if (! loaded && $(window).width() >= 860) {
			if (window.ethicalads) {
				ethicalads.load();
				loaded = true;
			}
		}
	}

	if ($('div.page-nav').length && $('div.page-nav').is(':visible')) {
		$('div.nav-ad').children()
			.attr('id', 'ad-fixed-nav')
			.prependTo('div.page-nav');
		headerAd = false;
	}
	else if ($('div.fw-sidebar').length) {
		$('div.nav-ad').children()
			.attr('id', 'ad-forum-nav')
			.prependTo('div.fw-sidebar div.sidebar');
		headerAd = false;
		return; // disable
	}
	else {
		$('div.nav-ad').children()
			.attr('id', 'ad-header');
	}

	$(window).on('resize', function (){
		run();
	});

	run();
});


