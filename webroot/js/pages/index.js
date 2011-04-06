(function($){
	$(document).ready(function(){
	var t;
	$('#click').click(function(){
		$('#PagesSendcontactForm').ajaxSubmit({
			success: function(responseText, responseCode){
				$('#ajaxMessage').show().html(responseText);
				t=setTimeout(clear,5000);
			},
			resetForm: true
		});
	});
	
	function clear(){
		$('#ajaxMessage').fadeOut();
		clearTimeout(t);
	}
	});	
	})(jQuery);		