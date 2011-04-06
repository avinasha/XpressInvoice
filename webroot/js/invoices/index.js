var count=0;
var checks=new Array(0,0,0,0,0);

$(document).ready(function() { 
	
	msg();
		
/*Numeric*/
$('.num').numeric();
$('.num').change(function(){
if($(this).val()=='')
{
	$(this).val($(this).siblings('.default').val());
}
});
/*DatePicker*/
$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd'});
$('.datepicker').attr('readonly','readonly');

/*CheckBox*/
$('input:checkbox').checkbox({
	cls:'jquery-safari-checkbox',
	empty:'/img/empty.png'
});

/*Init Settings*/
$('.df').hide();
$('.t1n').hide();
$('.t2n').hide();
$('.t1').hide();
$('.t2').hide();
$('.sc').hide();

/*Settings Events*/
$('.dcb').bind('check',function(){
	checks[0]=1;
	$('.df').removeAttr('disabled').show();
	tocal();
});
$('.dcb').bind('uncheck',function(){
	checks[0]=0;
	$('.df').attr('disabled','disabled').hide();
	tocal();
});
$('.df').change(function(){
	tocal();
});
/*-----------------------------------*/
$('.t1cb').bind('check',function(){
	checks[1]=1;
	$('.t1n').removeAttr('disabled').show();
	$('.t1').removeAttr('disabled').show();
	tocal();
});
$('.t1cb').bind('uncheck',function(){
	checks[1]=0;
	$('.t1').attr('disabled','disabled');
	$('.t1n').attr('disabled','disabled');
	$('.t1n').hide();
	$('.t1').hide();
	tocal();
});
$('.t1n').change(function(){
	tocal();
});
$('.t1').change(function(){
	tocal();
});
/*----------------------------------*/
$('.t2cb').bind('check',function(){
	checks[2]=1;
	$('.t2n').removeAttr('disabled').show();
	$('.t2').removeAttr('disabled').show();
	tocal();
});
$('.t2cb').bind('uncheck',function(){
	checks[2]=0;
	$('.t2').attr('disabled','disabled');
	$('.t2n').attr('disabled','disabled');
	$('.t2n').hide();
	$('.t2').hide();
	tocal();
});
$('.t2n').change(function(){
	tocal();
});
$('.t2').change(function(){
	tocal();
});
/*-----------------------------------*/
$('.sccb').bind('check',function(){
	checks[3]=1;
	$('.sc').removeAttr('disabled').show();
	tocal();
});
$('.sccb').bind('uncheck',function(){
	checks[3]=0;
	$('.sc').attr('disabled','disabled');
	$('.sc').hide();
	tocal();
});
$('.sc').change(function(){
	tocal();
});
/*-----------------------------------*/
$('input:radio').checkbox();
 /*-----------------------------------*/
$('.roundoff').bind('check',function(){
	checks[4]=1;
	tocal();
});
$('.roundoff').bind('uncheck',function(){
	checks[4]=0;
	tocal();
});

/*Load Settings*/
$('input:checkbox').trigger('uncheck');
if($('.dcb').siblings('.default').val()!='')
{
	$('.dcb').trigger('click');
}
if($('.t1cb').siblings('.default').val()!='')
{
	$('.t1cb').trigger('click');
}
if($('.t2cb').siblings('.default').val()!='')
{
	$('.t2cb').trigger('click');
}
if($('.sccb').siblings('.default').val()!='')
{
	$('.sccb').trigger('click');
}

/*ListActions*/
$('.draftlist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#e6e6e6 2px solid','border-bottom':'#e6e6e6 2px solid'}); $(this).children('.listactions').css({'border-top':'#e6e6e6 2px solid','border-bottom':'#e6e6e6 2px solid'}).show();},function(){ $(this).css({'background':'#e6e6e6'}); $(this).children('.listactions').hide();});
$('.duelist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#ef9292 2px solid','border-bottom':'#ef9292 2px solid'}); $(this).children('.listactions').css({'border-top':'#ef9292 2px solid','border-bottom':'#ef9292 2px solid'}).show();},function(){ $(this).css({'background':'#ef9292'}); $(this).children('.listactions').hide();});
$('.paidlist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#c9ffe2 2px solid','border-bottom':'#c9ffe2 2px solid'}); $(this).children('.listactions').css({'border-top':'#c9ffe2 2px solid','border-bottom':'#c9ffe2 2px solid'}).show();},function(){ $(this).css({'background':'#c9ffe2'}); $(this).children('.listactions').hide();});
$('.sentlist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#ffddcc 2px solid','border-bottom':'#ffddcc 2px solid'}); $(this).children('.listactions').css({'border-top':'#ffddcc 2px solid','border-bottom':'#ffddcc 2px solid'}).show();},function(){ $(this).css({'background':'#ffddcc'}); $(this).children('.listactions').hide();});
$('.estimatelist').hover(function(){ $(this).css({'background':'#ffffff','border-top':'#c2eaff 2px solid','border-bottom':'#c2eaff2px solid'}); $(this).children('.listactions').css({'border-top':'#c2eaff 2px solid','border-bottom':'#c2eaff 2px solid'}).show();},function(){ $(this).css({'background':'#c2eaff'}); $(this).children('.listactions').hide();});

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

