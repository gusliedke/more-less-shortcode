(function($){
$(document).ready(function($){
		// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
	$('.moreless').click(function(e){
		e.preventDefault();
	  	label = $(this).html();
		$(this).next('.content-hide').addClass('on');
		$('.content-hide.on').toggle().removeClass('on');

		var text = (label == 'Show less') ? 'Show more' : 'Show less';
		$(this).html(text); 
	});
});

})(jQuery);
