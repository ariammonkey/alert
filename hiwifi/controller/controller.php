<?php

/**
 * Author: Ma. Lourdes A. Onting
 */

require_once "../config/config.inc.php";
include "../model/model.php";
include "../object/objects.php";


class DashboardController
{
	
	function __construct()
	{
		$this->on_Load();
	}

	private function on_Load(){
		$db = new Connect();
		$conn = $db->dbconnect();
		if(isset($_GET['page'])){
			$action = $_GET['page'];
			switch ($action) {
				case 'getdata': $this->getTrans($conn);
					
					break;
				
				default:
					# code...
					break;
			}
			
		}
}
		private function getTrans($conn){
			$obj = new DashboardObject();
			$model = new DashboardModel();
			$cont= new DashboardController();

			$obj->set_MSN($_POST['intMSN']);
			$obj->set_Start($_POST['dateStart']);
			$obj->set_End($_POST['dateEnd']);
			$msn = $obj->get_MSN();
			$start = $obj->get_Start();
			$end = $obj->get_End();

			//echo $start;
			//$all = $model->get_Transaction($conn, $msn, $start, $end);
			echo 'hi';
			include "../view/main.php";
			//echo "<script>window.location='../view/main.php'</Script>";
		}
	
}

$dashboard = new DashboardController();
?>