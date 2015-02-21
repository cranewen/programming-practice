<?php

class Employee{
	public $name;
	public $punchInTime;
	public $punchOutTime;
	public $punchStatus;
	public function __construct($name){
		$this->name = $name;
	}
	
	public function punchIn(){
		if(isset($_POST['punchin'])){
		$punchInTime = date('Y-m-d H:i:s');
		$this->punchInTime = $punchInTime;
		echo $this->name," has punched in at ",$this->punchInTime;
		}
		return $this->punchInTime;
	}
	
	public function punchOut(){
		if(isset($_POST['punchout'])){
		$punchOutTime = date('Y-m-d H:i:s');
		$this->punchOutTime = $punchOutTime;
		echo $this->name," has punched out at ",$this->punchOutTime;
		}
		return $this->punchOutTime;
	}
	
	public function checkPunchInStatus(){
		if($punchStatus==1){
			return true;
		}
		if($punchStatus==0){
			return false;
		}
	}
	
}
?>