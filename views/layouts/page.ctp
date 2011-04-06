<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Xpress Invoice - <?php echo $title_for_layout; ?></title>
	<?php
		echo $html->meta('icon');
		echo $html->css('reset');
		echo $html->css('grid');
		echo $html->css('page/general');
		
		echo $javascript->link('jquery'); 
		echo $javascript->link('jquery.form');
		echo $javascript->link('jquery.tools');
		echo $javascript->link('jquery.scrollTo');
		echo $javascript->link('jquery.localscroll');
		echo $scripts_for_layout;
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$.localScroll({
			queue:true,
			duration:1000,
			hash:false
			});
			
			var triggers = $(".modalInput").overlay({ 
			// some expose tweaks suitable for modal dialogs
			effect: 'apple', 
			expose: { 
				color: '#333', 
				loadSpeed: 200, 
				opacity: 0.9 
			},
			closeOnClick: true
			});
		});
	</script>
	
</head>
<body>
	<?php echo $content_for_layout; ?>
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9968354-4");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>