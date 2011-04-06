$(document).ready(function(){
/*Navigation*/
$('#header_inner .nav li').removeClass('selected');
$('#clients').addClass('selected');

$('.newinbut .bigbutton').click(function(){
	$('.newinbut .loading').show();
	$(this).hide();
});
});