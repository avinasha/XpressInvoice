<?php 
echo $javascript->link('jquery'); 
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.tools');
echo $javascript->link('jquery.validate');
echo $javascript->link('jquery.datepicker');
echo $javascript->link('jquery.numeric');
echo $javascript->link('jquery.checkbox');
echo $javascript->link('jquery.livequery');
echo $javascript->link('invoices/index');
echo $html->css('datepicker');
echo $html->css('checkbox');
?>
<div id="ListInvoices" class="row content">
	<div class="column grid_11 content_left">
	
		<div class="row">
			<div class="column grid_11">
			<?php $session->flash(); ?>
			</div>
			</div>
		
		<?php $options=$session->read('Auth.User.Profile.options');
			  if($options!='') { $op=explode(',',$options);}
			  if($op[1]=='1') {?>		
		<div class="row">
		<div class="column grid_11">
			<div id="announce" class="margin30">
				<h2><b>Find Your Way:</b><span class="hide">Hide</span></h2>
				<ul>
					<li><?php echo $html->image('tut/hover.jpg'); ?><h3>Hover on the list of Invoices to see the actions <b>Delete</b> & <b>Edit</b></h3></li>
					<li><?php echo $html->image('tut/view.jpg'); ?><h3>Click on the Invoice Number to <b>View</b> the Invoice</h3></li>  
					<li><?php echo $html->image('tut/delete.jpg'); ?><h3>All through the application the above icons means <b>Delete</b> & <b>Edit</b> respectively</h3></li>
					<li><?php echo $html->image('tut/sample.jpg'); ?><h3>Try out the actions on the below provided sample Invoice.</li>
				</ul>
			</div>
		</div>
		</div>
		<?php } ?>
	
		<div class="row headline" id="ListInvoiceHeadline">
			<div class="column grid_11 pad30">
			<?php 
				if($Showing=='All')
				echo 'Invoices of All Clients';
				else
				echo 'Invoices of '.$Showing;
			?>
			</div>
		</div>
		
		
		<div class="row" id="ListInvoicesHeading">
			<div class="column grid_11 pad30">
				<ul>
					<li>ID</li>
					<li>Date</li>
					<li>Client</li>
					<li>Amount</li>
				</ul>
			</div>
		</div>
		
		
		<div class="row" id="ListInvoicesItems">
			<div class="column grid_11">
				<div class="margin30">
				<?php
				if(count($Sent)>0 || count($Draft)>0 || count($Estimate)>0 || count($Due)>0 || count($Paid)>0) {
				if(count($Sent)>0){
				echo '<span class="nosent">Sent</span>';
				foreach($Sent as $d) {
				?>
				<div class="list sentlist"> 
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'invoices','action'=>'delete',$d['Invoice']['id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Invoice?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'invoices','action'=>'edit',$d['Invoice']['id']),array('escape'=>false,'title'=>'Edit'));?>				
				</div>
				<ul>
					<li><?php echo $html->link($d['Invoice']['number'],array('controller'=>'invoices','action'=>'view',$d['Invoice']['id'])); ?></li>
					<li><?php echo $d['Invoice']['date']; ?></li>
					<li><?php echo $d['Client']['company']; ?></li>
					<li><?php echo $number->precision($d['Invoice']['amount'],2); echo ' '.$CurS; ?></li>
				</ul>
				</div>
				<?php } ?>
				<div class="rule30"></div>
				<?php } ?>
				
				<?php
				if(count($Estimate)>0){
				echo '<span class="noestimate">Estimate</span>';
				foreach($Estimate as $d) {
				?>
				<div class="list estimatelist"> 
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'invoices','action'=>'delete',$d['Invoice']['id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Invoice?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'invoices','action'=>'edit',$d['Invoice']['id']),array('escape'=>false,'title'=>'Edit'));?>		
				</div>
				<ul>
					<li><?php echo $html->link($d['Invoice']['number'],array('controller'=>'invoices','action'=>'view',$d['Invoice']['id'])); ?></li>
					<li><?php echo $d['Invoice']['date']; ?></li>
					<li><?php echo $d['Client']['company']; ?></li>
					<li><?php echo $number->precision($d['Invoice']['amount'],2); echo ' '.$CurS; ?></li>
				</ul>
				</div>
				<?php } ?>
				<div class="rule30"></div>
				<?php } ?>
				
				
				<?php
				if(count($Due)>0){
				echo '<span class="nodue">Dues</span>';
				foreach($Due as $d) {
				?>
				<div class="list duelist"> 
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'invoices','action'=>'delete',$d['Invoice']['id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Invoice?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'invoices','action'=>'edit',$d['Invoice']['id']),array('escape'=>false,'title'=>'Edit'));?>				
				</div>
				<ul>
					<li><?php echo $html->link($d['Invoice']['number'],array('controller'=>'invoices','action'=>'view',$d['Invoice']['id'])); ?></li>
					<li><?php echo $d['Invoice']['date']; ?></li>
					<li><?php echo $d['Client']['company']; ?></li>
					<li><?php echo $number->precision($d['Invoice']['amount'],2); echo ' '.$CurS;?></li>
				</ul>
				</div>
				<?php } ?>
				<div class="rule30"></div>
				<?php } ?>
				
				<?php
				if(count($Draft)>0){
				echo '<span class="nodraft">Draft</span>';
				foreach($Draft as $d) {
				?>
				<div class="list draftlist">
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'invoices','action'=>'delete',$d['Invoice']['id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Invoice?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'invoices','action'=>'edit',$d['Invoice']['id']),array('escape'=>false,'title'=>'Edit'));?>		
				</div>
				<ul>
					<li><?php echo $html->link($d['Invoice']['number'],array('controller'=>'invoices','action'=>'view',$d['Invoice']['id'])); ?></li>
					<li><?php echo $d['Invoice']['date']; ?></li>
					<li><?php echo $d['Client']['company']; ?></li>
					<li><?php echo $number->precision($d['Invoice']['amount'],2); echo ' '.$CurS; ?></li>
				</ul>
				</div>
				<?php } ?>
				<div class="rule30"></div>
				<?php } ?>
				
				<?php
				if(count($Paid)>0){
				echo '<span class="nopaid">Paid</span>';
				foreach($Paid as $d) {
				?>
				<div class="list paidlist">
				<div class="listactions">
				<?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"> <b>|</b></span>',array('controller'=>'invoices','action'=>'delete',$d['Invoice']['id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Invoice?');?>
				<?php echo $html->link($html->image('edit.png'),array('controller'=>'invoices','action'=>'edit',$d['Invoice']['id']),array('escape'=>false,'title'=>'Edit'));?>			
				</div>
					<ul>
					<li><?php echo $html->link($d['Invoice']['number'],array('controller'=>'invoices','action'=>'view',$d['Invoice']['id'])); ?></li>
					<li><?php echo $d['Invoice']['date']; ?></li>
					<li><?php echo $d['Client']['company']; ?></li>
					<li><?php echo $number->precision($d['Invoice']['amount'],2); echo ' '.$CurS; ?></li>
				</ul>
				</div>
				<?php } ?> 
				<div class="rule30"></div>
				<?php } } else { ?>
				<h1>This Client Has No Invoices</h1>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="column grid_3 content_right">
			
		<div class="row">
			<div class="column grid_3">
				<div class="toggleAddInvoice">New Invoice</div> 
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_3">
				<ul id="actions">
				<li>
				<?php echo $form->create(array('controller'=>'Invoices','action'=>'index')); ?>
				<label>Show Invoices Of</label>
				<select class="clientchange" name="data[Client]">
				<?php
					if(count($Clients)==0)
					echo '<option value="All">All</option>';
					else{
					echo '<option value="All">All</option>';
					foreach($Clients as $Client){
						if($Client['Client']['id']==$ShowingID)
						echo '<option selected="selected" value="'.$Client['Client']['id'].'">';
						else
						echo '<option value="'.$Client['Client']['id'].'">';
						if(!empty($Client['Client']['company']))
						echo $Client['Client']['company'];
						else
						echo $Client['Client']['name'];
						echo '</option>';
					}
					}
				?>
				</select>
				<input class="clientchangesubmit" type="submit" value="" style="display:none;"/>
				<?php echo $form->end(); ?>
				</li>				
				</ul>
			</div>
		</div>
	</div>	
</div>

<div id="NewInvoice" class="row content">
	<?php if($Setting['Setting']['monnum']<$Maxin) { ?>
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
				<div class="newinheading">New Invoice</div> 
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
			<?php echo $form->create('Invoice',array('default'=>false)); ?>
			
			<div class="newinsub indetailshead">Enter Invoice Details</div>
			<div class="indetails">
			<div><label>Client:</label>
			<select class="cbfield clientfield" name="data[Invoice][client_id]">
				<?php
					if(count($Clients)==0)
					echo '<option value="" class="noclientnode">No Client</option>';
					else{
					foreach($Clients as $Client){
						echo '<option value="'.$Client['Client']['id'].'">';
						if(!empty($Client['Client']['company']))
						echo $Client['Client']['company'];
						else
						echo $Client['Client']['name'];
						echo '</option>';
					}
					}
				?>
			</select>
			<a href="#" class="modalInput" rel="#NewClient"><b>Add Client</b></a>
			</div>
			<div class="erroot"><label>Invoice Number:</label><input class="field" type="text" name="data[Invoice][number]"/><p class="errmsg"></p>Last Sent Invoice Number:<b><?php if(empty($Setting['Setting']['lastinnum'])) echo 'None'; else echo $Setting['Setting']['lastinnum']; ?></b></div>
			<div class="erroot"><label>Date:</label><input type="text" name="data[Invoice][date]" class="datepicker field"/><p class="errmsg"></p></div>
			<div><label>PO Number:</label><input class="field" type="text" name="data[Invoice][ponumber]"/></div>
			<div><label>PO Date:</label><input type="text" name="data[Invoice][podate]" class="datepicker field"/></div>
			<div><label>Delivery Challan:</label><input class="field" type="text" name="data[Invoice][dc]"/></div>
			</div>
			
			<div class="newinsub insettingshead">Show Invoice Settings</div>
			<div class="insettings">
				<div style="margin-left:10px;">
					<b><?php echo $html->link('Edit Default Invoice Settings',array('controller'=>'Settings','action'=>'index')); ?></b>
				</div>
				<div>
					<label>Due in (Days)</label>
					<input class="field" type="text" name="data[Invoice][due]" value="<?php echo $Setting['Setting']['due']; ?>"/>
				</div>
				<div class="hid">
					<label>Discount (%):</label>
					<input class="cb dcb" type="checkbox"/>
					<input class="field num df" type="text" name="data[Invoice][discount]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['discount'])) echo $Setting['Setting']['discount']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['discount'])) echo $Setting['Setting']['discount'];?>"/>
				</div>
				<div class="hid">
					<label>Tax 1 (%):</label>
					<input class="cb t1cb" type="checkbox"/>
					<input class="taxfield t1n" type="text" name="data[Invoice][tax1name]" value="<?php if(!empty($Setting['Setting']['tax1name'])) echo $Setting['Setting']['tax1name']; else echo 'Tax1';?>" disabled="disabled"/>
					<input class="taxfield num t1" type="text" name="data[Invoice][tax1]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['tax1'])) echo $Setting['Setting']['tax1']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax1'])) echo $Setting['Setting']['tax1'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax1name'])) echo $Setting['Setting']['tax1name'];?>"/>
				</div>
				<div class="hid">
					<label>Tax 2 (%):</label>
					<input class="cb t2cb" type="checkbox"/>
					<input class="taxfield t2n" type="text" name="data[Invoice][tax2name]" value="<?php if(!empty($Setting['Setting']['tax2name'])) echo $Setting['Setting']['tax2name']; else echo 'Tax2';?>" disabled="disabled"/>
					<input class="taxfield num t2" type="text" name="data[Invoice][tax2]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['tax2'])) echo $Setting['Setting']['tax2']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax2'])) echo $Setting['Setting']['tax2'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax2name'])) echo $Setting['Setting']['tax2name'];?>"/>
				</div>
				<div class="hid">
					<label>Shipping Charges:</label>
					<input class="cb sccb" type="checkbox"/>
					<input class="field num sc" type="text" name="data[Invoice][shipping]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['shipping'])) echo $Setting['Setting']['shipping']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['shipping'])) echo $Setting['Setting']['shipping'];?>"/>
				</div>
				<div>
					<label>Currency:</label>
					<?php $e=explode(',',$Setting['Setting']['currency']); echo $this->element('currency',array('name'=>'data[Invoice][currency]','current'=>$e[1]));?>
				</div>
				<div>
					<label>Notes:</label>
					<textarea class="notes" name="data[Invoice][notes]"><?php echo $Setting['Setting']['notes']; ?></textarea>
				</div>
			</div>
			
			<div class="newinsub">Add Invoice Items</div>
			<div class="initems">
				<ul class="heading">
					<li class="actions"><pre> </pre></li>
					<li class="qty">Qty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type</li>
					<li class="des">Description</li>
					<li class="price">Unit Price</li>
					<li class="total">Total</li>
				</ul>
				
				<div class="items">
				
				</div>
				
				<div class="additem"><a class="smallbutton" href="#" onClick="addItem()">Add New Item</a></div>
			</div>
			
			<div class="newintotal">
				<input type="hidden" name="data[Invoice][total]" value="0" class="subtotal"/>
				<div class="left">
					<span class="lfield">Sub Total<br/></span>
					<span id="dflb" style="display:none;" class="lfield"></span>
					<span id="t1lb" style="display:none;" class="lfield"></span>
					<span id="t2lb" style="display:none;" class="lfield"></span>
					<span id="sclb" style="display:none;" class="lfield">Shipping<br/></span>
					<span id="rlb" style="display:none;" class="lfield">Round Off<br/></span>
					<span class="gt lfield">Total<br/></span>
				</div>
				<div class="right">
					<span id="subtotal" class="lfield"></span><br/>
					<span id="df" style="display:none;" class="lfield"><br/></span>
					<span id="t1" style="display:none;" class="lfield"><br/></span>
					<span id="t2" style="display:none;" class="lfield"><br/></span>
					<span id="sc" style="display:none;" class="lfield"><br/></span>
					<span id="r" style="display:none;" class="lfield"><br/></span>
					<span class="lfield"><span id="gross" class="gt">0</span>Round Off:<input type="checkbox" class="roundoff"/><br/></span>
				</div>
			</div>
			
			<div id="InvoiceAddFormM"></div>
			<div class="newinbut">
				<input id="NewInvoiceSubmit" class="bigbutton" type="submit" value="Save Invoice"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			<input type="hidden" id="count" name="data[count]" value="0"/>
			<input type="hidden" id="grandtotal" name="data[Invoice][amount]" value="0"/>
			<input type="hidden" id="rval" name="data[Invoice][roundoff]" value="0"/>
			<?php echo $form->end();?>
		</div>
	</div>
	<?php } else {?>
		<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
				<div class="newinheading">New Invoice</div> 
				<div class="newincancel">Cancel</div>
			</div>		
	</div>
	<div class="row">
	<div class="column grid_14 pad30">
				<div>You Have Reached Max Limit For The Month. Please Call +919980820256 or Email getmore@xpressinvoice.com To Upgrade</div> 
			</div>
	</div>
	<?php } ?>
</div>
		
<!-- user input dialog --> 
<div class="modal" id="NewClient"> 
	<h2>New Client<span class="loading loadingdialog"><?php $html->image('loader3.gif'); ?></span></h2> 
 	<?php	echo $form->create('Client',array('default'=>false)); ?>
		<div><label>Client Name:</label><input type="text" class="fi" name="data[Client][name]"/><span class="errmsg"></span></div>
		<div><label>Email Address:</label><input type="text" class="fi" name="data[Client][email]"/><span class="errmsg"></span></div>
		<div><label>Business Name:</label><input type="text" class="fi" name="data[Client][company]"/><span class="errmsg"></span></div>
		<div class="newinbut">
				<input id="NewClientSubmit" class="bigbutton" type="submit" value="Save Client"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
		</div>
		<?php echo $form->end(); ?>
	<div class="close"></div> 
</div> 