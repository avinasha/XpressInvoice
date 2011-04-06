<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $Invoice['Company']['name'].' - '; ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('reset');
		echo $html->css('grid');
		echo $html->css('general');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="header">
		<div id="header_inner">
			<div  class="row">
				<div class="column grid_6 title" id="title"><?php echo $Invoice['Company']['name'];?></div>
			</div>
		</div>			
	</div>
	
	
	<div id="container">
		<div  class="row" id="content">
			<div class="column grid_14">
				<?php $session->flash(); ?>
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<div id="content_bottom"></div>
		<div class="row" id="footer">
			<div class="row" id="footer">
			<div class="column grid_14">
				Powered By Xpress Invoice
			</div>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>