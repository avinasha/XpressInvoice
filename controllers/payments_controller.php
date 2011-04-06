<?php
class PaymentsController extends AppController {
	var $name = 'Payments';
	var $components=array('Session','RequestHandler','Auth','Email');
	var $helpers=array('Html','Form','Javascript','Session');
	
	function add(){
			if(!empty($this->data)){
				if($this->Payment->save($this->data))
				{
					$payments=$this->Payment->find('all',array('conditions'=>array('Payment.invoice_id'=>$this->data['Payment']['invoice_id'])));
					$invoice=$this->Payment->Invoice->find('first',array('conditions'=>array('Invoice.id'=>$this->data['Payment']['invoice_id']),'fields'=>array('Invoice.amount')));
					$total=0;
					foreach($payments as $payment){
						$total+=$payment['Payment']['amount'];
					}
					if($total>$invoice['Invoice']['amount'] || $total==$invoice['Invoice']['amount'])
					{
						$this->Payment->Invoice->id=$this->data['Payment']['invoice_id'];
						$this->Payment->Invoice->saveField('status','Paid');
					}
					else
					{
					$this->Session->setFlash("Your Payment Has Been Added");				
					}
					$this->redirect(array('controller'=>'invoices','action'=>'view',$this->data['Payment']['invoice_id']));
				}
				else
				{
					$this->log('C:Invoices A:edit Could not save the Invoice Fields','dberror');
					$this->Session->setFlash('Something Went Wrong. We Are Looking Into It. Please Try After Some Time. Sorry For The Inconvenience');
					$this->redirect(array('controller'=>'invoices','action'=>'index'));
				}
			}
			else {
				$this->Session->setFlash('Cannot Add Payment');
				$this->redirect(array('controller'=>'invoices','action'=>'index'));
			}	
	}
	
	function delete($id=null,$iid=null){
		if($id==null || $iid==null)
		{
			$this->Session->setFlash('Cannot Delete. No Such Payment Present');
			$this->redirect(array('action'=>'view'));
		}
		$this->Payment->deleteAll(array('Payment.id'=>$id));
		$this->Payment->Invoice->id=$iid;
		$invoice=$this->Payment->Invoice->read();
		/**
		* Find Due Date In Timestamp
		**/
		$str='+'.$invoice['Invoice']['due'].' days';
		$in_date=strtotime($invoice['Invoice']['date']);
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
			$this->Payment->Invoice->saveField('status','Due');
		else
			$this->Payment->Invoice->saveField('status','Sent');
			
		$this->Session->setFlash('Payment Deleted Successfully');
		$this->redirect(array('controller'=>'Invoices','action'=>'view',$iid));
	}
}
?>