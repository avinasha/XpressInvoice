<?php
class InvoicesController extends AppController {

	var $name = 'Invoices';
	var $displayField = 'number';
	var $components=array('Session','RequestHandler','Auth','Email');
	var $helpers=array('Html','Form','Javascript','Session','Time','Number');
	var $uses=array('Invoice','User');
	function beforeFilter(){
		$this->Auth->allow(array('viewsingle','viewpdf','sendreply'));
		$this->Auth->authorize='controller';
	}
	
	function isAuthorized(){
		$options=$this->User->Profile->find('first',array('conditions'=>array('Profile.user_id'=>$this->Session->read('Auth.User.id')),'fields'=>array('Profile.options')));
		$op=explode(',',$options['Profile']['options']);
		if($op[2]=='0') {
		 $this->redirect(array('controller'=>'Settings','action'=>'quicksetup'));
		}
		else {
			return true;		
		 }
	}
	
	function changestatus(){
		if(!empty($this->data))
		{
			$this->Invoice->id=$this->data['Invoice']['id'];
			if($invoice=$this->Invoice->read()){
				$this->Invoice->saveField('status',$this->data['Invoice']['status']);
				$this->redirect(array('action'=>'view',$this->Invoice->id));
			}
		}
	}
	
	function test(){
		$this->set('M',$this->Session->read('Auth.User.Profile.options'));
	}
	
