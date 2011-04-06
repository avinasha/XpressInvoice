$(document).ready(function(){

msg();

/*Navigation*/
$('#header_inner .nav li').removeClass('selected');
$('#clients').addClass('selected');

/*ListActions*/
$('.sentlist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#ffddcc 2px solid','border-bottom':'#ffddcc 2px solid'}); $(this).children('.listactions').css({'border-top':'#ffddcc 2px solid','border-bottom':'#ffddcc 2px solid'}).show();},function(){ $(this).css({'background':'#ffddcc'}); $(this).children('.listactions').hide();});

/*Toggle Add Client*/
$('.toggleAddInvoice').click(function(){
	$('#NewInvoice').slideToggle();
	$('#ListClients').slideToggle();
});
$('.newincancel').click(function(){
	$('#NewInvoice').slideToggle();
	$('#ListClients').slideToggle();
});
$('.more').click(function(){
	$(this).parents('.sentlist').next().slideToggle();
});

$('#ClientAddForm').validate({
		rules:{
			"data[Client][name]":"required",
			"data[Client][email]":{email:true}
		},
		submitHandler: function(form) {
				$nc=$('#NewClientSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				form.submit();
		},
		highlight: function(element, errorClass) {
			 $(element).css({'border':'1px solid #FED81C'});
		  },
		errorPlacement: function(error, element) {
			 element.siblings('.errmsg').html(error);
		   },
		errorElement: "span"
	});
});
function msg(){
	var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}