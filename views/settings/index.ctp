<?php 
echo $javascript->link('jquery'); 
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.tools');
echo $javascript->link('jquery.validate');
echo $javascript->link('jquery.numeric');
echo $javascript->link('jquery.checkbox');
echo $javascript->link('settings/index');
echo $html->css('checkbox');
?>
<div id="UpdateSettings" class="row content">

	<div class="row">
		<div class="column grid_14">
			<?php $session->flash(); ?>
		</div>
	</div>
	
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
			Account Settings
			</div>		
	</div>
	
	<div class="row">
		<div class="column grid_14 pad30">
			<div class="rule60" ></div>
		</div>
	</div>
	
	<div class="row" id="NewInvoiceForm">
		<div class="column grid_14 pad30">
			<div class="newinsub">You have <?php echo $Maxin-$Setting['Setting']['monnum']; ?> Number of Invoices Out of <?php echo $Maxin; ?> Invoices.</div>
			<div class="newinsub indetailshead">Business & User Details</div>
			<div id="UpdateDetails" class="indetails">
			<?php echo $form->create('Company',array('action'=>'updatedetails'));	?>
			<div><label>User Name:</label><input class="field" type="text" name="data[User][name]" value="<?php echo $session->read('Auth.User.name'); ?>"/></div>
			<div><label>Business Name:</label><input class="field" type="text" name="data[Company][name]" value="<?php echo $Setting['Company']['name']; ?>"/></div>
			<div><label>Business Email:</label><input class="field" type="text" name="data[Company][email]" value="<?php echo $Setting['Company']['email']; ?>"/></div>
			<div><label>Business Address:</label><textarea name="data[Company][address]" class="field" ><?php echo $Setting['Company']['address']; ?></textarea></div>
			<div><label>Tax ID's:</label><textarea class="notes" name="data[Setting][taxids]"><?php echo $Setting['Setting']['taxids']; ?></textarea> <div class="inputinfo"><b>(Eg: "TAX TIN:1234567,STATE TAX:123456" without quotes.Separate by comma)</b></div></div>
			<div><label>Time Zone:</label>
			<select name="data[Setting][timezone]">
			<?php
				$all = timezone_identifiers_list();
				foreach($all as $a){
					$l1='<option value="'.$a.'" ';
					if($Setting['Setting']['timezone']==$a)	$l2='selected="selected" '; else $l2='';
					$l3='>'.$a.'</option>';
					echo $l1.$l2.$l3;
				}
			?>
			</select>
			</div>
			<div class="newinbut">
				<input class="bigbutton" type="submit" value="Update Business & User Details"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
				<span class="msg"></span>
			</div>
			<?php echo $form->end(); ?>	
			</div>
			
			<div class="newinsub insettingshead">Default Invoice Settings</div>
			<div id="UpdateSettings" class="indetails">
				<?php echo $session->read('Msg'); ?>
				<?php echo $form->create('Setting',array('action'=>'updateinvoicedefaults'));	?>
				<div>
					<label>Due in (Days)</label>
					<input class="field" type="text" name="data[Invoice][due]" value="<?php echo $Setting['Setting']['due']; ?>"/>
				</div>
				<div class="hid">
					<label>Discount (%):</label>
					<input class="cb dcb" type="checkbox"/>
					<input class="field num df" type="text" name="data[Setting][discount]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['discount'])) echo $Setting['Setting']['discount']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['discount'])) echo $Setting['Setting']['discount'];?>"/>
					<input id="changediscount" type="hidden" name="data[discount][check]" value="<?php if(!empty($Setting['Setting']['discount'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Tax 1 (%):</label>
					<input class="cb t1cb" type="checkbox"/>
					<input class="taxfield t1n" type="text" name="data[Setting][tax1name]" value="<?php if(!empty($Setting['Setting']['tax1name'])) echo $Setting['Setting']['tax1name']; else echo 'Tax1';?>" disabled="disabled"/>
					<input class="taxfield num t1" type="text" name="data[Setting][tax1]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['tax1'])) echo $Setting['Setting']['tax1']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax1'])) echo $Setting['Setting']['tax1'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax1name'])) echo $Setting['Setting']['tax1name'];?>"/>
					<input id="changetax1" type="hidden" name="data[tax1][check]" value="<?php if(!empty($Setting['Setting']['tax1'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Tax 2 (%):</label>
					<input class="cb t2cb" type="checkbox"/>
					<input class="taxfield t2n" type="text" name="data[Setting][tax2name]" value="<?php if(!empty($Setting['Setting']['tax2name'])) echo $Setting['Setting']['tax2name']; else echo 'Tax2';?>" disabled="disabled"/>
					<input class="taxfield num t2" type="text" name="data[Setting][tax2]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['tax2'])) echo $Setting['Setting']['tax2']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax2'])) echo $Setting['Setting']['tax2'];?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['tax2name'])) echo $Setting['Setting']['tax2name'];?>"/>
					<input id="changetax2" type="hidden" name="data[tax2][check]" value="<?php if(!empty($Setting['Setting']['tax2'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Shipping Charges:</label>
					<input class="cb sccb" type="checkbox"/>
					<input class="field num sc" type="text" name="data[Setting][shipping]" disabled="disabled" value="<?php if(!empty($Setting['Setting']['shipping'])) echo $Setting['Setting']['shipping']; else echo '0';?>"/>
					<input class="default" type="hidden" value="<?php if(!empty($Setting['Setting']['shipping'])) echo $Setting['Setting']['shipping'];?>"/>
					<input id="changeshipping" type="hidden" name="data[shipping][check]" value="<?php if(!empty($Setting['Setting']['shipping'])) echo '1'; else echo '0';?>"/>
				</div>
				<div class="hid">
					<label>Currency:</label>
					<?php echo $this->element('currency',array('name'=>'data[Setting][currency]','current'=>$CurS));?>
				</div>
				<div>
					<label>Notes:</label>
					<textarea class="notes" name="data[Setting][notes]"><?php echo $Setting['Setting']['notes']; ?></textarea>
				</div>
				<div class="newinbut">
					<input class="bigbutton" type="submit" value="Update Default Invoice Settings"/>
					<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
				</div>
				<?php echo $form->end(); ?>	
			</div>	
			
			<div class="newinsub indetailshead">Change Password</div>
			<div id="ChangePass"  class="indetails">
				<div class="message"></div>
				<?php echo $form->create('User',array('action'=>'changepass','default'=>false));	?>
					<div><label>Current Password:</label><input class="field" type="password" name="data[User][password]" value=""/></div>
					<div><label>New Password:</label><input class="field" type="password" name="data[User][npass]" value=""/></div>
					<div><label>Re-Enter Password:</label><input class="field" type="password" name="data[User][rnpass]" value=""/></div>
					<div style="clear:both;"></div>
					<div class="newinbut">
						<input class="bigbutton" type="submit" value="Change Password"/>
						<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
						<span class="msg"></span>
					</div>
				<?php echo $form->end(); ?>			
			</div>
			
			<?php $no=1; if($no!=1){ ?>
			<div class="newinsub indetailshead">Export & Unsubscribe</div>
			<div class="indetails">
				<?php echo $form->create('User',array('action'=>'changipass','default'=>false));	?>
					<div class="newinbut">
						<input class="bigbutton" type="submit" value="Export"/>
						<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
						<span class="msg"></span>
					</div>
				<?php echo $form->end(); ?>	
				<?php echo $form->create('User',array('action'=>'chanepass','default'=>false));	?>
					<div class="newinbut">
						<input class="bigbutton" type="submit" value="Unsubscribe"/>
						<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
						<span class="msg"></span>
					</div>
				<?php echo $form->end(); ?>			
			</div>
			<?php } ?>
			
		</div>
	</div>
</div>