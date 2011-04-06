<?php
	Router::connect('/signup',array('controller' => 'Pages','action'=>'signup'));
	Router::connect('/login',array('controller' => 'Users','action'=>'login'));
	Router::connect('/',array('controller' => 'Pages'));
?>