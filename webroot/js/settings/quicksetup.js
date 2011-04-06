$(document).ready(function(){
	msg();
	
	$('#SettingQuicksetupForm').validate({
		submitHandler: function(form) {
				$nc=$('#QSetupSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				form.submit();
		},
		highlight: function(element, errorClass) {
			    $(element).css({'border':'1px solid #FED81C'});			
		  },
		errorPlacement: function(error, element) {
			 element.parents('form').find('.errmsg').html(error);
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