<?php
class CompaniesController extends AppController {
	var $name = 'Companies';
	var $components=array('Session','RequestHandler','Auth','Email');
	var $helpers=array('Html','Form','Javascript');
	
	function beforeFilter(){
		$this->Auth->allow(array('add','test','checkid','upgrade'));
	}
	
	function test(){
		$this->set('Company',$this->Company->find('first',array('conditions'=>array('Company.id'=>'4b8fcbb8-dd74-4c4f-aea8-0ac436f41359'))));
	}
	
	function checkid($url){
		if ($this->RequestHandler->isAjax()) {
			if($this->Company->find('first',array('conditions'=>array('Company.url'=>$url)))){
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
	
	function add()
	{
		if (!empty($this->data))
		{ 
			$cid=$this->Company->find('first',array('conditions'=>array('Company.url'=>$this->data['Company']['url'])));
			$cname=$this->Company->User->find('first',array('conditions'=>array('User.username'=>$this->data['User']['username'])));
			if($cid)
			{
				$this->Session->setFlash('Company ID already present. Please Use A Different One');
				$this->redirect(array('controller'=>'Pages','action'=>'signup'));
			}
			else if($cname)
			{
				$this->Session->setFlash('User ID already present. Please Use A Different One');
				$this->redirect(array('controller'=>'Pages','action'=>'signup'));
			}
			else{
			$this->Company->set('accounttype','Basic');
			$this->Company->set('accountStartDate',date('Y-m-d'));
			$this->Company->set('accountEndDate',date('Y-m-d',strtotime('+6 month')));
			if ($this->Company->save($this->data)) 
			{
				/*Add User*/
				$this->data['User']['company_id']=$this->Company->id;
				$this->data['User']['role']='superuser';
				$this->data['User']['email']=$this->data['Company']['email'];
				$this->data['User']['active']=0;
				$this->data['Profile']['options']='0,1,0';
				if($this->Company->User->save($this->data))
				{
					$this->data['Profile']['user_id']=$this->Company->User->id;
					if($this->Company->User->Profile->save($this->data))
					{
						/*Add Settings*/
						$this->data['Setting']['company_id']=$this->Company->id;
						$this->data['Setting']['currency']='India Rupees,INR';
						$this->data['Setting']['timezone']='Asia/Kolkata';
						$this->data['Setting']['monnum']=1;
						$this->data['Setting']['mode']=0;
						if($this->Company->Setting->save($this->data))
						{
							$this->data['EmailFormat']['setting_id']=$this->Company->Setting->id;
							$this->data['EmailFormat']['invoice']='Hello {client_name},

Here is the invoice of {invoice_amount}.

You can view the invoice online at:
{invoice_link}

{signature}';
							
							$this->data['EmailFormat']['thankyou']='Hello {client_name},

We have received the payment for invoice {invoice_id}, Thank you!

You can view the invoice online at:

{invoice_link}

{signature}';
							
							$this->data['EmailFormat']['reminder']='Hello {client_name},

Just a reminder that Invoice {invoice_id} was due on {invoice_due_date}. Please make the payment of {invoice_amount} as soon as possible.

You can view the invoice online at:
{invoice_link}

{signature}';
							
							$this->data['EmailFormat']['signature']='Best regards,
{name}
{company}';
							
							$this->data['EmailFormat']['estimate']='Hello {client_name},

Here is the estimate of {invoice_amount}.

You can view the estimate online at:
{invoice_link}

{signature}';
							
							$this->data['EmailFormat']['estimatehead']='Estimate :{invoice_id}';
							$this->data['EmailFormat']['invoicehead']='Invoice :{invoice_id}';
							$this->data['EmailFormat']['thankyouhead']='Thank You';
							$this->data['EmailFormat']['reminderhead']='Reminder :{invoice_id}';
							if($this->Company->Setting->EmailFormat->save($this->data))
							{
								$this->data['Client']['name']='Sample Name';
								$this->data['Client']['company']='Sample Company';
								$this->data['Client']['email']='sampleemail@xxxxx.xxx';
								$this->data['Client']['company_id']=$this->Company->id;
								if($this->Company->Client->save($this->data))
								{
									$this->data['Invoice']['createdBy']=$this->Company->User->id;
									$this->data['Invoice']['lastModifiedBy']=$this->Company->User->id;
									$this->data['Invoice']['company_id']=$this->Company->id;
									$this->data['Invoice']['client_id']=$this->Company->Client->id;
									$this->data['Invoice']['number']='SAM001';
									$this->data['Invoice']['date']=date('Y-m-d');
									$this->data['Invoice']['discount']=10;
									$this->data['Invoice']['tax1name']='V.A.T';
									$this->data['Invoice']['tax1']=12.5;
									$this->data['Invoice']['currency']='Indian Rupee,INR';
									$this->data['Invoice']['notes']='Thank You';
									$this->data['Invoice']['total']=100;
									$this->data['Invoice']['amount']=102.5;
									if($this->Company->Invoice->save($this->data))
									{
										$this->data['InvoiceItem']['quantity']=1;
										$this->data['InvoiceItem']['type']='Product';
										$this->data['InvoiceItem']['description']='This is a sample Invoice Item. The Invoice Item type can be anything from Product to SqInch to Days.';
										$this->data['InvoiceItem']['price']=100;
										$this->data['InvoiceItem']['invoice_id']=$this->Company->Invoice->id;
										if($this->Company->Invoice->InvoiceItem->save($this->data))
										{
											$this->Email->from='XpressInvoice<no-reply@xpressinvoice.com>';
											$this->Email->to=$this->data['User']['name'].'<'.$this->data['Company']['email'].'>';
											$this->Email->subject="Account Activation";
											$this->Email->sendAs = 'both';
											$activation_link='http://xpressinvoice.com/Users/activate/'.$this->Company->User->id;
											$this->Email->send('Thank you for choosing XpressInvoice. We hope the service is very helpful to you. The signup to the free account is almost complete. Just click on the following link to activate your account
'.$activation_link);
											$this->Session->setFlash('An Activation Mail Has Been Sent To Your Email Address. Please Activate And Then Login');
											$this->redirect(array('controller'=>'Users','action'=>'Login'));
										}
									}
								}
							}
						}
					}
				}
			}
			else
			{
				$this->log('C:Companies A:add Could not save signup','dberror');
				$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
			}
		}	
		}
	}
	
	function updatedetails(){
			if(!empty($this->data))
			{
				$this->data['Company']['id']=$this->Session->read('Auth.User.company_id');
				$this->data['User']['id']=$this->Session->read('Auth.User.id');
				$temp=$this->Company->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id')));
				$this->data['Setting']['id']=$temp['Setting']['id'];

				if(!$this->Company->save($this->data,array('fields'=>array('Company.name','Company.address','Company.email'))))
				{
					$this->log('C:Companies A:updatedetails Could not save the Company Fields','dberror');
					$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
					$this->redirect(array('controller'=>'Settings','action'=>'index'));		
				}
				else
				{
					if(!$this->Company->Setting->save($this->data,array('fields'=>array('Setting.taxids','Setting.timezone'))))
					{
						$this->log('C:Settings A:updatedetails Could not save the Setting Fields','dberror');
						$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
						$this->redirect(array('controller'=>'Settings','action'=>'index'));	
					}
					else
					{
						if(!$this->Company->User->save($this->data,array('fields'=>array('User.name'))))
						{
							$this->log('C:Settings A:updatedetails Could not save the User Fields','dberror');
							$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
							$this->redirect(array('controller'=>'Settings','action'=>'index'));	
						}
					}
				}
				$this->Session->setFlash('Company & User Details Settings Updated');
				$this->redirect(array('controller'=>'Settings','action'=>'index'));				
			}
			else
			{
				$this->Session->setFlash('Company & User Details Could Not Be Updated');
				$this->redirect(array('controller'=>'Settings','action'=>'index'));
			}
	}
			
	function __getAccountType(){
		return array('Basic');
	}
	
	function upgrade(){
	}
}
?>