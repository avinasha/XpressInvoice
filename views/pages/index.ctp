<?php
	echo $javascript->link('pages/index');  
?>
<div id="half">
<div id="status">
<div class="row center status_con">
	<div class="column grid_11 nav">
	<ul>
		<li><a href="/" title="">Home</a></li>
		<!--<li><a href="#" title="">Tour</a></li>-->
		<li><a href="#features" title="">Features</a></li>
		<li><?php echo $html->link('Tour','http://www.slideshare.net/techfolder/xpress-invoice-3695197'); ?></li>
		<li><a href="#plans-pricing" title="">Plans and Pricing</a></li>
		<li><?php echo $html->link('Sign In',array('controller'=>'Users','action'=>'login'),array('class'=>'imp')); ?></li>
		<li><?php echo $html->link('Sign Up',array('controller'=>'Pages','action'=>'signup'),array('class'=>'imp')); ?></li>
		<li>| Call Us : +919980820256</li>
	</ul>
	</div>
	
	<div class="column grid_3 nav">
		<?php echo $html->link($html->image('page/logobw.png'),'http://thetechfolder.com',array('escape' => false,'title'=>'TechFolder','class'=>'logobw'));?>
	</div>
</div>
</div>
<div id="intro">
<div class="row center">
	<div class="column grid_14">		
		<div class="row board">
			<div class="column grid_6">
				<div class="boardleft">
				<?php echo $html->image('page/logo.png',array('class'=>'logo')); ?>
				<h1><b>Invoicing @ It's Best</b></h1>
				<h2>Create And Manage Your Invoices Online With Ease</h2>
				<h3>Get Status of Invoice, Send Reminders, Send Thankyou, Add Payments, Download PDF</h3>
				<?php echo $html->link('<span class="button" id="gs">Sign Up for FREE</span>','/signup',array('escape'=>false)); ?>
				<?php echo $html->link('<span class="button" id="gs">Plans and Pricing</span>','#plans-pricing',array('escape'=>false)); ?>
				</div>
			</div>
			<div class="column grid_8"><a href="http://www.slideshare.net/techfolder/xpress-invoice-3695197" title="Tour"><?php echo $html->image('page/intro.png',array('class'=>'introimg')); ?></a></div>
		</div>
	</div>
</div>
</div>

<div id="content">

	<div class="row" id="features">
		<div class="column grid_14">
			<div class="sechead">Features</div>
			<div class="rule"></div>
			<div class="features">
				<div class="row">
					<div class="column grid_1"><pre> </pre></div>
					<div class="column grid_4">
						<div class="top-left feature">
							<div class="img"><?php echo $html->image('page/edit.png'); ?></div>
							<h3 class="head">Easy Invoice Creation</h3>
							<p>Xpress Invoice allows you to create invoices in a jiffy. Just fill a few fields and you are done. Xpress Invoice calculates everything for you.</p>
						</div>
					</div>
					<div class="column grid_4">
						<div class="top-center feature">
							<div class="img"><?php echo $html->image('page/mail.png'); ?></div>
							<h3 class="head">Send Invoice in One Click</h3>
							<p>Xpress Invoice manages your clients and their E mail addresses. It sends the invoices to their email address at just a click of a button.</p>
						</div>					
					</div>				
					<div class="column grid_4">
						<div class="top-right feature">
							<div class="img"><?php echo $html->image('page/status.png'); ?></div>
							<h3 class="head">Get Invoice Staus Instantly</h3>
							<p>Xpress Invoice maintains the status of an invoice (Draft, Estimate, Sent, Due or Paid) and shows it you instantly</p>
						</div>
					</div>			
					<div class="column grid_1"><pre> </pre></div>
				</div>
				<div class="row">
					<div class="column grid_1"><pre> </pre></div>
					<div class="column grid_4">
						<div class="bot-left feature">
							<div class="img"><?php echo $html->image('page/folder.png'); ?></div>
							<h3 class="head">Easy Invoice Management</h3>
							<p>Xpress Invoice lets you manage your invoices by clients and by status. Forget about the hassles of creating folders for different clients</p>
						</div>
					</div>
					<div class="column grid_4">
						<div class="bot-center feature">
							<div class="img"><?php echo $html->image('page/pdf.png'); ?></div>
							<h3 class="head">Download PDF</h3>
							<p>Want to create a hard copy of your invoice? or want a backup? Just download the PDF version of the invoice</p>
						</div>					
					</div>				
					<div class="column grid_4">
						<div class="bot-right feature">
							<div class="img"><?php echo $html->image('page/web.png'); ?></div>
							<h3 class="head">Access From Anywhere</h3>
							<p>Does your demands you to move from place to place. What to carry your invoices everywhere? Look no further...</p>
						</div>
					</div>			
					<div class="column grid_1"><pre> </pre></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" id="plans-pricing">
		<div class="sechead">Plans and Pricing</div>
		<div class="rule"></div>
		<?php echo $this->element('pricing'); ?>
	</div>
</div>
<?php echo $this->element('footer'); ?>
<div id="hl" class="modal">Explination of the loan will go here</div>
</div>