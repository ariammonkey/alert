<?php

/**
 * 
 */
class DashboardObject
{
	private $intMSN;
	private $dateStart;
	private $dateEnd;

	public function set_MSN($intMSN){
		$this->intMSN = $intMSN;
	}
	public function get_MSN(){
		return $this->intMSN;
	}

	public function set_Start($dateStart){
		$this->dateStart = $dateStart;
	}

	public function get_Start(){
		return $this->dateStart;
	}

	public function set_End($dateEnd){
		$this->dateEnd = $dateEnd;
	}

	public function get_End(){
		return $this->dateEnd;
	}
}
?>