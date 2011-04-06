<?php 
echo $javascript->link('jquery');
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.tools');
echo $javascript->link('jquery.validate');
echo $javascript->link('invoices/viewsingle');
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
			<?php if($Invoice['Invoice']['status']=='Due') { ?>
			<div class="vinstatus due">Due</div>
			<?php } elseif($Invoice['Invoice']['status']=='Paid'){ ?>
			<div class="vinstatus paid">Paid</div>
			<?php } elseif($Invoice['Invoice']['status']=='Estimate'){ ?>
			<div class="vinstatus estimate">Estimate</div>
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
		
		<div class="row">
			<div class="column grid_11 margin30">
				<span id="_InvoiceSign" style="<?php if($Invoice['Invoice']['status']=='Estimate') { ?> display:none;<?php } ?>">
					<div class="vinsign">
					-sd
					</div>
				</span>
			</div>
		</div>
		
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
					<li id="_SendReply"><p class="modalInput" rel="#SendReply"><?php if($Invoice['Invoice']['status']=='Estimate'){ echo 'Reply To Estimate'; } else { echo 'Reply To Invoice'; } ?></p></li>
				</ul>
			</div>
		</div>
	</div>	
</div>

<div class="modal" id="SendReply"> 
	<h2><?php if($Invoice['Invoice']['status']=='Estimate'){ echo 'Reply To Estimate'; } else { echo 'Reply To Invoice'; } ?></h2> 
 	<?php 	echo $form->create('Invoice',array('default'=>false,'action'=>'sendreply')); ?>	
	<div>
		<label>Subject:</label>
		<input type="text" class="subject" name="data[subject]" value="Reply To <?php if($Invoice['Invoice']['status']=='Estimate'){ echo 'Estimate: '.$Invoice['Invoice']['number']; } else { echo 'Invoice: '.$Invoice['Invoice']['number']; } ?>"/>
	</div>
	<div>
		<label>Message:</label>
		<textarea name="data[msg]" class="msg"></textarea>
	</div>
	<input type="hidden" name="data[invoice]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
	<div class="newinbut">
				<input id="SendReplySubmit" class="bigbutton" type="submit" value="Send"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
	</div>
	<?php	
		echo $form->end();
	?>
	<div class="close"></div> 
</div>