	function index(){	
			if($this->data==null || $this->data['Client']=='All'){
			$sent=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Sent')));
			$estimate=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Estimate')));
			$due=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Due')));
			$draft=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Draft')));
			$paid=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Paid')));
			$this->set('Showing','All');
			$this->set('ShowingID','All');
			}
			else{
			$sent=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Sent','Invoice.client_id'=>$this->data['Client'])));
			$estimate=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Estimate','Invoice.client_id'=>$this->data['Client'])));
			$due=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Due','Invoice.client_id'=>$this->data['Client'])));
			$draft=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Draft','Invoice.client_id'=>$this->data['Client'])));
			$paid=$this->Invoice->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'),'Invoice.status'=>'Paid','Invoice.client_id'=>$this->data['Client'])));
			
			$this->Invoice->Client->id=$this->data['Client'];
			$client=$this->Invoice->Client->read();
			if(!empty($client['Client']['company']))
				$Client=$client['Client']['company'];
			else
				$Client=$client['Client']['name'];
			$this->set('Showing',$Client);
			$this->set('ShowingID',$this->data['Client']);
			}
			
			$maxin=$this->Invoice->Company->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Company.accountType')));
			if($maxin['Company']['accountType']=='Basic') $maxin['Company']['accountType']=3; else $maxin['Company']['accountType']=(int)$maxin['Company']['accountType'];
			$this->set('Maxin',$maxin['Company']['accountType']);
			
			$setting=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
			
			$count=count($sent);
			for($i=0;$i<$count;$i++)
			{
				$sent[$i]['Invoice']['date']=date('d-m-Y',strtotime($sent[$i]['Invoice']['date']));
			}
			$this->__sanitize($sent);
			$this->set('Sent',$sent);
			
			
			$count=count($estimate);
			for($i=0;$i<$count;$i++)
			{
				$estimate[$i]['Invoice']['date']=date('d-m-Y',strtotime($estimate[$i]['Invoice']['date']));
			}
			$this->__sanitize($estimate);
			$this->set('Estimate',$estimate);
			
			
			$count=count($due);
			for($i=0;$i<$count;$i++)
			{
				$due[$i]['Invoice']['date']=date('d-m-Y',strtotime($due[$i]['Invoice']['date']));
			}
			$this->__sanitize($due);
			$this->set('Due',$due);
			
			
			$count=count($draft);
			for($i=0;$i<$count;$i++)
			{
				$draft[$i]['Invoice']['date']=date('d-m-Y',strtotime($draft[$i]['Invoice']['date']));
			}
			$this->__sanitize($draft);
			$this->set('Draft',$draft);
			
			
			$count=count($paid);
			for($i=0;$i<$count;$i++)
			{
				$paid[$i]['Invoice']['date']=date('d-m-Y',strtotime($paid[$i]['Invoice']['date']));
			}
			$this->__sanitize($paid);
			$this->set('Paid',$paid);
			
			$currency=explode(',',$setting['Setting']['currency']);
			$this->set('Cur',$currency[0]);
			$this->set('CurS',$currency[1]);
			
			$clients=$this->Invoice->Client->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
			$this->__sanitize($clients);
			$this->set('Clients',$clients);
			
			$this->__sanitize($setting);
			$this->set('Setting',$setting);
		}
		
		
	function edit($id=null){
		$this->Invoice->id=$id;
		if(empty($this->data))
		{
			$invoice=$this->Invoice->read();
			if(empty($invoice))
			{
				$this->Session->setFlash('Cannot Edit. No Such Invoice Present.');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
			$clients=$this->Invoice->Client->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
			$this->__sanitize($clients);
			$this->set('Clients',$clients);
			
			if($invoice['Invoice']['podate']=='0000-00-00')
			$invoice['Invoice']['podate']='';
			$this->__sanitize($invoice);
			
			$this->set('Invoice',$invoice);
			$this->set('Count',count($invoice['InvoiceItem']));
			$setting=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
			$this->__sanitize($setting);
			$this->set('Setting',$setting);
			}
		}
		else{
			if(empty($this->data['Invoice']['id'])){
				$this->Session->setFlash('Cannot Edit. No Such Invoice Present.');
				$this->redirect(array('action'=>'index'));
			}
			else{
				$this->Invoice->id=$this->data['Invoice']['id'];
				
				$this->Invoice->InvoiceItem->deleteAll(array('InvoiceItem.invoice_id'=>$this->Invoice->id));
				if($this->data['discount']['check']=='0') { $this->data['Invoice']['discount']=''; }
				if($this->data['tax1']['check']=='0') { $this->data['Invoice']['tax1']=''; $this->data['Invoice']['tax1name']=''; }
				if($this->data['tax2']['check']=='0') { $this->data['Invoice']['tax2']=''; $this->data['Invoice']['tax2name']=''; }
				if($this->data['shipping']['check']=='0') { $this->data['Invoice']['shipping']=''; }
				
				if($this->Invoice->saveAll($this->data)){
					$this->Session->setFlash('Invoice Edited Successfully');
					$this->redirect(array('action'=>'view',$this->Invoice->id));
				}
				else{
					$this->log('C:Invoices A:edit Could not save the Invoice Fields','dberror');
					$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
				}
			}
		}	
	}
	
	
	function view($id=null){
			if($id==null)
			{
				$this->Session->setFlash('Cannot View. No Such Invoice Present.');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Invoice->id=$id;
				$invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.id'=>$id),'fields'=>array('Invoice.*','Company.*','Client.*')));
				if(empty($invoice)){
					$this->Session->setFlash('Cannot View. No Such Invoice Present.');
					$this->redirect(array('action'=>'index'));
				}
				else
				{
					$setting=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('Setting.company_id'=>$this->Session->read('Auth.User.company_id'))));
					$user=$this->Invoice->Company->User->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id'))));
					
					$timestamp=strtotime($invoice['Invoice']['date']);
					$invoice['Invoice']['due']=date('d-m-Y',strtotime('+'.$invoice['Invoice']['due'].' days',$timestamp));
					$invoice['Invoice']['date']=date('d-m-Y',strtotime($invoice['Invoice']['date']));
					$currency=explode(',',$invoice['Invoice']['currency']);
					$cur=explode('-',$currency[0]);
					$invoice_link='http://xpressinvoice.com/Invoices/viewsingle/'.$invoice['Invoice']['id'];
					
					$setting['EmailFormat']['signature']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['signature']);
							
