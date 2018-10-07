 <?php
 $myFile = "error.log"; 
  $fh = fopen($myFile, 'w') or die("can't open file");
  $stringData =$_POST['error'] ;
  fwrite($fh, $stringData);
  fclose($fh);
  ?>