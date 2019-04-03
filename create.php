<?php
include "../config/config.php";
$db = new Connect();
$conn = $db->dbconnect();

/*$myfile = fopen("../files/exam.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);*/

// open the input and the output
$fp = fopen("../files/examv10.txt","r");
$ans = fopen("../files/answer.txt","r");
$out = fopen("../files/questions.txt","w");
$myfile = fopen("../files/new.txt","w");
$i = 0;
$j = 0;
$alls = array();
$alls2 = array();
$eds = array();


//$arrAns = array();*/
$word = "";
$ans2 ="";
$exp ="";
$ed = "";
$yy = "";
$n =0;
$final = array();
while($rec = fgets($fp)){
	/*if (strpos($rec, 'Answer: ') !== true) {
    	$word = $word."".$rec;
	}
	else{
		//$ans2 = $ans2."".$rec;
		$word = "";
		$i++;
	}*/
	$ed = $ed."".$rec;
	/*if (!preg_match('/\bAnswer: \b/', $rec)) {
    		$word = $word."".$rec;
    		$exp ="";
		}
	if (preg_match('/\bAnswer: \b/', $rec)) {
			//$ans2 = $ans2."".$rec;
    		$alls2[$i] = $rec;
    		$i++;
    		$word = "";
    		$exp ="";
    		$ed = "";
    		
		}
*/

		//if (preg_match('/\bExplanation\b/', $rec)) {
			/*if (!preg_match('/\bNO\b/', $rec) && !preg_match('/\bAnswer: \b/', $rec) && !preg_match('/\b[A-G.]\b/', $rec)) {
    			$exp = $exp."".$rec;
			}*/
			
    		//}
			if (!preg_match('/\bNO.\b/', $rec)) {
    			$exp = $exp."".$rec;
			}
			else{
				$exp = "\n".$rec;
				$n++;
			}
	/*if(){
		$word = $word."".$rec;
	}*/
	$eds[$i] = $ed; 
	$alls[$i] = $word;
	//$exp = $exp."".$rec;
	$ex[$i] = $exp; 
	//$yy = "";

	/*if(strpos($rec, "Explanation") !== false || strpos($rec, "NO.") !== false){
		
		echo $n." eh\n";
	}
	else{
		$yy = $n." ".$yy."\n".$rec;
	}
	$n++;*/
	//echo $alls2[$key]."<br>";
	//echo $ex[$key]."<br>";
	//addQuestion($conn,$value,$arrAns[$key]);
	# code...
	//$final[$n] = $yy;
	$final[$n] = $exp;
	
}

//fwrite($myfile, "\n". $word);

/*$word = "";
while($rec = fgets($fp)){
	if ( Trim ( $rec ) !== '' ){
		$word = $word."".$rec;
	}
	else{
		$word = "";
		$i++;
	}
	$alls[$i] = $word;
}*/
while($an = fgets($ans)){
	
	$arrAns[$j] = $an;
	$j++;
	
	
}
//echo $arrAns[9];
//echo $alls[2];
/*foreach ($alls as $value) {
	addQuestion($conn,$value);
}*/
//var_dump($alls);

foreach ($final as $key => $value) {
	if(strpos($value, "Answer:") !== false){
		$newStr = explode("Answer:", $value);
	//	echo "Q: ".$newStr[0]."<br>";
		if(strpos($newStr[1], "Explanation") !== false){
			$newStr2 = explode("Explanation", $newStr[1]);
			//	echo "Answer: ".$newStr2[0]."<br>";
			//	echo " Exp: ".$newStr2[1]."<br>";
			addQuestion2($conn,$newStr[0],$newStr2[0],$newStr2[1]);
		}

		else{
			addQuestion2($conn,$newStr[0],$newStr[1],null);
			//echo "Answer: ".$newStr[1]."<br>";
		}
		//echo "Q: ".$newStr[0]."<br>Answer: ".$newStr[1]."<br>";

	}
	//fwrite($myfile, "\n". $value);
	//echo $value."<br>";
	
}

//var_dump($final);
fclose($fp);
fclose($out);
fclose($ans);
fclose($myfile);

function addQuestion($conn,$question,$ans){
	$query = "INSERT INTO questionnaire (question,answer) VALUES('$question','$ans')";
	if (pg_query($conn, $query)) {} 
		else {echo "Error: <br>";}
}

function addQuestion2($conn,$question,$ans,$exp){
	$query = "INSERT INTO questions (question,answer,explanation) VALUES('$question','$ans','$exp')";
	if (pg_query($conn, $query)) {} 
		else {echo "Error: <br>";}
}

function addUsers($conn){
	$query = "INSERT INTO users (id,username,password) VALUES('1001','lobster','lobster1')";
	if (pg_query($conn, $query)) {} 
		else {echo "Error: <br>";}
}

function get_questions($conn){

	$sql = 'SELECT * FROM questionnaire';
	$result = pg_query($conn, $sql);
	$all = array();
	while($row = pg_fetch_array($result)){
		$info['item_id'] = $row['item_id'];
		$info['question'] = $row['question'];
		$info['answer'] = $row['answer'];

		$all[] = $info;

	}
	return $all;

}
//$all = get_questions($conn);

		//print_r($all);
		// addUsers($conn);
	//addQuestion($conn);
	//get_questions($conn)
		?>