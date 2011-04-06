<?php 
echo $javascript->link('jquery'); 
echo $javascript->link('jquery.form');
echo $javascript->link('jquery.validate');
echo $javascript->link('settings/quicksetup');
?>
<div id="UpdateSettings" class="row content">

	<div class="row">
		<div class="column grid_11">
			<?php $session->flash(); ?>
		</div>
	</div>
	
	<div class="row headline" id="NewInvoiceHeadline">
			<div class="column grid_14 pad30">
			Quick Setup
			</div>		
	</div>
	
	<div class="row">
		<div class="column grid_14 pad30">
			<div class="rule60" ></div>
		</div>
	</div>
	
	<div class="row" id="NewInvoiceForm">
		<div class="column grid_14 pad30">
			
			<div class="newinsub indetailshead">Please Enter The Following Essentials</div>
			<div id="UpdateDetails" class="indetails">
			<?php echo $form->create('Setting',array('action'=>'quicksetup','default'=>false));	?>
			<span class="errmsg"></span>
			<div><label>Tax ID's:</label><textarea class="notes" name="data[Setting][taxids]"></textarea><div class="inputinfo"><b>(Eg: "TAX TIN:1234567,STATE TAX:123456" without quotes.Separate by comma)</b></div></div>
			<div><label>Time Zone:</label>
			<select name="data[Setting][timezone]">
			<?php
				$all = timezone_identifiers_list();
				foreach($all as $a){
					echo '<option value="'.$a.'" '.'>'.$a.'</option>';
				}
			?>
			</select>
			</div>
			<div>
				<label>Currency:</label>
				<?php echo $this->element('currency',array('name'=>'data[Setting][currency]','current'=>'India Rupees,INR'));?>
			</div>
			<div class="newinbut">
				<input id="QSetupSubmit" class="bigbutton" type="submit" value="Finish"/>
				<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
			</div>
			<?php echo $form->end(); ?>	
			</div>			
		</div>
	</div>
</div>