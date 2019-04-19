


alert("bef");
jQuery(document).ready(function($) {
	alert("READY");
	tab = $('.tabs h3 a');
	

	tab.on('click', function(event) {
		alert("Click here");
		
		
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');

		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});
});