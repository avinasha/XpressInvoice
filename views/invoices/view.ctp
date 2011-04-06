<?php 
echo $javascript->link('jquery'); 
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.tools');
echo $javascript->link('jquery.validate');
echo $javascript->link('jquery.checkbox');
echo $javascript->link('jquery.datepicker');
echo $javascript->link('jquery.numeric');
echo $javascript->link('invoices/view');
echo $html->css('checkbox');
echo $html->css('modal.datepicker');
echo $html->css(array('print'), 'stylesheet', array('media' => 'print'));
?>
<div id="ListInvoices" class="row content">
	<div class="column grid_11 content_left">
	
			<div class="row">
			<div id="message" class="column grid_11">
			<?php $session->flash(); ?>
			</div>
			</div>
			
		
		
		<div class="row">
			<div class="column grid_11 vin_status">
			<?php if($Invoice['Invoice']['status']=='Draft') { ?>
			<div class="vinstatus draft">Draft</div>
			<?php } elseif($Invoice['Invoice']['status']=='Due') { ?>
			<div class="vinstatus due">Due</div>
			<?php } elseif($Invoice['Invoice']['status']=='Paid'){ ?>
			<div class="vinstatus paid">Paid</div>
			<?php } elseif($Invoice['Invoice']['status']=='Estimate'){ ?>
			<div class="vinstatus estimate">Estimate</div>
			<?php } elseif($Invoice['Invoice']['status']=='Sent'){ ?>
			<div class="vinstatus sent">Sent</div>
			<?php } ?>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_11 vintop"><?php if($Invoice['Invoice']['status']=='Estimate') { ?>Estimate<?php } else {?>Tax Invoice<?php } ?></div>
		</div>
		
		<div class="row toprow">
			<div class="column grid_6">
				<span class="pad30 vintitle"><?php echo $Invoice['Company']['name']; ?></span>
				<div class="pad30 h2">
					<?php if(!empty($Invoice['Company']['address'])) echo $Invoice['Company']['address']; ?>
				</div>
			</div>
			
			<div class="column grid_5">
				<div class="vindetails">
				<div class="left">
					<span id="_EstimateLbl" style="<?php if($Invoice['Invoice']['status']!='Estimate') { ?> display:none;<?php } ?>">Estimate Number<br/></span>
					<span id="_InvoiceNumLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>">Invoice Number<br/></span>
					<span id="_InvoiceDateLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>">Date of Invoice<br/></span>
					<?php if(!empty($Invoice['Invoice']['ponumber'])) { ?><span id="_InvoicePOLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo 'P.O. Number<br/>'; ?></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['podate'])) { ?><span id="_InvoicePODLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo 'Date of P.O<br/>';  ?></span><?php } ?>					
					<span id="_InvoiceDueLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo "Due on<br/>"; ?></span>
					<?php if(!empty($Invoice['Invoice']['dc'])) { ?><span id="_InvoiceDCLbl" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo 'Delivery Challan';  ?><br/></span><?php } ?>
				</div>
				<div class="right">
					<span id="_EstimateNum" style="<?php if($Invoice['Invoice']['status']!='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['number']; ?><br/></span>
					<span id="_InvoiceNum" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['number']; ?><br/></span>
					<span id="_InvoiceDate" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['date']; ?><br/></span>
					<?php if(!empty($Invoice['Invoice']['ponumber'])) { ?><span id="_InvoicePO" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['ponumber'].'<br/>'; ?></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['podate'])) { ?><span id="_InvoicePOD" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php  echo $Invoice['Invoice']['podate'].'<br/>';  ?></span><?php } ?>
					<span id="_InvoiceDue" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['due']; ?><br/></span>
					<?php if(!empty($Invoice['Invoice']['dc'])) { ?><span id="_InvoiceDC" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>"><?php echo $Invoice['Invoice']['dc'];  ?><br/></span><?php } ?>
				</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_5">
				<div class="vinaddr pad30">
					<div class="h1">To,</div>
					<div class="h3"><?php if(empty($Invoice['Client']['company'])) echo $Invoice['Client']['name']; else echo $Invoice['Client']['company'];?></div>
					<div class="h2">
					<?php if(!empty($Invoice['Client']['address'])) echo $Invoice['Client']['address']; ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_11">
				<div class="pad30 th">
					<ul>
						<li class="qty">Quantity</li>
						<li class="des">Description</li>
						<li class="price">Price</li>
						<li class="total">Total</li>
					</ul>					
				</div>
				<div class="pad30 vinitems">
					<?php foreach($Invoice['InvoiceItem'] as $item) {?>
					<ul>
						<li class="qty"><?php echo $item['quantity']; ?></li>
						<li class="des"><?php echo $item['description']; ?></li>
						<li class="price"><?php echo $number->precision($item['price'],2); ?> / <?php echo $item['type']; ?></li>
						<li class="total"><?php echo $number->precision($item['quantity']*$item['price'],2);?></li>
					</ul>
					<ul class="itembot"></ul>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_6 vintitle"><pre> </pre></div>
			<div class="column grid_5">
				<div class="vintotal">
				<div class="left">
					<span class="lfield">Sub Total<br/></span>
					
					<div style="padding:5px 0px 5px 0px">
					<?php if(!empty($Invoice['Invoice']['discount'])) { ?><span id="dflb" class="slfield">Discount (<?php printf('%.2f',$Invoice['Invoice']['discount']); ?>%)<br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['tax1'])) { ?><span id="t1lb" class="slfield"><?php echo $Invoice['Invoice']['tax1name']; ?> (<?php printf('%.2f',$Invoice['Invoice']['tax1']); ?>%)<br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['tax2'])) { ?><span id="t2lb" class="slfield"><?php echo $Invoice['Invoice']['tax2name']; ?> (<?php printf('%.2f',$Invoice['Invoice']['tax2']); ?>%)<br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['shipping'])) { ?><span id="sclb" class="slfield">Shipping<br/></span><?php } ?>
					<?php if($Invoice['Invoice']['roundoff']!=0) { ?><span id="roundofflb" class="slfield">Round Off<br/></span><?php } ?>
					</div>
					
					<span class="gt lfield">Total<br/></span>
				</div>
				<div class="right">
					<span id="subtotal" class="lfield"><?php printf('%.2f',$Invoice['Invoice']['total']); ?></span><br/>
					
					<div style="padding:5px 0px 5px 0px">
					<?php if(!empty($Invoice['Invoice']['discount'])) { ?><span id="df" class="slfield">-<?php $temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['discount'])/100; printf('%.2f',$temp); ?><br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['tax1'])) { ?><span id="t1" class="slfield">+<?php $temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['tax1'])/100; printf('%.2f',$temp); ?><br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['tax2'])) { ?><span id="t2" class="slfield">+<?php $temp=($Invoice['Invoice']['total']*$Invoice['Invoice']['tax2'])/100; printf('%.2f',$temp); ?><br/></span><?php } ?>
					<?php if(!empty($Invoice['Invoice']['shipping'])) { ?><span id="sc" class="slfield">+<?php printf('%.2f',$Invoice['Invoice']['shipping']); ?><br/></span><?php } ?>
					<?php if($Invoice['Invoice']['roundoff']!=0) { ?><span id="roundoff" class="slfield"><?php printf('%.2f',$Invoice['Invoice']['roundoff']); ?><br/></span><?php } ?>
					</div>
					
					<span class="lfield"><span id="gross" class="gt"><?php $temp=$number->precision($Invoice['Invoice']['amount'],2); echo $temp.' '.$CurS; ?><br/></span><br/></span>
				</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_11 pad30 vinwords">
				<?php echo $InWords;?>
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_11 pad30">
				<div class="vinnotes">
				<?php if(!empty($Setting['Setting']['taxids'])) echo $Setting['Setting']['taxids'].'<br/>';?>
				<?php echo $Invoice['Invoice']['notes'];?>
				</div>
			</div>
		</div>
		
		<?php $no=1; if($no==0){ ?>
		<div class="row">
			<div class="column grid_11 margin30">
				<span id="_InvoiceSign" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>">
					<div class="vinsign">
					<hr/>
					(Signature)
					</div>
				</span>
			</div>
		</div>
		<?php } ?>
		
	</div>

	<div class="column grid_3 content_right">
		<div class="row">
			<div class="column grid_3">
				<div class="downloadPDF"><?php echo $html->link('Download PDF',array('controller'=>'Invoices','action'=>'viewpdf',$Invoice['Invoice']['id'])); ?></div> 
			</div>
		</div>
		
		<div class="row">
			<div class="column grid_3">
				<ul id="actions">
				<?php if($Setting['Setting']['mode']==0) { ?>
					<li <?php if($Invoice['Invoice']['status']=='Due' || $Invoice['Invoice']['status']=='Sent') { ?> style="display:block; "<?php } else {?> style="display:none;" <?php } ?> id="_SendReminder"><p class="modalInput" rel="#SendReminder"><?php if($Invoice['Invoice']['remind']=='0'){ echo 'Send Reminder'; } else { echo 'Send Reminder Again'; } ?></p></li>
					<li  <?php if($Invoice['Invoice']['status']=='Draft') { ?> style="display:block; "<?php } else {?> style="display:none;" <?php } ?> id="_SendEstimate"><p class="modalInput" rel="#SendEstimate">Send As Estimate</p></li>
					<li <?php if($Invoice['Invoice']['status']=='Paid') { ?> style="display:block; "<?php } else {?> style="display:none;" <?php } ?> id="_SendThanks"><p class="modalInput" rel="#SendThankyou">Send Thanks</p></li>
					<li <?php if($Invoice['Invoice']['status']=='Draft' || $Invoice['Invoice']['status']=='Estimate') { ?> style="display:block; "<?php } else {?> style="display:none;" <?php } ?> id="_SendInvoice"><p class="modalInput" rel="#SendInvoice">Send Invoice</p></li>
				<?php } else { if($Invoice['Invoice']['status']!='Paid'){?>
					<li id="_ChangeStatus"><p>Change Status:</p>
					<?php echo $form->create('Invoice',array('action'=>'changestatus','default'=>'false')); ?>
						<select id="_ChangeStatusField" name="data[Invoice][status]">
							<option value="">Select</option>
							<option value="Sent">Sent</option>
							<option value="Draft">Draft</option>
							<option value="Estimate">Estimate</option>
						</select>
						<input type="hidden" name="data[Invoice][id]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
					<?php echo $form->end(); ?>
					</li>
				<?php }} ?>
					<li><p class="modalInput" rel="#AddPayment">Payments</p></li>
					<li><p><?php echo $html->link('Edit',array('controller'=>'Invoices','action'=>'edit',$Invoice['Invoice']['id'])); ?></p></li>
					<li><?php echo $html->link('Delete',array('controller'=>'Invoices','action'=>'delete',$Invoice['Invoice']['id']),array(),'Are You Sure You Want To Delete This Invoice?'); ?></li>
				</ul>
			</div>
		</div>
	</div>	
