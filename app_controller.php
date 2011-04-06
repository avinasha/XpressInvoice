<?php 
App::import('Sanitize');
	class AppController extends Controller{
		function __sanitize(&$array)
		{
			$dos=array('company','email','address','phno','name','price','quantity','description','type','amount','date','due','discount','tax1name','tax1','tax2name','tax2','shipping','currency','notes','taxids','timezone','number','podate','dc','amount','total');
			$count=count($array);
			$keys=array_keys($array);
			for($i=0;$i<$count;$i++)
			{
				if(is_array($array[$keys[$i]])) $this->__sanitize(&$array[$keys[$i]]);
				else {
					if(in_array($keys[$i],$dos)) $array[$keys[$i]]=Sanitize::html($array[$keys[$i]]);
					}
			}
		}
	}
?>