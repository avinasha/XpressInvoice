<?php
	echo $javascript->link('jquery'); 
	echo $javascript->link('clients/index');
	echo $javascript->link('jquery.validate');
?>
<div id="ListClients" class="row content">
	<div class="column grid_11 content_left">
	
		<div class="row">
		<div class="column grid_11">
		<?php $session->flash(); ?>
		</div>
		</div>
			
		<div class="row headline" id="ListInvoiceHeadline">
			<div class="column grid_11 margin30">Clients</div>
		</div>
		
		<div class="row" id="ListInvoicesHeading">
			<div class="column grid_11">
				<div class="margin30">
				<ul>
					<li>Name</li>
					<li>Company</li>
					<li>E-mail Address</li>
				</ul>
				</div>
			</div>
		</div>
		
		<div class="row" id="ListInvoicesItems">
			<div class="column grid_11">
				<div class="margin30">
				<?php
				if(count($Clients)>0){
				foreach($Clients as $d) {
				?>
				<div class="list sentlist"> 
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'Clients','action'=>'delete',$d['Client']['id']),array('escape' => false,'title'=>'Delete'),'All invoices belonging to this client will also be deleted. Are you sure you want to delete this client?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'Clients','action'=>'edit',$d['Client']['id']),array('escape'=>false));?>			
				</div>
				<ul>
					<li class="cname"><?php echo $d['Client']['name']; ?></li>
					<li class="ccompany"><?php echo $d['Client']['company']; ?></li>
					<li class="cemail"><?php echo $d['Client']['email']; ?></li>
					<li class="cmore"><a class="more" href="#">More</a></li>
				</ul>
				</div>
				<div class="details">
				<h4>Address</h4>
				<?php if($d['Client']['address']!='') echo $d['Client']['address']; else echo '-----';?>
				<h4>Phone Number</h4>
				<?php if($d['Client']['phno']!='') echo $d['Client']['phno']; else echo '-----';?>
				</div>
				<?php } ?>
				<div class="rule30"></div>
				<?php } ?>				
				</div>
			</div>
		</div>
		
	</div>
	<div class="column grid_3 content_right">
		<div class="row">
			<div class="column grid_3">
				<div class="toggleAddInvoice">New Client</div> 
			</div>
		</div>
	</div>
</div>

<div id="NewInvoice" class="row content">
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
				<div class="newinheading">New Client</div> 
				<div class="newincancel">Cancel</div>
			</div>		
	</div>
	
	<div class="row">
		<div class="column grid_14 pad30">
			<div class="rule60" ></div>
		</div>
	</div>
	
	<div class="row" id="NewInvoiceForm">
		<div class="column grid_14 margin30">
			<?php echo $form->create('Client',array('default'=>false)); ?>
			
			<div class="newinsub indetailshead">Enter Client Details</div>
			<div class="indetails">
			<div><label>Contact Person:</label><input class="field" type="text" name="data[Client][name]"/><span class="errmsg"></span></div>
			<div><label>Company Name:</label><input type="text" name="data[Client][company]" class="datepicker field"/></div>
			<div><label>Email Address:</label><input class="field" type="text" name="data[Client][email]"/><span class="errmsg"></span></div>
			<div><label>Address:</label><textarea name="data[Client][address]"></textarea></div>
			<div><label>Phone Number:</label><input class="field" type="text" name="data[Client][phno]"/></div>
			</div>
			
			<div class="newinbut">
				<input id="NewClientSubmit" class="bigbutton" type="submit" value="Save Client"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			<?php echo $form->end();?>
		</div>
	</div>
</div>