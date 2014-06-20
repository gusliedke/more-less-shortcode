(function($){
$(document).ready(function($){
		// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
	$('.moreless').click(function(e){
		e.preventDefault();
	  	label = $(this).html();
		$('.content-hide').toggle();

		var text = (label == 'Show less') ? 'Show more' : 'Show less';
		$(this).html(text); 
	});
});

})(jQuery);
