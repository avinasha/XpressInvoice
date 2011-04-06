<?php echo $html->css('page/footer.css'); ?>
<div id="get-in-touch">
	<div class="row center content">
		<div class="column grid_6">
			<div class="contact_title">Contact Us</div>
			<div class="rule"></div>
			<?php echo $form->create('Pages',array('action'=>'sendcontact','default'=>false)); ?>
				<div id="ajaxMessage"></div>
				<div class="contact_field">
				<div class="label">Send Us A Message(Please Provide Name, E-mail and Phone Number)</div>
				<textarea class="field" name="data[Contact][msg]"></textarea>
				</div>
				
				<div class="contact_field">
				<input id="click" class="button color" type="submit" value="Submit"/>
				</div>
			<?php echo $form->end(); ?>
		</div>
		<div class="column grid_1">
			<pre> </pre>
		</div>
		<div class="column grid_7">
			<div class="aright">
			Copyright XpressInvoice &copy; 2010 <br/>
			Product created by<br/>
			<?php echo $html->link($html->image('page/logobw.png'),'http://thetechfolder.com',array('escape' => false,'title'=>'TechFolder','class'=>'logobw'));?>
			</div>
		</div>
	</div>
</div>