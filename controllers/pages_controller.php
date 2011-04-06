<?php
	class PagesController extends AppController{
		var $name='Pages';
		var $uses=array('Company','EmailFormat');
		var $helpers=array('Form','Javascript','Html','Time');
		var $components=array('RequestHandler','Session','Email');
		
		function signup()
		{
			$this->layout="page";
			$this->pageTitle="Sign Up";
		}
		
		function index(){
			$this->layout="page";
			$this->pageTitle="Home";
		}
		
		function policy(){
			$this->layout="page";
			$this->pageTitle="Privicy Policy";
		}	
		
		function tour(){
			$this->layout="page";
			$this->pageTitle="Tour";
		}
		
		function sendcontact(){
		if ($this->RequestHandler->isAjax()) {
			$this->Email->from='XpressContact<no-reply@xpressinvoice.com>';
			$this->Email->to='avinasha1987@gmail.com';
			$this->Email->sendAs='both';
			$this->Email->subject='New Contact';
			$this->Email->send($this->data['Contact']['msg']);
			
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo 'Thank You. We will Come In Touch With You Soon';
			exit();	
		}	
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo 'Please Fill In The Message';
			exit();	
	}
	}

?>