<!DOCTYPE html>
<html>
<head>
	<title>Error Log</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	
	<button type="submit" onclick="errorlog()" >Save Log</button>
	<button type="submit" onclick="errorlog2()" >Save Log2</button>
	
	<script type="text/javascript">
		function errorlog(){
			var date = get_Date();
			var error = date + " Monitoring : Failed [cheverlu]\n";
			$.ajax({
				type:"POST",
				data:{error : error}, 
				url: "server.php",
				success: function(data){

					alert('Written in Log File1');
				}
			});
		}

		function errorlog2(){

			var date = get_Date();
			var error2 = date + " Monitoring2 : Failed [cheverlu]\n";
			$.ajax({
				type:"POST",
				data:{error2 : error2}, 
				url: "server.php",
				success: function(data){

					alert('Written in Log File2');
				}
			});
		}
		function left_Pad(str1){
			var newstr = ('0' + str1).slice(-2);
			return newstr;
		}
		function get_Date(){
			var d = new Date();
			var year = d.getFullYear();
			var curmonth = left_Pad(d.getMonth() + 1);
			var curdate = left_Pad(d.getDate());
			var hour = left_Pad(d.getHours());
			var mins = left_Pad(d.getMinutes());
			var sec = left_Pad(d.getSeconds());

			var today = year + '-' + curmonth + '-' + curdate + ' ' + hour + ':' + mins + ':' + sec ;

			return today;
		}
	</script>
</body>
</html>
