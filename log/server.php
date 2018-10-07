 <?php
/* if(isset($_POST['error'])){
 	$err1 = $_POST['error'];
 }
 if(is)*/
 function logs(){
 	if(isset($_POST['error'])){
 		$myFile = "error.log"; 
  $fh = fopen($myFile, 'a') or die("can't open file");
  $stringData =$_POST['error'] ;
  fwrite($fh, $stringData);
  fclose($fh);
 	}
 	
 }
 
 function getErrors(){
 	if(isset($_POST['error2'])){
 		$myFile = "error2.log"; 
  $fh = fopen($myFile, 'a') or die("can't open file");
  $stringData =$_POST['error2'] ;
  fwrite($fh, $stringData);
  fclose($fh);
 	}
 }
 logs();
 getErrors();
  ?>