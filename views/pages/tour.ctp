<?php 
	echo $html->css('page/form');
	echo $html->css('page/structure');
	echo $html->css('page/theme');
	echo $javascript->link('jquery.validate'); 
	echo $javascript->link('pages/signup'); 
	echo $javascript->link('pages/index'); 
?>

<div id="status">
<div class="row center status_con">
	<div class="column grid_11 nav">
	<ul>
		<li><a href="/" title="">Home</a></li>
		<li><?php echo $html->link('Sign In',array('controller'=>'Users','action'=>'login'),array('class'=>'imp')); ?></li>
		<li>| Call Us : +919980820256</li>
	</ul>
	</div>
	
	<div class="column grid_3 nav">
		<?php echo $html->link($html->image('page/logobw.png'),'http://thetechfolder.com',array('escape' => false,'title'=>'TechFolder','class'=>'logobw'));?>
	</div>
</div>
</div>

<div id="content">
<div class="row">
	<div class="column grid_10">
		<div id="container">
		
		<?php echo $html->image('logo.jpg');?>
	
		<?php $session->flash(); ?>
		
		<h1>Tour / Slideshow</h1>
		
		<div class="margin30" style="width:425px" id="__ss_3695197"><strong style="display:block;margin:12px 0 4px"><a href="http://www.slideshare.net/techfolder/xpress-invoice-3695197" title="Xpress Invoice">Xpress Invoice</a></strong><object width="425" height="355"><param name="movie" value="http://static.slidesharecdn.com/swf/ssplayer2.swf?doc=pptmail-100412020949-phpapp01&rel=0&stripped_title=xpress-invoice-3695197" /><param name="allowFullScreen" value="true"/><param name="allowScriptAccess" value="always"/><embed src="http://static.slidesharecdn.com/swf/ssplayer2.swf?doc=pptmail-100412020949-phpapp01&rel=0&stripped_title=xpress-invoice-3695197" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="355"></embed></object><div style="padding:5px 0 12px">View more <a href="http://www.slideshare.net/">presentations</a> from <a href="http://www.slideshare.net/techfolder">TechFolder</a>.</div></div>

		</div><!--container-->
	</div>
	<div class="column grid_4">
	<div class="links">Follow Us On <a href="http://www.google.com/chrome" title="http://www.facebook.com/pages/Xpress-Invoice/114706118543729">Facebook</a></div>
	</div>
</div>
</div>
<?php echo $this->element('footer'); ?>

