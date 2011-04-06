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
/*-----------------------------------*/
$('input:radio').checkbox();

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



/*Navigation*/
$('#header_inner .nav li').removeClass('selected');


$('#ChangePass .newinbut .bigbutton').click(function(){
	$this=$(this);
	$(this).siblings('.loading').show();
	$(this).hide();
	$('#UserChangepassForm').ajaxSubmit({
	success: function(responseText, responseCode){
				$this.show();
				$this.siblings('.loading').hide();
				$('#ChangePass .message').html(responseText);				
			},
	clearForm:true
});
});

});

function tocal(){
	if(checks[0]==1)
	{
		$('#changediscount').val('1');
	}
	else
	{
		$('#changediscount').val('0');
	}
	
	if(checks[1]==1)
	{
		$('#changetax1').val('1');
	}
	else
	{
		$('#changetax1').val('0');
	}
	
	if(checks[2]==1)
	{
		$('#changetax2').val('1');
	}
	else
	{
		$('#changetax2').val('0');
	}
	
	if(checks[3]==1)
	{
		$('#changeshipping').val('1');
	}
	else
	{
		$('#changeshipping').val('0');
	}
}

function msg(){
	var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
}