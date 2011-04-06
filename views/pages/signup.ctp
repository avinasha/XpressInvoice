<?php 
	echo $html->css('page/form');
	echo $html->css('page/structure');
	echo $html->css('page/theme');
	echo $javascript->link('jquery.validate'); 
	echo $javascript->link('pages/signup'); 
	echo $javascript->link('pages/index'); 
?>

<div id="status">
<div class="row center status_con">
	<div class="column grid_11 nav">
	<ul>
		<li><a href="/" title="">Home</a></li>
		<li><?php echo $html->link('Sign In',array('controller'=>'Users','action'=>'login'),array('class'=>'imp')); ?></li>
		<li><?php echo $html->link('Tour','http://www.slideshare.net/techfolder/xpress-invoice-3695197'); ?></li>
		<li>| Call Us : +919980820256</li>
	</ul>
	</div>
	
	<div class="column grid_3 nav">
		<?php echo $html->link($html->image('page/logobw.png'),'http://thetechfolder.com',array('escape' => false,'title'=>'TechFolder','class'=>'logobw'));?>
	</div>
</div>
</div>

<div id="content">
<div class="row">
	<div class="column grid_10">
		<div id="container">
		
		<?php echo $html->image('logo.jpg');?>
	
		<?php $session->flash(); ?>
		
		<?php	echo $form->create('Company',array('default'=>false)); ?>
		
		<div class="info">
			<h2>Sign Up for FREE in Just a Few Clicks</h2>
		<div></div>
		</div>
		
		<ul>		
			<li id="foli7" class="first section">
				<h3 id="title7">Company Details</h3>
			</li>
			
			<li id="foli1" class="">
				<label class="desc" id="title1" for="Fieldcname">Company Name
				<span id="req_1" class="req">*</span>
				</label>
				
				<div>
					<input id="Fieldcname" 	name="data[Company][name]" 	type="text" 	class="field text medium" 	value="" 	maxlength="255"  tabindex="1" 	onkeyup="" />
					<span class="errmsg"></span>
				</div>
			</li>


			<li id="foli3"	class="">
				<label class="desc" id="title3" for="Field3">Company ID
				<span id="req_3" class="req">*</span>
				</label>
				
				<div>
					<input id="Fieldcid" name="data[Company][url]" type="text"  class="field text medium loadleft" value="" maxlength="255" tabindex="2" onkeyup=""/>
					<div class="loading loadleft marginl10"><?php echo $html->image('loader.gif'); ?></div><div class="errmsg"></div>
				</div>
			</li>


			<li id="foli8" 	class="">
				<label class="desc" id="title8" for="Field8">Company Email
				<span id="req_8" class="req">*</span>
				</label>
				<div>
					<input id="Field8" name="data[Company][email]" type="text" class="field text medium" value="" maxlength="255" tabindex="3"/> 
					<span class="errmsg"></span>
				</div>
			</li>

			<li id="foli6" class="section">
					<h3 id="title6">User Details</h3>
			</li>


			<li id="foli11" class="">
				<label class="desc" id="title11" for="Field11">Full Name
							<span id="req_11" class="req">*</span>
				</label>
				
				<div>
					<input id="Field11"	name="data[User][name]" type="text" class="field text medium" value="" maxlength="255" tabindex="4" onkeyup=""/>
					<span class="errmsg"></span>
				</div>
			</li>


			<li id="foli12" class="">
				<label class="desc" id="title12" for="Fielduser">Username
							<span id="req_12" class="req">*</span>
				</label>
				
				<div>
					<input id="Fielduser"	name="data[User][username]" type="text" class="field text medium loadleft" value="" maxlength="255" tabindex="5" onkeyup=""/>
					<div class="loading loadleft marginl10"><?php echo $html->image('loader.gif'); ?></div><div class="errmsg"></div>
				</div>
			</li>


			<li id="foli13" class="">
				<label class="desc" id="title13" for="Fieldpass">Password
							<span id="req_13" class="req">*</span>
				</label>
				
				<div>
					<input id="Fieldpass"	name="data[User][password]" type="password" class="field text medium" value="" maxlength="255" tabindex="6" onkeyup=""/>
					<span class="errmsg"></span>
				</div>
			</li>


			<li id="foli14" class="">
				<label class="desc" id="title14" for="Field14">Re Enter Password
				<span id="req_14" class="req">*</span>
				</label>
			
				<div>
					<input id="Field14"	name="data[User][repassword]"	type="password" class="field text medium" value=""	maxlength="255" tabindex="7" onkeyup="" />
					<span class="errmsg"></span>
				</div>
			</li>

			<li>
				<div>
					<input type="submit" id="NewSignUpSubmit" class="button submit" value="Sign Up" tabindex="8"/>
					<span class="loading"><?php echo $html->image('loader3.gif'); ?></span>
				</div>
			</li>
		</ul>
		
		<?php echo $form->end(); ?>

</div><!--container-->
</div>
<div class="column grid_4">
<?php echo $html->image('page/thanks.gif'); ?>
<div class="links">Works in latest versions of <a href="http://www.google.com/chrome" title="Google Chrome">Google Chrome</a>, <a href="http://www.mozilla.com/firefox" title="Mozilla Firefox">Mozilla Firefox</a>, <a href="http://www.apple.com/safari/" title="Safari">Safari</a> and <a href="http://www.opera.com" title="Opera">Opera</a><span class="small"><br/>Note: Does not work well in Internet Explorer</span></div>
</div>
</div>
</div>
<?php echo $this->element('footer'); ?>