/*Trigger Client Filter*/
$('.clientchange').change(function(){
	$('.clientchangesubmit').trigger('click');
});

$('#announce .hide').click(function(){ $('#announce').hide(); });
/*Toggle Invoice Settings*/
$('.insettingshead').click(function(){
	$('.insettings').slideToggle();
}).toggle(function(){ $(this).html('Hide Invoice Settings');},function(){ $(this).html('Show Invoice Settings');});

/*Toggle Add Invoice*/
$('.toggleAddInvoice').click(function(){
	$('#NewInvoice').slideToggle();
	$('#ListInvoices').slideToggle();
});
$('.newincancel').click(function(){
	$('#NewInvoice').slideToggle();
	$('#ListInvoices').slideToggle();
});

/*Navigation*/
$('#header_inner .nav li').removeClass('selected');
$('#invoices').addClass('selected');

/*Items Setup*/
init();

$('.itemdel').livequery('click',removeItem);
$('.qtycal').livequery('change',qtycal);
$('.pricecal').livequery('change',pricecal);
$('.items ul').livequery(initcal,exitcal);


$.validator.addMethod("cRequired", $.validator.methods.required,"You have missed Item type(Hour, Day, Prdouct...) or Item Description ");
$.validator.addClassRules("ptype", { cRequired: true });
$.validator.addClassRules("pdes", { cRequired: true });
$('#InvoiceAddForm').validate({
		rules:{
			"data[Invoice][number]":"required",
			"data[Invoice][currency]":"required",
			"data[Invoice][date]":"required"
		},
		submitHandler: function(form) {
				$nc=$('#NewInvoiceSubmit');
				$nc.hide();
				$nc.siblings('.loading').css({'display':'block'});
				form.submit();
		},
		highlight: function(element, errorClass) {
			 $(element).css({'border':'1px solid #FED81C'});
		  },
		errorPlacement: function(error, element) {
			 element.parents(".erroot").find('.errmsg').html(error);
		   },
		errorElement: "span"
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
				$(form).ajaxSubmit({
					success: function(responseText, responseCode){
						$('.clientfield option').removeAttr('selected');
						$('.clientfield').append(responseText);
						$('.clientchange').append(responseText);
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

function init(){
addItem();
}

function removeItem(id){
	if(count>1){
	$(id).remove();
	count--;
	$('#count').val(count);
	cal();
	}
	else{
		alert('Invoice Has To Have Atleast One Item');
	}
}

function addItem(){
if(count<5) {
$('.items').append('<span class="erroot"><ul id="Item'+count+'"><li class="actions"><a href="#" onClick="removeItem(\'#Item'+count+'\')">Delete</a></li><li class="qty"><input class="num qtycal" type="text" size="2" name="data[InvoiceItem]['+count+'][quantity]" value="0"/>&nbsp;&nbsp;<input class="ptype" name="data[InvoiceItem]['+count+'][type]" size="3"/></li><li class="des"><textarea class="pdes" name="data[InvoiceItem]['+count+'][description]"></textarea></li><li class="price"><input class="num pricecal pricenum" type="text" name="data[InvoiceItem]['+count+'][price]" value="0"/></li><li class="total">0</li><input type="hidden" value="0.0" class="itemtotal"/><input type="hidden" name="data[InvoiceItem]['+count+'][order]" value="'+count+'"/></ul><p class="errmsg"></p></span>');
count++;
$('#count').val(count);
}
else
{
alert('An Invoice Can Have Only Five Items');
}
}

var initcal=function(){
	$(this).find('.qtycal').numeric();
	$(this).find('.pricecal').numeric();
	var qty=$(this).find('.qtycal').val();	
	var price=$(this).find('.pricecal').val();
	var total=qty*price;
	total=total.toFixed(2);
	$(this).find('.total').html(total);
	$(this).find('.itemtotal').val(total);
	cal();
}

var exitcal=function(){
	tocal();
}

function qtycal(){
	if($(this).val()=='' || $(this).val()<0)
	{
		$(this).val(0);
	}
	var qty=$(this).val();
	var ul=$(this).parent().parent();
	var price=ul.find('.pricecal').val();
	var total=qty*price;
	total=total.toFixed(2);
	ul.find('.total').html(total);
	ul.find('.itemtotal').val(total);
	cal();
}

function pricecal(){
	if($(this).val()==''  || $(this).val()<0)
	{
		$(this).val(0);
	}
	var price=$(this).val();
	var ul=$(this).parent().parent();
	var qty=ul.find('.qtycal').val();
	var total=qty*price;
	total=total.toFixed(2);
	ul.find('.total').html(total);
	ul.find('.itemtotal').val(total);
	cal();
}

function cal(){
	var i;
	var subtotal=0;
	$('.items ul').each(function(){
		subtotal+=parseFloat($(this).find('.itemtotal').val());
	});
	subtotal=subtotal.toFixed(2);
	$('#subtotal').html(subtotal);
	$('.subtotal').val(subtotal);
	tocal();
}

function tocal(){
	var sb=parseFloat($('.subtotal').val());
	var gross=sb;
	if(checks[0]==1)
	{
		$('#dflb').css({'display':'block'}).html('Discount ('+$('.df').val()+'%)<br/>');
		var temp=(sb*parseFloat($('.df').val()))/100;
		temp=temp.toFixed(2);
		$('#df').show().html('-'+temp+'<br/>');
		gross=sb-parseFloat(temp);
	}
	else
	{
		$('#dflb').hide();
		$('#df').hide();
	}
	
	if(checks[1]==1)
	{
		$('#t1lb').css({'display':'block'}).html($('.t1n').val()+'('+$('.t1').val()+'%)<br/>');
		var temp=(sb*parseFloat($('.t1').val()))/100;
		temp=temp.toFixed(2);
		$('#t1').show().html('+'+temp+'<br/>');
		gross=gross+parseFloat(temp);
	}
	else
	{
		$('#t1lb').hide();
		$('#t1').hide();
	}
	
	if(checks[2]==1)
	{
		$('#t2lb').css({'display':'block'}).html($('.t2n').val()+'('+$('.t2').val()+'%)<br/>');
		var temp=(sb*parseFloat($('.t2').val()))/100;
		temp=temp.toFixed(2);
		$('#t2').show().html('+'+temp+'<br/>');
		gross=gross+parseFloat(temp);
	}
	else
	{
		$('#t2lb').hide();
		$('#t2').hide();
	}
	
	if(checks[3]==1)
	{
		$('#sclb').css({'display':'block'});
		$('#sc').show().html('+'+$('.sc').val()+'<br/>');
		gross=gross+parseFloat($('.sc').val());
	}
	else
	{
		$('#sclb').hide();
		$('#sc').hide();
	}
	
	if(checks[4]==1)
	{
		var temp=Math.round(gross);
		var ex=temp-gross;
		ex=ex.toFixed(2);
		$('#rlb').show();
		$('#r').show().html(ex+'<br/>');
		$('#rval').val(ex);
		gross=temp;
	}
	else
	{
		$('#rlb').hide();
		$('#r').hide();
	}
	gross=gross.toFixed(2);
	$('#gross').html(gross);
	$('#grandtotal').val(gross);
}

function msg(){
	var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}