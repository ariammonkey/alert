<?php

	class DashboardModel{
		public function get_Transaction($con, $msn, $dateStart,$dateEnd){

			$sql = "SELECT * FROM transaction";
			$result = pg_query($con, $sql);
			$all = array();
			while($row = pg_fetch_array($result)){
				$info['id'] = $row['id'];
				$info['msn'] = $row['msn'];
				$info['trans_date'] = $row['trans_date'];
				$info['name'] = $row['name'];
				$info['country'] = $row['country'];

				$all[] = $info;
				
			}
			return $all;
			
		}
	}
?>