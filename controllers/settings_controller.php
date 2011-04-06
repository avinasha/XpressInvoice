<?php
	class SettingsController extends AppController {
			var $name = 'Settings';	
			var $components=array('Session','RequestHandler','Auth');
			var $helpers=array('Html','Form','Javascript','Session','Time','Number');
			var $uses=array('Setting','User');
			
			function index(){
				$setting=$this->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
				$currency=explode(',',$setting['Setting']['currency']);
				$this->__sanitize(&$setting);
				$this->set('Setting',$setting);
				$this->set('CurS',$currency[1]);
				
				$maxin=$this->Setting->Company->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Company.accountType')));
				if($maxin['Company']['accountType']=='Basic') $maxin['Company']['accountType']=3; else $maxin['Company']['accountType']=(int)$maxin['Company']['accountType'];
				$this->set('Maxin',$maxin['Company']['accountType']);
			}
			
			function quicksetup(){
				if(!empty($this->data))
				{
					$this->Setting->id=$this->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id')));
					if($this->Setting->save($this->data)){
						$profile=$this->User->Profile->find('first',array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')),'fields'=>array('Profile.id','Profile.options')));
						$this->User->Profile->id=$profile['Profile']['id'];
						$op=explode(',',$profile['Profile']['options']);
						$options=$op[0].','.$op[1].',1';
						$this->User->Profile->saveField('options',$options);
						$this->redirect(array('controller'=>'Invoices'));	
					}
					else{
						$this->log('C:Settings A:quicksetup Could not save the QuickSetup Fields','dberror');
						$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
						$this->redirect(array('controller'=>'Settings','action'=>'quicksetup'));	
					}
				}
			}
				
			function updateinvoicedefaults(){
					if(!empty($this->data))
					{
						$this->Setting->id=$this->Setting->find('first',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id')));
						if($this->data['discount']['check']=='0') { $this->data['Setting']['discount']=''; }
						if($this->data['tax1']['check']=='0') { $this->data['Setting']['tax1']=''; $this->data['Setting']['tax1name']=''; }
						if($this->data['tax2']['check']=='0') { $this->data['Setting']['tax2']=''; $this->data['Setting']['tax2name']=''; }
						if($this->data['shipping']['check']=='0') { $this->data['Setting']['shipping']=''; }
						if(!$this->Setting->save($this->data,array('fields'=>array('Setting.due','Setting.discount','Setting.tax1','Setting.tax1name','Setting.tax2','Setting.tax2name','Setting.shipping','Setting.notes','Setting.currency'))))
						{
							$this->log('C:Settings A:updateinvoicedefaults Could not save the Default Invoice Fields','dberror');
							$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
							$this->redirect(array('controller'=>'Settings','action'=>'index'));	
						}
						$this->Session->setFlash('Default Invoice Settings Updated');
						$this->redirect(array('controller'=>'Settings','action'=>'index'));					
					}
					else
					{
						$this->Session->setFlash('Default Invoice Settings Could Not Be Updated');
						$this->redirect(array('controller'=>'Settings','action'=>'index'));	
					}
			}	
	}
?>