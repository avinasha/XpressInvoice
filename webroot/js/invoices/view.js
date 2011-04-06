$(document).ready(function() { 
		
	msg();
	
	$('#grandtotal').numeric();
	
	/*Navigation*/
	$('#header_inner .nav li').removeClass('selected');
	$('#invoices').addClass('selected');
	
	/*CheckBox*/
	$('input:checkbox').checkbox({
	cls:'jquery-safari-checkbox',
	empty:'/img/empty.png'
	});
	$('input:radio').checkbox();
	
	$('#InCopyCheck').bind('check',function(){
		$('#InCopyData').val(1);
	});
	$('#InCopyCheck').bind('uncheck',function(){
		$('#InCopyData').val(0);
	});
	
	$('#ECopyCheck').bind('check',function(){
		$('#ECopyData').val(1);
	});
	$('#ECopyCheck').bind('uncheck',function(){
		$('#ECopyData').val(0);
	});
	
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
	
	/*DatePicker*/
	$('#AddPayment .datepicker').datepicker({ 
			dateFormat: 'yy-mm-dd',
			onSelect: function(dateText, inst){
				$('#AddPayment .datepickershow').html(dateText);
				$('#AddPayment .datepickerdate').val(dateText);
			}
	});
	$('#AddPayment .datepicker').attr('readonly','readonly');


	/*Validation & Submit*/
		/*Send Invoice*/
		$('#InvoiceSendinvoiceForm').validate({
		rules:{ 
			"data[subject]":"required",
			"data[msg]":"required",
			"data[email]":{required:true, email:true }
		},
		submitHandler: function(form) {
				$nc=$('#SendInvoiceSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						if(responseText=='1') {
						$('.vinstatus').removeClass('draft estimate sent due sent').addClass('sent').html('Sent');
						$('#_SendInvoice').hide();
						$('#_SendReminder').show();
						$('#_SendEstimate').hide();		
						$('#_EstimateLbl').hide();
						$('#_InvoiceNumLbl').show();
						$('#_InvoiceDateLbl').show();
						$('#_InvoiceDueLbl').show();
						$('#_InvoicePOLbl').show();
						$('#_InvoicePODLbl').show();
						$('#_InvoiceDCLbl').show();
						$('#_EstimateNum').hide();
						$('#_InvoiceNum').show();
						$('#_InvoiceDate').show();
						$('#_InvoiceDue').show();
						$('#_InvoicePO').show();
						$('#_InvoicePOD').show();
						$('#_InvoiceDC').show();
						$('#_InvoiceSign').show();
						$('.vintop').html('Tax Invoice');
						$('#_APon').show();
						$('#_APoff').hide();
						$('#message').html('<div id="flashMessage">Your Invoice Has Been Sent</div>');
						msg();
					}
					else {
						$('#message').html('<div id="flashMessage">Could Not Send Invoice. Try After Sometime</div>');
						msg();
					}
					$nc.show();
					$nc.siblings('.loading').hide();
					triggers.eq(3).overlay().close();
			}
			});
		},
		highlight: function(element, errorClass) {
			   $(element).css({'border':'1px solid #FED81C'});			
		  },
		errorPlacement: function(error, element) {
			 element.parent().siblings('.errmsg').html(error);
		   },
		errorElement: "span"
	});
	
	/*Send Estimate*/
		$('#InvoiceSendestimateForm').validate({
		rules:{ 
			"data[subject]":"required",
			"data[msg]":"required",
			"data[email]":{required:true, email:true }
		},
		submitHandler: function(form) {
				$nc=$('#SendEstimateSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						if(responseText=='1') {
						$('.vinstatus').removeClass('draft estimate sent due sent').addClass('estimate').html('Estimate');
						$('#_SendEstimate').hide();	
						$('#_EstimateLbl').show();
						$('#_InvoiceNumLbl').hide();
						$('#_InvoiceDateLbl').hide();
						$('#_InvoiceDueLbl').hide();
						$('#_InvoicePOLbl').hide();
						$('#_InvoicePODLbl').hide();
						$('#_InvoiceDCLbl').hide();
						$('#_EstimateNum').show();
						$('#_InvoiceNum').hide();
						$('#_InvoiceDate').hide();
						$('#_InvoiceDue').hide();
						$('#_InvoicePO').hide();
						$('#_InvoicePOD').hide();
						$('#_InvoiceDC').hide();
						$('#_InvoiceSign').hide();
						$('.vintop').html('Estimate');
						$('#message').html('<div id="flashMessage">Your Estimate Has Been Sent</div>');
						msg();
						}
						else {
							$('#message').html('<div id="flashMessage">Could Not Send Estimate. Try After Sometime</div>');
							msg();
						}
						$nc.show();
						$nc.siblings('.loading').hide();
						triggers.eq(1).overlay().close();
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
	
	/*Send Reminder*/
		$('#InvoiceSendreminderForm').validate({
		rules:{ 
			"data[subject]":"required",
			"data[msg]":"required"
		},
		submitHandler: function(form) {
				$nc=$('#SendReminderSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						if(responseText=='1') {
						$('#_SendReminder p').html('Send Reminder Again');
						$('#message').html('<div id="flashMessage">Your Reminder Has Been Sent</div>');
						msg();
						}
						else {
						$('#message').html('<div id="flashMessage">Could Not Send Reminder. Try After Sometime</div>');
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
	
	
	/*Send Thankyou*/
		$('#InvoiceSendthankyouForm').validate({
		rules:{ 
			"data[subject]":"required",
			"data[msg]":"required"
		},
		submitHandler: function(form) {
				$nc=$('#SendThankyouSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						if(responseText=='1') {
						$('#message').html('<div id="flashMessage">Your Thank you Has Been Sent</div>');
						msg();
						}
						else {
						$('#message').html('<div id="flashMessage">Could Not Send Thank you. Try After Sometime</div>');
						msg();
						}
						$nc.show();
						$nc.siblings('.loading').hide();
						triggers.eq(2).overlay().close();
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
	
	/*Add Payment*/
		$('#PaymentAddForm').validate({
		rules:{ 
			"data[Payment][amount]":"required"
		},
		submitHandler: function(form) {
				$nc=$('#AddPaymentSubmit');
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
	
	/*Change Status*/
	$('#_ChangeStatusField').change(function(){
		if($(this).val()!=''){
		$('#InvoiceChangestatusForm').submit();
		}
	});
	
});

function msg(){
	var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}