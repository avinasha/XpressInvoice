<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		Xpress Invoice
	</title>
	<?php
		echo $html->meta('icon'); 
		echo $html->css('reset');
		echo $html->css('grid');
		echo $html->css('login');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="modal" id="NewClient"> 
	<div class="header"><?php echo $html->image('logo.jpg'); ?></div>
 	<?php $session->flash(); ?>
	<div class="content"><?php echo $content_for_layout; ?></div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>