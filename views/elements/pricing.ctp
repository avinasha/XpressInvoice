<?php echo $html->css('page/pricing.css'); ?>
<div class="pricing">
	<div class="row">
		<div class="column grid_14">
			<table>
				<tr>
					<th><div class="featurehead">Features</div></th>
					<th><div class="heading">Free</div></th>
					<th><div class="heading">Small</div></th>
					<th><div class="heading">Medium</div></th>
					<th><div class="heading">Large</div></th>
				</tr>
				<tr>
					<td><div class="feature">Number of Invoice Per Month</div></td>
					<td><div class="result num">3</div></td>
					<td><div class="result num">30</div></td>
					<td><div class="result num">150</div></td>
					<td><div class="result num">300</div></td>
				</tr>
				<tr>
					<td><div class="feature">Unbranded Invoice</div></td>
					<td><div class="result"><?php echo $html->image('no.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
				</tr>
				<tr>
					<td><div class="feature">Number of Clients</div></td>
					<td><div class="result">Unlimited</div></td>
					<td><div class="result">Unlimited</div></td>
					<td><div class="result">Unlimited</div></td>
					<td><div class="result">Unlimited</div></td>
				</tr>
				<tr>
					<td><div class="feature">Send As Estimate</div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
				</tr>
				<tr>
					<td><div class="feature">Send Reminders</div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
				</tr>
				<tr>
					<td><div class="feature">Send Thankyou</div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
				</tr>
				<tr>
					<td><div class="feature">Download PDF</div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
					<td><div class="result"><?php echo $html->image('yes.png'); ?></div></td>
				</tr>
				<tr>
					<td><div class="feature">Price</div></td>
					<td><div class="heading">Free</div></td>
					<td><div class="heading">Monthly: 500 Rs<br/>Yearly: 5000 Rs</div></td>
					<td><div class="heading">Monthly: 1000 Rs<br/>Yearly: 10000 Rs</div></td>
					<td><div class="heading">Monthly: 2000 Rs<br/>Yearly: 20000 Rs</div></td>
				</tr>
			</table>
		</div>
	</div>	
	<div class="row">
		<div class="column grid_14">
			<div class="signup"><?php echo $html->link('Sign Up For Free Now',array('controller'=>'Pages','action'=>'signup')); ?></div>	
		</div>
	</div>						
</div>