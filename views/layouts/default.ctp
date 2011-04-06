<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $session->read('Company.name').' - ';?> 
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
				<div class="column grid_6 title" id="title"><?php echo $session->read('Company.name');?></div>
			
				<div class="column grid_8">				
					<div class="row menutop">
						<div class="column grid_8">
							<ul class="menu">
								<!--<li><?php echo $html->link('Upgrade',array('controller'=>'companies','action'=>'upgrade')); ?></li>-->
								<li><?php echo $html->link('Account',array('controller'=>'settings','action'=>'index')); ?></li>
								<li><?php echo $html->link('Logout',array('controller'=>'users','action'=>'logout')); ?></li>
							</ul>
						</div>
					</div>
					
					<div class="row menubot">
						<div class="column grid_8">
							<ul class="nav">
								<li id="invoices"><?php echo $html->link('Invoices',array('controller'=>'Invoices','action'=>'index')); ?></li>
								<li id="clients"><?php echo $html->link('Clients',array('controller'=>'clients','action'=>'index')); ?></li>
								<!--<li id="saved"><a href="#">Saved</a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	
	
	<div id="container">
		<div  class="row" id="content">
			<div class="column grid_14">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
		<div id="content_bottom"></div>
		<div class="row" id="footer">
			<div class="column grid_14">
				Powered By Xpress Invoice
			</div>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>