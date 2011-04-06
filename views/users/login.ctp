<?php
	echo $javascript->link('jquery');
	$session->flash('auth'); ?>
	<div id="loginform">
		<?php echo $form->create('User', array('action' => 'login')); ?>
		<div class="field"><label>Username:</label><input type="text" name="data[User][username]"/></div>
		<div class="field"><label>Password:</label><input type="password" name="data[User][password]"/></div>
		<div class="button"><span class="big"><a href="#" class="trigger">Login</a></span> | <?php echo $html->link('Forgot Password?',array('controller'=>'users','action'=>'forgotpass')); ?> | <?php echo $html->link('Sign Up',array('controller'=>'Pages','action'=>'signup')); ?></div>
		<input class="sub" type="submit" style="display:none;"/>
		<?php echo $form->end(); ?>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.trigger').click(function(){
			$('.sub').trigger('click');
		});
		var t=setTimeout(dis,2000);
		function dis(){
			$('#flashMessage').fadeOut();
			clearTimeout(t);
		}
	});
</script>