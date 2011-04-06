$(document).ready(function(){
	msg();
	
	var check=0;
	$('.field').focusin(function(){ $(this).parents('li').css({'background':'#faffbd'}); });
	$('.field').focusout(function(){ $(this).parents('li').css({'background':'#ffffff'}); });
	
	$('#Fieldcname').change(function(){ var cid=this; if($('#Fieldcid').val()=='') { $('#Fieldcid').val($(cid).val().replace(/ /g,'')); $('#Fieldcid').trigger('change');} });
	$('#Fieldcid').change(checkid);
	$('#Fieldcid').focusout(checkid);
	$('#Fielduser').change(checkuser);
	$('#Fielduser').focusout(checkuser);
								
	$.validator.addClassRules("ptype", { cRequired: true });
	$.validator.addClassRules("pdes", { cRequired: true });
	$('#CompanyAddForm').validate({
		rules:{
			"data[Company][url]":"required",
			"data[Company][name]":"required",
			"data[Company][email]":{required:true, email:true },
			"data[User][name]":"required",
			"data[User][username]":"required",
			"data[User][password]":"required",
			"data[User][repassword]":{required:true, equalTo:'#Fieldpass'} 
		},
		messages:{
			"data[User][repassword]":"Passwords Do Not Match" 
		},
		submitHandler: function(form) {
				$nc=$('#NewSignUpSubmit');
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
	
	function checkid(){
		var $this=$('#Fieldcid');
		$this.siblings('.loading').show();
		var val=$('#Fieldcid').val();
		val='http://xpressinvoice.com/Companies/checkid/'+val;
		$.ajax({ url: val, 
			success: function(msg){
				if(msg=='1') $this.siblings('.errmsg').html('<span style="color:#00ff00;font-weight:bold;">Company ID Available</span>');
				if(msg=='0') $this.siblings('.errmsg').html('<span style="color:#ff0000;font-weight:bold;">Company ID Not Available</span>');
				$this.siblings('.loading').hide();
			}
		});
	}
	
	function checkuser(){
		var $this=$('#Fielduser');
		$this.siblings('.loading').show();
		var val=$('#Fielduser').val();
		val='http://xpressinvoice.com/Users/checkid/'+val;
		$.ajax({ url: val, 
			success: function(msg){
				if(msg=='1') $this.siblings('.errmsg').html('<span style="color:#00ff00;font-weight:bold;">Username Available</span>');
				if(msg=='0') $this.siblings('.errmsg').html('<span style="color:#ff0000;font-weight:bold;">Username Not Available</span>');
				$this.siblings('.loading').hide();
			}
		});
	}
});
function msg(){
	var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}