</div>

<?php if($Setting['Setting']['mode']==0) { ?>
<!-- user input dialog --> 
<div class="modal" id="SendInvoice"> 
	<h2>Send Invoice</h2>
 	<?php 	echo $form->create('Invoice',array('default'=>false,'action'=>'sendinvoice')); ?>
	<div>
	<div class="right">
		<ul>
			<li><input id="InCopyCheck" type="checkbox"/><input type="hidden" name="data[copycheck]" id="InCopyData" value="0"/></li>
			<li><label>Send a copy to <?php echo $Invoice['Company']['email']; ?></label></li>
		</ul>
	</div>
	<br style="clear:both;"/>
	</div>
	<?php if($Invoice['Client']['email']=='') { ?>
	<div>
		<label>Email Address:</label>
		<input type="text" class="subject" name="data[email]"/>
		<input type="hidden" name="data[clientid]" value="<?php echo $Invoice['Client']['id']; ?>"/>
	</div>
	<?php } ?>
	<div>
		<label>Subject:</label>
		<input type="text" class="subject" name="data[subject]" value="<?php echo $Setting['EmailFormat']['invoicehead'];?>"/>
	</div>
	<div>
		<label>Message:</label>
		<textarea name="data[msg]" class="<?php if($Invoice['Client']['email']=='') echo 'msgsmall'; else echo 'msg';?>"><?php echo $Setting['EmailFormat']['invoice'];?></textarea>
	</div>
	<input type="hidden" name="data[invoice]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
	<div class="newinbut">
				<input id="SendInvoiceSubmit" class="bigbutton" type="submit" value="Send Invoice"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
	</div>
	<?php	
		echo $form->end();
	?>
	<div class="close"></div> 
</div>

<div class="modal" id="SendEstimate"> 
	<h2>Send Estimate</h2> 
 	<?php 	echo $form->create('Invoice',array('default'=>false,'action'=>'sendestimate')); ?>
	<div>
	<div class="right">
		<ul>
			<li><input id="ECopyCheck" type="checkbox"/><input type="hidden" name="data[copycheck]" id="ECopyData" value="0"/></li>
			<li><label>Send a copy to <?php echo $Invoice['Company']['email']; ?></label></li>
		</ul>
	</div>
	<br style="clear:both;"/>
	</div>
	<?php if($Invoice['Client']['email']=='') { ?>
	<div>
		<label>Email Address:</label>
		<input type="text" class="subject" name="data[email]"/>
		<input type="hidden" name="data[clientid]" value="<?php echo $Invoice['Client']['id']; ?>"/>
	</div>
	<?php } ?>
	<div>
		<label>Subject:</label>
		<input type="text" class="subject" name="data[subject]" value="<?php echo $Setting['EmailFormat']['estimatehead'];?>"/>
	</div>
	<div>
		<label>Message:</label>
		<textarea name="data[msg]" class="<?php if($Invoice['Client']['email']=='') echo 'msgsmall'; else echo 'msg';?>"><?php echo $Setting['EmailFormat']['estimate'];?></textarea>
	</div>
	<input type="hidden" name="data[invoice]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
	<div class="newinbut">
				<input id="SendEstimateSubmit" class="bigbutton" type="submit" value="Send Estimate"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
	</div>
	<?php	
		echo $form->end();
	?>
	<div class="close"></div> 
</div>

<div class="modal" id="SendReminder"> 
	<h2>Send Reminder</h2> 
 	<?php 	echo $form->create('Invoice',array('default'=>false,'action'=>'sendreminder')); ?>
		
	<div>
		<label>Subject:</label>
		<input type="text" class="subject" name="data[subject]" value="<?php echo $Setting['EmailFormat']['reminderhead'];?>"/>
	</div>
	<div>
		<label>Message:</label>
		<textarea name="data[msg]" class="msg"><?php echo $Setting['EmailFormat']['reminder'];?></textarea>
	</div>
	<input type="hidden" name="data[invoice]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
	<div class="newinbut">
				<input id="SendReminderSubmit" class="bigbutton" type="submit" value="Send Reminder"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
	</div>
	<?php	
		echo $form->end();
	?>
	<div class="close"></div> 
</div>

<div class="modal" id="SendThankyou"> 
	<h2>Send Thank You</h2> 
 	<?php 	echo $form->create('Invoice',array('default'=>false,'action'=>'sendthankyou')); ?>
		
	<div>
		<label>Subject:</label>
		<input type="text" class="subject" name="data[subject]" value="<?php echo $Setting['EmailFormat']['thankyouhead'];?>"/>
	</div>
	<div>
		<label>Message:</label>
		<textarea name="data[msg]" class="msg"><?php echo $Setting['EmailFormat']['thankyou'];?></textarea>
	</div>
	<input type="hidden" name="data[invoice]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
	<div class="newinbut">
				<input id="SendThankyouSubmit" class="bigbutton" type="submit" value="Send Thank You"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
	</div>
	<?php	
		echo $form->end();
	?>
	<div class="close"></div> 
</div>
<?php } ?>
<div class="modal" id="AddPayment"> 
	<h2>Payments</h2> 
		<div class="date">
			<?php 	echo $form->create('Payment',array('action'=>'add','default'=>false)); ?>
			<label>&dArr; Select Date</label>
			<div class="datepicker"></div>
			
			<span style="<?php /*if($Invoice['Invoice']['status']!='Sent' || $Invoice['Invoice']['status']!='Due') { echo 'display:none;';}*/ ?>" id="_APon">
			<div class="left">
				<label>Amount:</label>
				<input type="text" id="grandtotal" class="amount" name="data[Payment][amount]" value="<?php printf('%.2f',$Invoice['Invoice']['amount']);?>"/>
			</div>
			<div class="newinbut">
				<input id="AddPaymentSubmit" class="bigbutton" type="submit" value="Add Payment"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			</span>
			<h1 id="_APoff" style="display:none;<?php /*if($Invoice['Invoice']['status']=='Sent' || $Invoice['Invoice']['status']=='Due') { echo 'display:none;';}*/ ?>">The Invoice Should Be "Sent" To Add Payments</h1>
			
			<input type="hidden" name="data[Payment][invoice_id]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
			<input type="hidden" class="datepickerdate" name="data[Payment][date]" value=""/>
			<?php echo $form->end();?>
		</div>
		<div class="payment">
			<?php $tillnow=0; if(!empty($Invoice['Payment'])) { 
					echo '<label>Previous Payments</label>';
					echo '<ul id="_PrevPay">';
					foreach($Invoice['Payment'] as $payment) {?>
						<li>
							<span class="two"><?php echo $payment['amount'].' '.$CurS; $tillnow+=$payment['amount'];?> on<br/><?php echo $payment['date']; ?> </span><br/>
							<span class="one"><?php echo $html->link($html->image('delete.png').'<span style="position:relative; top:-4px;"></span>',array('controller'=>'payments','action'=>'delete',$payment['id'],$payment['invoice_id']),array('escape' => false,'title'=>'Delete'),'Are You Sure You Want To Delete This Payment?');?></span>
						</li>
			<?php } echo '</ul>'; } else { ?>
				<label>No Previous Payments</label>
			<?php } ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#grandtotal').val('<?php $temp=$Invoice['Invoice']['amount']-$tillnow; printf('%.2f',$temp);?>');
				});
			</script>
		</div>
		<br style="clear:both;"/>
	<div class="close"></div> 
</div>