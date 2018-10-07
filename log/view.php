<!DOCTYPE html>
<html>
<head>
	<title>Error Log</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	
		<button type="submit" onclick="errorlog()" >Save Log</button>
	
	<script type="text/javascript">
		function errorlog(){
			alert('clicked');
			var d = new Date();
			var error = d + "Monitoring : Failed [cheverlu]";
			 $.ajax({
      type:"POST",
      data:{error : error}, 
      url: "server.php",
      success: function(data){

      alert('Written in Log File');
    }
    });
		}
	</script>
</body>
</html>