					$setting['EmailFormat']['invoicehead']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['invoicehead']);

					$setting['EmailFormat']['invoice']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['invoice']);
					
					$setting['EmailFormat']['thankyouhead']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['thankyouhead']);
					
					$setting['EmailFormat']['thankyou']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['thankyou']);
					
					$setting['EmailFormat']['reminderhead']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['reminderhead']);
					
					$setting['EmailFormat']['reminder']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['reminder']);
					
					$setting['EmailFormat']['estimatehead']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['estimatehead']);
					
					$setting['EmailFormat']['estimate']=preg_replace(
							array('/{client_name}/',
								  '/{client_company}/',
								  '/{invoice_id}/',
								  '/{invoice_amount}/',
								  '/{invoice_date}/',
								  '/{invoice_due_date}/',
								  '/{signature}/',
								  '/{name}/',
								  '/{company}/',
								  '/{invoice_link}/'),
							array($invoice['Client']['name'],
								  $invoice['Client']['company'],
								  $invoice['Invoice']['number'],
								  $invoice['Invoice']['amount'].' '.$currency[1],
								  $invoice['Invoice']['date'],
								  $invoice['Invoice']['due'],
								  $setting['EmailFormat']['signature'],
								  $user['User']['name'],
								  $invoice['Company']['name'],
								  $invoice_link),
							$setting['EmailFormat']['estimate']);
										
					if($invoice['Invoice']['podate']=='0000-00-00'||$invoice['Invoice']['podate']==null)
					{
						$invoice['Invoice']['podate']='';
					}
					else
					{
					$invoice['Invoice']['podate']=date('d-m-Y',strtotime($invoice['Invoice']['podate']));
					}
					for($i=0;$i<count($invoice['Payment']);$i++)
					{
						$invoice['Payment'][$i]['date']=date('d-m-Y',strtotime($invoice['Payment'][$i]['date']));
					}
				
					$this->__sanitize($invoice);
					$this->__sanitize($user);
					
					$invoice['Invoice']['notes']=nl2br($invoice['Invoice']['notes']);
					$invoice['Client']['address']=nl2br($invoice['Client']['address']);
					$invoice['Comapny']['address']=nl2br($invoice['Company']['address']);
					
					$i=count($invoice['InvoiceItem']);
					for($j=0;$j<$i;$j++)
							$invoice['InvoiceItem'][$j]['description']=nl2br($invoice['InvoiceItem'][$j]['description']);
					
					$this->__sanitize($setting);
					if(!empty($setting['Setting']['taxids'])) {	
						$taxids=explode(',',$setting['Setting']['taxids']);
						$j='';
						foreach($taxids as $i)
						 {
							$i.='<br/>';
							$j.=$i;
						 }
						$setting['Setting']['taxids']=$j;
					}
					
					$words=$this->__numtowords($invoice['Invoice']['amount'],$currency[1]);
					$words=$cur[1].' '.$words;
					$this->set('InWords',$words);
					$this->set('Invoice',$invoice);	
					$this->set('Setting',$setting);
					$this->set('Cur',$currency[0]);
					$this->set('CurS',$currency[1]);
				}
			}
	}

	function viewsingle($id=null){
			if($id==null)
			{
				$this->Session->setFlash('Cannot View. No Such Invoice Present.');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Invoice->id=$id;
				$invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.id'=>$id),'fields'=>array('Invoice.*','Company.*','Client.*')));
				if(empty($invoice)){
					$this->Session->setFlash('Cannot View. No Such Invoice Present.');
					$this->redirect(array('action'=>'index'));
				}
				else
				{
					$this->layout="single";
					$invoice['Invoice']['date']=date('d-m-Y',strtotime($invoice['Invoice']['date']));
					$invoice['Invoice']['due']=date('d-m-Y',strtotime('+'.$invoice['Invoice']['due'].' days'));
					$setting=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('Setting.company_id'=>$this->Session->read('Auth.User.company_id'))));
					$currency=explode(',',$invoice['Invoice']['currency']);
					$cur=explode('-',$currency[0]);
					if($invoice['Invoice']['podate']=='0000-00-00')
					{
						$invoice['Invoice']['podate']='';
					}
					else
					{
					$invoice['Invoice']['podate']=date('d-m-Y',strtotime($invoice['Invoice']['podate']));
					}
					
					$this->__sanitize(&$invoice);
					$invoice['Invoice']['notes']=nl2br($invoice['Invoice']['notes']);
					$invoice['Client']['address']=nl2br($invoice['Client']['address']);
					$invoice['Comapny']['address']=nl2br($invoice['Company']['address']);
					
					$i=count($invoice['InvoiceItem']);
					for($j=0;$j<$i;$j++)
							$invoice['InvoiceItem'][$j]['description']=nl2br($invoice['InvoiceItem'][$j]['description']);
					
					$this->__sanitize(&$setting);
					if(!empty($setting['Setting']['taxids'])) {	
						$taxids=explode(',',$setting['Setting']['taxids']);
						$j='';
						foreach($taxids as $i)
						 {
							$i.='<br/>';
							$j.=$i;
						 }
						$setting['Setting']['taxids']=$j;
					}
					
					$words=$this->__numtowords($invoice['Invoice']['amount'],$currency[1]);
					$words=$cur[1].' '.$words;
					$this->set('InWords',$words);
					$this->set('Invoice',$invoice);	
					$this->set('Setting',$setting);
					$this->set('Cur',$currency[0]);
					$this->set('CurS',$currency[1]);
				}
			}
	}
	
			function viewpdf($id=null){
			if($id==null)
			{
				$this->Session->setFlash('Cannot View PDF. No Such Invoice Present.');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->Invoice->id=$id;
				$invoice=$this->Invoice->find('first',array('conditions'=>array('Invoice.id'=>$id),'fields'=>array('Invoice.*','Company.*','Client.*')));
				if(empty($invoice)){
					$this->Session->setFlash('Cannot View PDF. No Such Invoice Present.');
					$this->redirect(array('action'=>'index'));
				}			
				else
				{	
						Configure::write('debug',0); 
						$invoice['Invoice']['date']=date('d-m-Y',strtotime($invoice['Invoice']['date']));
						$invoice['Invoice']['due']=date('d-m-Y',strtotime('+'.$invoice['Invoice']['due'].' days'));
						$setting=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('Setting.company_id'=>$this->Session->read('Auth.User.company_id'))));
						$currency=explode(',',$invoice['Invoice']['currency']);
						$cur=explode('-',$currency[0]);
						
						if($invoice['Invoice']['podate']=='0000-00-00' || $invoice['Invoice']['podate']==null)
						{
							$invoice['Invoice']['podate']='';
						}
						else
						{
						$invoice['Invoice']['podate']=date('d-m-Y',strtotime($invoice['Invoice']['podate']));
						}
						
						$this->__sanitize(&$invoice);
						$invoice['Invoice']['notes']=nl2br($invoice['Invoice']['notes']);
						$invoice['Client']['address']=nl2br($invoice['Client']['address']);
						$invoice['Comapny']['address']=nl2br($invoice['Company']['address']);
						
						$i=count($invoice['InvoiceItem']);
						for($j=0;$j<$i;$j++)
								$invoice['InvoiceItem'][$j]['description']=nl2br($invoice['InvoiceItem'][$j]['description']);
						
						$this->__sanitize(&$setting);
						if(!empty($setting['Setting']['taxids'])) {	
							$taxids=explode(',',$setting['Setting']['taxids']);
							$j='';
							foreach($taxids as $i)
							 {
								$i.='<br/>';
								$j.=$i;
							 }
							$setting['Setting']['taxids']=$j;
						}
						
						$words=$this->__numtowords($invoice['Invoice']['amount'],$currency[1]);
						$words=$cur[1].' '.$words;
						$this->set('InWords',$words);
						$this->set('Invoice',$invoice);	
						$this->set('Setting',$setting);
						$this->set('Cur',$currency[0]);
						$this->set('CurS',$currency[1]);
						$this->layout = 'pdf'; //this will use the pdf.ctp layout 
						$this->render();					 
				}
			}
	}
	function add(){
		if (!empty($this->data)) { 
				$this->data['Invoice']['createdBy']=$this->Session->read('Auth.User.id');
				$this->data['Invoice']['lastModifiedBy']=$this->Session->read('Auth.User.id');
				$this->data['Invoice']['company_id']=$this->Session->read('Auth.User.company_id');
				if($this->Invoice->saveAll($this->data))
				{
					$settingid=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('company_id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id','Setting.monnum')));
					$this->Invoice->Company->Setting->id=$settingid['Setting']['id'];
					$c=$settingid['Setting']['monnum'];
					$c++;
					$this->Invoice->Company->Setting->saveField('monnum',$c);
					$this->redirect(array('action'=>'view',$this->Invoice->id));
				}
				else
				{	
					$this->log('C:Invoices A:add Could not save the Invoice Fields','dberror');
					$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
					$this->redirect(array('action'=>'index'));
				}
			}
		else {
			$this->Session->setFlash('Adding Failed');
			$this->redirect(array('action'=>'index'));					
		}
	}
	
	
	function delete($id=null){
		if($id==null)
		{
			$this->Session->setFlash('Cannot Delete. No Such Invoice Present.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Invoice->deleteAll(array('Invoice.id'=>$id));
		$this->Invoice->InvoiceItem->deleteAll(array('InvoiceItem.invoice_id'=>$id));
		$this->Invoice->Payment->deleteAll(array('Payment.invoice_id'=>$id));
		$this->Invoice->Action->deleteAll(array('Action.invoice_id'=>$id));
		$settingid=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('company_id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id','Setting.monnum')));
		$this->Invoice->Company->Setting->id=$settingid['Setting']['id'];
		$c=$settingid['Setting']['monnum'];
		$c--;
		$this->Invoice->Company->Setting->saveField('monnum',$c);
		$this->Session->setFlash('Invoice Deleted Successfully');
		$this->redirect(array('action'=>'index'));
	}
	
	function sendinvoice(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
			$this->__sanitize($this->data);
			$this->Invoice->id=$this->data['invoice'];
			$invoice=$this->Invoice->read();
			if(!$invoice && ($invoice['Invoice']['status']!='Draft' || $invoice['Invoice']['status']!='Estimate')){
				echo '0';
				exit();
			}
			else{
			if($invoice['Client']['email']=='') { $this->Invoice->Client->id= $this->data['clientid']; $this->Invoice->Client->saveField('email',$this->data['email']); $invoice['Client']['email']=$this->data['email'];}
			$this->Email->from  = $invoice['Company']['name'].' <'.$invoice['Company']['email'].'>';
			if($this->data['copycheck']==1) 
				$this->Email->bcc=array($invoice['Company']['email']);
			if($invoice['Client']['company']=='')
			$temp=$invoice['Client']['name'];
			else
			$temp=$invoice['Client']['company'];
			
			$this->Email->to=$temp.' <'.$invoice['Client']['email'].'>';
			$this->Email->subject = $this->data['subject'];
			$this->Email->sendAs = 'both';
			$this->Email->send($this->data['msg']);
			
			$settingid=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('company_id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id','Setting.monnum')));
			$this->Invoice->Company->Setting->id=$settingid['Setting']['id'];
			$this->Invoice->Company->Setting->saveField('lastinnum',$invoice['Invoice']['number']);
			
			$this->Invoice->id=$this->data['invoice'];
			$this->Invoice->saveField('status','Sent');
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();	
			}			
			}}
	}
	
	function sendestimate(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
			$this->__sanitize($this->data);
			$this->Invoice->id=$this->data['invoice'];
			$invoice=$this->Invoice->read();
			if(!$invoice && $invoice['Invoice']['status']!='Draft'){
				echo '0';
				Configure::write('debug', 0);
				$this->autoRender = false;
				exit();
			}
			else{
			if($invoice['Client']['email']=='') { $this->Invoice->Client->id= $this->data['clientid']; $this->Invoice->Client->saveField('email',$this->data['email']); $invoice['Client']['email']=$this->data['email'];}
			$this->Email->from  = $invoice['Company']['name'].' <'.$invoice['Company']['email'].'>';
			if($this->data['copycheck']==1) 
				$this->Email->bcc=array($invoice['Company']['email']);
			if($invoice['Client']['company']=='')
			$temp=$invoice['Client']['name'];
			else
			$temp=$invoice['Client']['company'];
			
			$this->Email->to=$temp.' <'.$invoice['Client']['email'].'>';
			$this->Email->subject = $this->data['subject'];
			$this->Email->sendAs = 'both';
			$this->Email->send($this->data['msg']);
			
			$this->Invoice->id=$this->data['invoice'];
			if(!$this->Invoice->saveField('status','Estimate'))
			{
				$this->redirect(array('action'=>'index'));
			}
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();	
			}			
			}}
	}
	
	function sendreminder(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
			$this->__sanitize($this->data);
			$this->Invoice->id=$this->data['invoice'];
			$invoice=$this->Invoice->read();
			if(!$invoice && $invoice['Invoice']['status']!='Sent'){
				echo '0';
				Configure::write('debug', 0);
				$this->autoRender = false;
				exit();
			}
			else{
			$this->Email->from  = $invoice['Company']['name'].' <'.$invoice['Company']['email'].'>';
			if($invoice['Client']['company']=='')
			$temp=$invoice['Client']['name'];
			else
			$temp=$invoice['Client']['company'];
			
			$this->Email->to=$temp.' <'.$invoice['Client']['email'].'>';
			$this->Email->subject = $this->data['subject'];
			$this->Email->sendAs = 'both';
			$this->Email->send($this->data['msg']);
			
			$this->Invoice->id=$this->data['invoice'];
			if(!$this->Invoice->saveField('remind','1'))
			{
				$this->redirect(array('action'=>'index'));
			}
			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();	
			}			
			}}
	}
	
	function sendthankyou(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
			$this->__sanitize($this->data);
			$this->Invoice->id=$this->data['invoice'];
			$invoice=$this->Invoice->read();
			if(!$invoice && $invoice['Invoice']['status']!='Paid'){
				echo '0';
				Configure::write('debug', 0);
				$this->autoRender = false;
				exit();
			}
			else{
			$this->Email->from  = $invoice['Company']['name'].' <'.$invoice['Company']['email'].'>';
			if($invoice['Client']['company']=='')
			$temp=$invoice['Client']['name'];
			else
			$temp=$invoice['Client']['company'];
			
			$this->Email->to=$temp.' <'.$invoice['Client']['email'].'>';
			$this->Email->subject = $this->data['subject'];
			$this->Email->sendAs = 'both';
			$this->Email->send($this->data['msg']);

			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();	
			}			
			}}
	}
	
	function sendreply(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
			$this->__sanitize($this->data);
			$this->Invoice->id=$this->data['invoice'];
			$invoice=$this->Invoice->read();
			if(!$invoice){
				echo '0';
				Configure::write('debug', 0);
				$this->autoRender = false;
				exit();
			}
			else{
			$this->Email->to  = $invoice['Company']['name'].' <'.$invoice['Company']['email'].'>';
			if($invoice['Client']['company']=='')
			$temp=$invoice['Client']['name'];
			else
			$temp=$invoice['Client']['company'];
			
			$this->Email->from=$temp.' <'.$invoice['Client']['email'].'>';
			$this->Email->subject = $this->data['subject'];
			$this->Email->sendAs = 'both';
			if(!$this->Email->send($this->data['msg'])) { echo '0'; exit(); }

			Configure::write('debug', 0);
			$this->autoRender = false;
			echo '1';
			exit();	
			}			
		  }
		}
	}	

	function __numtowords($num,$cur){
		if($num<=0)
		{
			return "Zero Only";
		}
		else
		{ 
			if(strrchr($num,'.'))
			{
				$esal=explode(".",$num);
				$rupee=$esal[0];
				$paise=$esal[1];
			}
			else
			{
				$rupee=$num;
				$paise=0;
			}
			$res='';
			$flag=0;
  
			  if((strlen($rupee)>=8) && (strlen($rupee)<=9))
			  {
				 $this->__pw(($rupee/10000000),"Crore",$res);
				 $this->__pw((($rupee/100000)%100),"Lakh",$res);
				 $this->__pw((($rupee/1000)%100),"Thousand",$res);
				 $this->__pw((($rupee/100)%10),"Hundred",$res);
				 $this->__pw(($rupee%100),"",$res);
			  }
			  else if((strlen($rupee)>=6) && (strlen($rupee)<=7))
			  {
				 $this-> __pw((($rupee/100000)%100),"Lakh",$res);
				 $this-> __pw((($rupee/1000)%100),"Thousand",$res);
				 $this-> __pw((($rupee/100)%10),"Hundred",$res);
				 $this-> __pw(($rupee%100),"",$res);
			  }
			  else if((strlen($rupee)>=4) && (strlen($rupee)<=5))
			  {
				  $this->__pw((($rupee/1000)%100),"Thousand",$res);
				  $this->__pw((($rupee/100)%10),"Hundred",$res);
				  $this->__pw(($rupee%100),"",$res);
			  }
			  else if(strlen($rupee)<=3)
			  {
				  $this->__pw((($rupee/100)%10),"Hundred",$res);
				  $this->__pw(($rupee%100),"",$res);
			  }
			  else if((strlen($rupee)>=1) && (strlen($rupee)<=2))
			  {
				  $this->__pw(($rupee%100),"",$res);
			  }
			  else
			  {
				return "Ninty Nine Only";
				$flag=1;
			  }
			  if($paise!=0 && $flag==0)
			  {
				$res.=" and ";
				$this->__pw(($paise%100),"",$res);
				if($cur=='INR')
				$res.=" Paise ";
				else
				$res.=" Cent ";
			  }
			  if($flag==0)
			  {
				$res.="Only\n";
			  } 
			return $res;
		}
	}
	
	function __pw($n,$ch,&$res)
	{
		$one=array("","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen");
		$ten=array("","","Twenty","Thirty","Forty","Fifty","Sixty","Seventy","Eighty","Ninety");
		($n>19)?$res.=$ten[$n/10].' '.$one[$n%10]:$res.=$one[$n].' ';
		if($n) $res.=$ch.' ';
	}

}

?>