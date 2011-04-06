<?php
	echo $javascript->link('jquery'); 
?>
<div id="ListClients" class="row content">
	<div class="column grid_14">
	
		<div class="row">
		<div class="column grid_11">
		<?php $session->flash(); ?>
		</div>
		</div>
			
		<div class="row headline" id="ListInvoiceHeadline">
			<div class="column grid_11 margin30">Upgrade</div>
		</div>
		
		<div class="row" id="ListInvoicesItems">
			<div class="column grid_14">
				<div id="plans-pricing">
				<?php echo $this->element('pricing');?>				
				</div>
			</div>
		</div>
		
	</div>
</div>