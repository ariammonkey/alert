<?php
include "../config/config.php";
$db = new Connect();
$conn = $db->dbconnect();
/*function countItems($conn){
	$sql = "SELECT COUNT(*) FROM questionnaire";
	$result = pg_query($conn, $sql);
	$row = pg_fetch_array($result);
	return $row;
}*/
function countItems($conn){
	$sql = "SELECT COUNT(*) FROM questions";
	$result = pg_query($conn, $sql);
	$row = pg_fetch_array($result);
	return $row;
}
function get_questions($conn, $number){
	$sql = "SELECT * FROM questions WHERE item_id = $number" ;
	$result = pg_query($conn, $sql);
	$all = array();
	while($row = pg_fetch_array($result)){
		$info['item_id'] = $row['item_id'];
		$info['question'] = $row['question'];
		$info['answer'] = $row['answer'];
		$info['explanation'] = $row['explanation'];

		$all[] = $info;
	}
	return $all;
}
/*function get_questions($conn, $number){
	$sql = "SELECT * FROM questionnaire WHERE item_id = $number" ;
	$result = pg_query($conn, $sql);
	$all = array();
	while($row = pg_fetch_array($result)){
		$info['item_id'] = $row['item_id'];
		$info['question'] = $row['question'];
		$info['answer'] = $row['answer'];

		$all[] = $info;
	}
	return $all;
}*/

$itemCount = countItems($conn);
$number = (rand(1, $itemCount[0]));
$question = get_questions($conn, $number);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link rel="icon" href="../images/hacker.ico">
</head>
<body>
	<div class="container-fluid">
		<div class="col-s-12">
			<div class="top-navbar ">
			
			</div>
			<div class="left-navbar ">
				
			</div>
			<div class="main ">
				<div class="questionbox">
					<form method="post" action="controller.php?page=home">
						<?php
						echo'
						<textarea cols="5" rows="8" name="quest" class="quest" readonly>';
						echo trim($question[0]['question']);
						echo"</textarea>
						<label id='anslabel' for='correct'>Answer: ".$question[0]['answer']."</label>
						<label id='realAns' type='hidden' value='".$question[0]['answer']."'>
						<!--<input id='expl' type='text' value='".$question[0]['explanation']."'>-->
						<textarea id='expl' rows='3' cols='8' class='quest' readonly>".$question[0]['explanation']."</textarea>

						<input type='text' id='answer' name='answer'>";
						?>
						<div class="buttonbox">
							<button type="button" onclick="submitAns();">Submit Answer</button>
							<button type="button" onclick="showAns();">Show Answer</button>
							<button type="submit">Next Quetion</button>
						</div>				
					</form>
				</div>
			</div>	
		</div>		
	</div>
	<script type="text/javascript">
		
		function submitAns(){
			var str_myAns = document.getElementById('answer').value.toUpperCase();
			var str_ans = document.getElementById('realAns').value.toUpperCase();
			
			if(str_ans.match(str_myAns)){
				alert("Good");
			}
			else alert("No");
			//alert(str_ans);
		}
		function showAns(){
			var explanation = document.getElementById("expl").value;
			if (explanation) {
				document.getElementById("expl").style.display = 'block';
			}
			document.getElementById("anslabel").style.visibility = "visible";
		//	if (true) {}
		//	document.getElementById("expl").style.display = 'block';
		}
	</script>
</body>
</html>
