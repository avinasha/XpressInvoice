<?php
class ClientsController extends AppController {

	var $name = 'Clients';
	var $helpers=array('Html','Form','Javascript','Session','Time','Number');
	var $components=array('RequestHandler','Session','Auth');
	var $uses=array('Client','Invoice');
	
	function add(){
		if ($this->RequestHandler->isAjax()) {
			if(!empty($this->data)){
				$this->Client->set('company_id',$this->Session->read('Auth.User.company_id'));
			if ($this->Client->save($this->data)) {
				echo '<option value="'.$this->Client->id.'" selected="selected">';
				if(!empty($this->data['Client']['company']))
				echo $this->data['Client']['company'];
				else
				echo $this->data['Client']['name'];
				echo '</option>';
				}
				else
				{
				echo '0';
				}
			Configure::write('debug', 0);
			$this->autoRender = false;
			exit();			
			}}
		else{
			if(!empty($this->data)){
				$this->Client->set('company_id',$this->Session->read('Auth.User.company_id'));
				if ($this->Client->save($this->data)) {
					$this->Session->setFlash('Client Added Successfully');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
	}
	
	function index(){
		$s=$this->Client->find('all',array('conditions'=>array('Company.id'=>$this->Session->read('Auth.User.company_id'))));
		$this->__sanitize(&$s);
		$count=count($s);
		for($i=0; $i<$count;$i++)
		$s[$i]['Client']['address']=nl2br($s[$i]['Client']['address']);
		$this->set('Clients',$s);
	}
	
	function edit($id=null){
		$this->Client->id=$id;
		if(empty($this->data))
		{
			$client=$this->Client->read();
			if(empty($client))
			{
				$this->Session->setFlash('Cannot Edit. No Such Client Present.');
				$this->redirect(array('action'=>'index'));
			}
			else
			{
				$this->set('Client',$client);
			}	
		}
		else{
			if(empty($this->data['Client']['id'])){
				$this->Session->setFlash('Cannot Edit. No Such Client Present.');
				$this->redirect(array('action'=>'index'));
			}
			else{
				$this->Client->id=$this->data['Client']['id'];
				if($this->Client->saveAll($this->data)){
					$this->Session->setFlash('Client Edited Successfully');
					$this->redirect(array('action'=>'index'));
				}
				else{
					$this->log('C:Clients A:edit Could not save the Clients Fields','dberror');
					$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
					$this->redirect(array('action'=>'index'));
				}
			}
		}	
	}
	
	function delete($id=null){
		if($id==null)
		{
			$this->Session->setFlash('Cannot Delete. No Such Client Present.');
			$this->redirect(array('action'=>'index'));
		}
		$this->Client->deleteAll(array('Client.id'=>$id));
		$invoices=$this->Invoice->find('all',array('conditions'=>array('Invoice.client_id'=>$id)));
		foreach($invoices as $d)
		{
			$iid=$d['Invoice']['id'];
			$this->Invoice->deleteAll(array('Invoice.id'=>$iid));
			$this->Invoice->InvoiceItem->deleteAll(array('InvoiceItem.invoice_id'=>$iid));
			$this->Invoice->Payment->deleteAll(array('Payment.invoice_id'=>$iid));
			$this->Invoice->Action->deleteAll(array('Action.invoice_id'=>$iid));
			$settingid=$this->Invoice->Company->Setting->find('first',array('conditions'=>array('company_id'=>$this->Session->read('Auth.User.company_id')),'fields'=>array('Setting.id','Setting.monnum')));
			$this->Invoice->Company->Setting->id=$settingid['Setting']['id'];
			$c=$settingid['Setting']['monnum'];
			$c--;
			$this->Invoice->Company->Setting->saveField('monnum',$c);
		}
		$this->Session->setFlash('Client Deleted Successfully');
		$this->redirect(array('action'=>'index'));
	}
}
?>
