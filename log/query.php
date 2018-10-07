<?php
$msn = '';
$start = '';
$end = '';

function query_factory($msn,$start, $end){
	$sql = "SELECT * FROM transaction";
	$sql = "SELECT * FROM transaction where msn = '$msn'";
	if($msn != '*'){
		$msn = " where msn = '$msn'";
	}
	if($start != '*'){


	}
}
?>	