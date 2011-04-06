<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components=array('Session','RequestHandler','Auth','Email');
	var $helpers=array('Html','Form','Javascript');
	var $uses=array('User','Invoice');
	
	function beforeFilter(){
		$this->Auth->autoRedirect = false;
		$this->Auth->userScope = array('User.active' => true);
		$this->Auth->loginError='Login failed. Invalid username or password or User Confirmation Required. Please Check Your Email';
		$this->Auth->loginRedirect = array('controller' => 'invoices', 'action' => 'index');
		$this->Auth->allow(array('forgotpass','sendmail','activate','login','checkid'));
	}
	
	function checkid($url){
		if ($this->RequestHandler->isAjax()) {
			if($this->User->find('first',array('conditions'=>array('User.username'=>$url)))){
				Configure::write('debug', 0);
				$this->autoRender = false;
				echo '0';
				exit();
			}
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();		
		}			
	}
	
	function login(){		
		$this->layout='login';
		if( !empty($this->data) && $this->Auth->user() ){
			$company=$this->User->Company->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
			$this->Session->write('Company.name',$company['Company']['name']);
			$this->Session->write('Setting.timezone',$company['Setting']['timezone']);
			$todue=$this->Invoice->find('all',array('conditions'=>array('Invoice.company_id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Sent')));
			foreach($todue as $d){
				$this->Invoice->id=$d['Invoice']['id'];
				
				/**
				* Find Due Date In Timestamp
				**/
				$str='+'.$d['Invoice']['due'].' days';
				$in_date=strtotime($d['Invoice']['date']);
				$due_date=strtotime($str,$in_date);
				
				/**
				*	Generate the current date in the user timezone
				**/
				$timezone=new DateTimeZone('Asia/Calcutta');
				$today=new DateTime('now',$timezone);
				$offset=$today->getOffset();
				$d=date('U',$today->format('U')+$offset);
				
				/**
				*	Compare the Timestaps
				**/
				if($d>=$due_date)
					$this->Invoice->saveField('status','Due');
			}
			
			$user=$this->User->Profile->find('first',array('conditions'=>array('User.id'=>$this->Auth->user('id')),'fields'=>array('id','options')));
			$this->User->Profile->id=$user['Profile']['id'];
			$this->User->Profile->saveField('lastLogin',date('Y-m-d H:i:s'));
			if(!empty($user['Profile']['options'])) {
				$options=explode(',',$user['Profile']['options']);
				$logincount=intval($options[0]);
				$logincount++;
				if($options[1]==1 && $logincount>6) $options[1]=0; 
				$op=$logincount.','.$options[1].','.$options[2];
				$this->User->Profile->saveField('options',$op);
				$this->Session->write('Auth.User.Profile.options',$op);
			}
			if($this->Session->read('Auth.User.role')=='admin')
				$this->redirect(array('controller'=>'Companies','action'=>'admin'));
			else
			$this->redirect($this->Auth->redirect());
		}
	}
	
	function logout(){
		$this->Session->setFlash('You Have Successfully Logged Out');
		$this->redirect($this->Auth->logout());
	}
	
	/**
	*	@todo Email Component - Send Email
	*/
	function forgotpass(){
		$this->layout='login';
		if( !(empty($this->data))){
			$userid=$this->User->find('first',array('conditions'=>array('User.email'=>$this->data['User']['email']),'fields'=>array('User.id','User.password','User.username')));
			if($userid){
			$this->Email->to=$this->data['User']['email'];
			$this->Email->from="XpressInvoice<no-reply@xpressinvoice.com>";
			$this->Email->subject="Reset Password";
			$this->Email->sendAs="both";
			
			$temppass=$this->__generatePassword(8);
			$tempenpass=$this->Auth->password($temppass);
			$this->User->id=$userid['User']['id'];
			$this->User->saveField('password',$tempenpass);
			
			$body='Your Login Details Has Been Reset To
Username: '.$userid['User']['username'].'
Password: '.$temppass.'
Please Login and Change Your Password Here:
http://xpressinvoice.com/Settings/';
			
			$this->Email->send($body);
			
			$this->Session->setFlash('A mail with password reset details has been sent to '.$this->data['User']['email']);
			$this->redirect(array('action'=>'login'));
			}
			else
			{
			$this->Session->setFlash($this->data['User']['email'].' Not Present. Cannot Reset Password');
			}
		}
	}
	
	function changepass(){
	if ($this->RequestHandler->isAjax()) {
		if(!empty($this->data))
		{
			$oldpass=$this->User->find('first',array('conditions'=>array('User.username'=>$this->Session->read('Auth.User.username')),'fields'=>array('password')));
			$this->data['User']['password']=$this->Auth->password($this->data['User']['password']);
			if($oldpass['User']['password']==$this->data['User']['password'])
			{
				if($this->data['User']['npass']==$this->data['User']['rnpass'])
				{
					$this->User->id=$this->Session->read('Auth.User.id');
					$this->data['User']['npass']=$this->Auth->password($this->data['User']['npass']);
					if(!$this->User->saveField('password',$this->data['User']['npass']))
					{
						$this->log('C:Users A:changepass Could not save the password field','dberror');
						echo 'Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience';
						Configure::write('debug', 0);
						$this->autoRender = false;
						exit();	
					}
					echo 'Your Password Has Been Changed Successfully';
					Configure::write('debug', 0);
					$this->autoRender = false;
					exit();						
				}
				else
				{
					echo 'Validation Failed';
					Configure::write('debug', 0);
					$this->autoRender = false;
					exit();
				}
			}
			else
			{
				echo 'Your Password Could Not Be Changed';
				Configure::write('debug', 0);
				$this->autoRender = false;
				exit();
			}
		}
		else
		{
			echo 'Your Password Could Not Be Changed';
			Configure::write('debug', 0);
			$this->autoRender = false;
			exit();
		}
	}
	}
	
	function activate($id=null){
		if($id==null) {
			$this->redirect(array('controller'=>'Invoices'));
		}
		else
		{
			$this->User->id=$id;
			if($user=$this->User->read())
			{
				if($user['User']['active']==0){
					$this->User->saveField('active',1);
					$this->Session->setFlash('Your Account Has Been Activated. Please Login');
					$this->redirect(array('action'=>'login'));	
				}
				else
				{
					$this->Session->setFlash('Your Account Has Already Been Activated. Please Login');
					$this->redirect(array('action'=>'login'));					
				}
			}
			else
			{
				$this->Session->setFlash('No Such User Present');
				$this->redirect(array('controller'=>'Invoices'));
			}
		}
	}
	
	/**
	* http://www.laughing-buddha.net/jon/php/password/
	**/
	function __generatePassword ($length = 8)
	{
		  // start with a blank password
		  $password = "";
		  // define possible characters
		  $possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
		  // set up a counter
		  $i = 0; 
		  // add random characters to $password until $length is reached
		  while ($i < $length) { 
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$password .= $char;
			$i++;
		  }
		  // done!
		  return $password;
	}
}
?>