<?php
	echo $javascript->link('jquery');
	$session->flash('auth'); ?>
	<div id="loginform">
		<?php echo $form->create('User', array('action' => 'forgotpass')); ?>
		<span class="field"><label>Email Address</label><input type="text" name="data[User][email]"/></span>
		<div class="button"><a href="#" class="trigger">Send Password Reset Request</a></div>
		<input class="sub" type="submit" style="display:none;"/>
		<?php echo $form->end(); ?>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.trigger').click(function(){
			$('.sub').trigger('click');
		});
		var t=setTimeout(dis,5000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
	});
</script>