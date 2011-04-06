<?php 
echo $javascript->link('jquery'); 
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.tools');
echo $javascript->link('jquery.validate');
echo $javascript->link('jquery.datepicker');
echo $javascript->link('jquery.numeric');
echo $javascript->link('jquery.checkbox');
echo $javascript->link('jquery.livequery');
echo $javascript->link('invoices/edit');
echo $html->css('datepicker');
echo $html->css('checkbox');
?>
<div id="EditInvoice" class="row content">

	<div class="row">
			<div class="column grid_11">
			<?php $session->flash(); ?>
			</div>
			</div>
	
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
			Edit Invoice
			<div class="newincancel"><?php echo $html->link('Cancel',array('controller'=>'invoices','action'=>'view',$Invoice['Invoice']['id'])); ?></div>
			</div>		
	</div>
	
	<div class="row">
		<div class="column grid_14 pad30">
			<div class="rule60" ></div>
		</div>
	</div>
	
	<div class="row" id="NewInvoiceForm">
		<div class="column grid_14 pad30">
			<?php echo $form->create('Invoice',array('action'=>'edit')); ?>
			
			<div class="newinsub indetailshead">Enter Invoice Details</div>
			<div class="indetails">
			<div><label>Client:</label>
			<select class="cbfield clientfield" name="data[Invoice][client_id]">
				<?php				
					if(count($Clients)==0)
					echo '<option value="" class="noclientnode">No Client</option>';
					else{
					foreach($Clients as $Client){
						$str1='<option ';
						if($Invoice['Client']['id']==$Client['Client']['id']){ $str2='selected="selected"';	} else {$str2='';}
						$str3=' value="'.$Client['Client']['id'].'">';
						echo $str1.$str2.$str3;
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
			<div class="erroot"><label>Invoice Number:</label><input class="field" type="text" name="data[Invoice][number]" value="<?php echo $Invoice['Invoice']['number']; ?>"/><p class="errmsg"></p>Last Sent Invoice Number:<b><?php if(empty($Setting['Setting']['lastinnum'])) echo 'None'; else echo $Setting['Setting']['lastinnum']; ?></b></div>
			<div class="erroot"><label>Date:</label><input type="text" name="data[Invoice][date]" class="datepicker field" value="<?php echo $Invoice['Invoice']['date']; ?>"/><p class="errmsg"></p></div>
			<div><label>PO Number:</label><input class="field" type="text" name="data[Invoice][ponumber]" value="<?php if(!empty($Invoice['Invoice']['ponumber']))echo $Invoice['Invoice']['ponumber']; ?>"/></div>
			<div><label>PO Date:</label><input type="text" name="data[Invoice][podate]" class="datepicker field" value="<?php if(!empty($Invoice['Invoice']['podate']))echo $Invoice['Invoice']['podate']; ?>"/></div>
			<div><label>Delivery Challan:</label><input class="field" type="text" name="data[Invoice][dc]" value="<?php if(!empty($Invoice['Invoice']['dc']))echo $Invoice['Invoice']['dc']; ?>"/></div>
			</div>
			
			<div class="newinsub insettingshead">Show Invoice Settings</div>
			<div class="insettings">
				<div>
					<label>Due in (Days)</label>
					<input class="field" type="text" name="data[Invoice][due]" value="<?php echo $Invoice['Invoice']['due']; ?>"/>
				</div>
				<div class="hid">
					<label>Discount (%):</label>
					<input class="cb dcb" type="checkbox"/>
					<input class="field num df" type="text" name="data[Invoice][discount]" disabled="disabled" value="<?php if(!empty($Invoice['Invoice']['discount'])) echo $Invoice['Invoice']['discount']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['discount'])) echo $Invoice['Invoice']['discount'];?>"/>
					<input id="changediscount" type="hidden" name="data[discount][check]" value="<?php if(!empty($Invoice['Invoice']['discount'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Tax 1 (%):</label>
					<input class="cb t1cb" type="checkbox"/>
					<input class="taxfield t1n" type="text" name="data[Invoice][tax1name]" value="<?php if(!empty($Invoice['Invoice']['tax1name'])) echo $Invoice['Invoice']['tax1name']; else echo 'Tax1';?>" disabled="disabled"/>
					<input class="taxfield num t1" type="text" name="data[Invoice][tax1]" disabled="disabled" value="<?php if(!empty($Invoice['Invoice']['tax1'])) echo $Invoice['Invoice']['tax1']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['tax1'])) echo $Invoice['Invoice']['tax1'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['tax1name'])) echo $Invoice['Invoice']['tax1name'];?>"/>
					<input id="changetax1" type="hidden" name="data[tax1][check]" value="<?php if(!empty($Invoice['Invoice']['tax1'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Tax 2 (%):</label>
					<input class="cb t2cb" type="checkbox"/>
					<input class="taxfield t2n" type="text" name="data[Invoice][tax2name]" value="<?php if(!empty($Invoice['Invoice']['tax2name'])) echo $Invoice['Invoice']['tax2name']; else echo 'Tax2';?>" disabled="disabled"/>
					<input class="taxfield num t2" type="text" name="data[Invoice][tax2]" disabled="disabled" value="<?php if(!empty($Invoice['Invoice']['tax2'])) echo $Invoice['Invoice']['tax2']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['tax2'])) echo $Invoice['Invoice']['tax2'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['tax2name'])) echo $Invoice['Invoice']['tax2name'];?>"/>
					<input id="changetax2" type="hidden" name="data[tax2][check]" value="<?php if(!empty($Invoice['Invoice']['tax2'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Shipping Charges:</label>
					<input class="cb sccb" type="checkbox"/>
					<input class="field num sc" type="text" name="data[Invoice][shipping]" disabled="disabled" value="<?php if(!empty($Invoice['Invoice']['shipping'])) echo $Invoice['Invoice']['shipping']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Invoice['Invoice']['shipping'])) echo $Invoice['Invoice']['shipping'];?>"/>
					<input id="changeshipping" type="hidden" name="data[shipping][check]" value="<?php if(!empty($Invoice['Invoice']['shipping'])) echo '1'; else echo '0';?>"/>
				</div>
				<div>
					<label>Currency:</label>
					<?php $e=explode(',',$Invoice['Invoice']['currency']); echo $this->element('currency',array('name'=>'data[Invoice][currency]','current'=>$e[1]));?>
				</div>
				<div>
					<label>Notes:</label>
					<textarea class="notes" name="data[Invoice][notes]"><?php echo $Invoice['Invoice']['notes']; ?></textarea>
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
				<?php $count=0; 
					foreach($Invoice['InvoiceItem'] as $item){
				?>
				<ul id="Item<?php echo $count;?>">
					<li class="actions"><a href="#" onClick="removeItem('#Item<?php echo $count;?>')">Delete</a></li>
					<li class="qty">
						<input class="num qtycal" type="text" size="2" name="data[InvoiceItem][<?php echo $count;?>][quantity]" value="<?php echo $item['quantity']; ?>"/>
						<input name="data[InvoiceItem][<?php echo $count;?>][type]" value="<?php echo $item['type']; ?>" size="3"/>
					</li>
					<li class="des"><textarea name="data[InvoiceItem][<?php echo $count;?>][description]"><?php echo $item['description']; ?></textarea></li>
					<li class="price"><input class="num pricecal pricenum" type="text" name="data[InvoiceItem][<?php echo $count;?>][price]" value="<?php echo $item['price']; ?>"/></li>
					<li class="total">0</li>
					<input type="hidden" value="0.0" class="itemtotal"/>
					<input type="hidden" name="data[InvoiceItem][<?php echo $count;?>][order]" value="<?php echo $count;?>"/>
					</ul>
				<?php $count++; } ?>
				</div>
				
				<div class="additem"><a class="smallbutton" href="#" onClick="addItem()">Add New Item</a></div>
			</div>
			
			<div class="newintotal">
				<input type="hidden" name="data[Invoice][total]" value="0" class="subtotal"/>
				<div class="left">
					<span class="lfield">Sub Total<br/></span>
					<span id="dflb" style="display:none;" class="lfield">Discount (%)<br/></span>
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
			
			<div class="newinbut">
				<input id="EditInvoiceSubmit" class="bigbutton" type="submit" value="Save Changes"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			
			<input type="hidden" id="count" name="data[count]" value="<?php echo $Count; ?>"/>
			<input type="hidden" name="data[Invoice][id]" value="<?php echo $Invoice['Invoice']['id']; ?>"/>
			<input type="hidden" id="grandtotal" name="data[Invoice][amount]" value="0"/>
			<input type="hidden" id="rval" name="data[Invoice][roundoff]" value="<?php echo $Invoice['Invoice']['roundoff']; ?>"/>
			<?php echo $form->end();?>
		</div>
	</div>
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