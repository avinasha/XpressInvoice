$(document).ready(function() { 
	msg();
	
		/*Overlay Code*/
var triggers = $(".modalInput").overlay({ 
	// some expose tweaks suitable for modal dialogs
	effect: 'apple', 
	expose: { 
        color: '#333', 
        loadSpeed: 200, 
	    opacity: 0.9 
    },
	closeOnClick: false
});


/*Send Reply*/
		$('#InvoiceSendreplyForm').validate({
		rules:{ 
			"data[subject]":"required",
			"data[msg]":"required"
		},
		submitHandler: function(form) {
				$nc=$('#SendReplySubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						if(responseText=='1') {
						$('#message').html('<div id="flashMessage">Your Reply Has Been Sent</div>');
						msg();
						}
						else {
						$('#message').html('<div id="flashMessage">Could Not Send Reply. Try After Sometime</div>');
						msg();
						}
						$nc.show();
						$nc.siblings('.loading').hide();
						triggers.eq(0).overlay().close();
			}
			});
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
	var t=setTimeout(dis,6000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}