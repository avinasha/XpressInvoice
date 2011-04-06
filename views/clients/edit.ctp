<?php
	echo $javascript->link('jquery'); 
	echo $javascript->link('clients/edit');
?>
<div id="EditClient" class="row content">
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
				<div class="newinheading">Edit Client</div> 
				<div class="newincancel"><?php echo $html->link('Cancel',array('controller'=>'Clients','action'=>'index')); ?></div>
			</div>		
	</div>
	
	<div class="row">
		<div class="column grid_14 pad30">
			<div class="rule60" ></div>
		</div>
	</div>
	
	<div class="row" id="NewInvoiceForm">
		<div class="column grid_14 margin30">
			<?php echo $form->create('Client',array('action'=>'edit')); ?>
			
			<div class="newinsub indetailshead">Edit Client Details</div>
			<div class="indetails">
			<div><label>Client Name:</label><input class="field" type="text" name="data[Client][name]" value="<?php echo $Client['Client']['name']; ?>"/></div>
			<div><label>Business Name:</label><input type="text" name="data[Client][company]" class="datepicker field" value="<?php echo $Client['Client']['company']; ?>"/></div>
			<div><label>Email Address:</label><input class="field" type="text" name="data[Client][email]" value="<?php echo $Client['Client']['email']; ?>"/></div>
			<div><label>Address:</label><textarea name="data[Client][address]"><?php echo $Client['Client']['address']; ?></textarea></div>
			<div><label>Phone Number:</label><input class="field" type="text" name="data[Client][phno]" value="<?php echo $Client['Client']['phno']; ?>"/></div>
			</div>
			<input type="hidden" name="data[Client][id]" value="<?php echo $Client['Client']['id']; ?>"/>
			<div class="newinbut">
				<input class="bigbutton" type="submit" value="Save Client"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			<?php echo $form->end();?>
		</div>
	</div>
</div>