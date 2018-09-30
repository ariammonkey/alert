<?php
	/*$date = '20180927045700';
	$d = date_create($date);
	$ndate = date_format($d, "Y-m-d-h-i-s");
	echo "$ndate";*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>HSE-WIFI</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link rel="icon" href="../images/wifi.ico">
</head>
<body>
	<div class="main">
		<div class="col-5 body center">
			<div class="mainheader">

			</div>
			<div class="mainbody">
				

				<form action="../controller/controller.php?page=getdata" method="post">
					<div class="">
						<label>MSN</label>
						<input type="text" name="intMSN">
					</div>
					<div class="">
						<label>Start Date</label>
						<input type="text" name="dateStart">
					</div>
					<div class="">
						<label>End Date</label>
						<input type="text" name="dateEnd">
					</div>
					
					<button type="submit" class="">Export to CSV</button>
				</form>
				<table>
					<tr>
						<th>id</th>
						<th>msn</th>
						<th>date</th>
					</tr>
					<tr>
						<?php

						//$cont = new DashboardController();

						//if(isset($all)){
							foreach ($cont::$all as $a) {
						?>
						<tr>
						<td><?php $a['id'] ?></td>	
						<td><?php $a['msn'] ?></td>	
						<td><?php $a['trans_date'] ?></td>	
						</tr>
					<?php		}
						//}?>
					</tr>
				</table>
			</div>
			<div class="mainfooter">

			</div>
		</div>	
	</div>
</body>
</html>