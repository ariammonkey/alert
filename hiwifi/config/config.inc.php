<?php
	/**
	 * 
	 */
	class Connect
	{
		
		public function dbconnect(){
			$conn =	pg_connect("host=localhost port=5432 dbname=wifi user=postgres password=1234");
				if (!$conn) {
					echo "error";
				}
				else{
					return $conn;
				}
		}
	}
	
?>