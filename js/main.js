$=jQuery.noConflict(); //allows me to use the $ instead of having to say jQuery in this file
$(document).ready(function(){
	$('.membership_sidebar a.nav-tab').click(function(){
		var index = $('.membership_sidebar a.nav-tab').index(this);
		$('.meta-box-sortables div.nav-box').hide();
		$('.meta-box-sortables div.nav-box:eq(' + index + ')').show();
	});
});