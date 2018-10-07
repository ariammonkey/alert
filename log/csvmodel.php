csv();

function connection(){
	$conn = pg_connect("host=localhost port=5432 dbname=people user=postgres password=1234");
	return $conn;
}
function getC(){
	$conn = connection();
	$sql = "SELECT * FROM client_info";
	$result = pg_query($conn,$sql);
	while ($row = pg_fetch_array($result)) {
		$info['client_id'] = $row['client_id'];
					$info['first_name'] = $row['first_name'];
					$info['middle_name'] = $row['middle_name'];
					$info['last_name'] = $row['last_name'];
					$info['last_name'] = $row['last_name'];
					$info['cli_gender'] = $row['cli_gender'];
					$info['birthdate'] = $row['birthdate'];
					$info['mobile'] = $row['mobile'];
					$info['telephone'] = $row['telephone'];
					$info['email'] = $row['email'];
					$info['address'] = $row['address'];				
					$info['pic'] = $row['pic'];				
					

		$all[] = $info;
	}
	return $all;
}

function getHeaders(){
	$conn = connection();
	$sql = "select column_name from INFORMATION_schema.columns where table_name = 'client_info'";
	$result = pg_query($conn,$sql);
	while ($row = pg_fetch_array($result)) {
		$info = $row[0];
		$all[] = $info;
	}
	return $all;
}
function csv(){

	if(isset($_POST['csvbtn'])){
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename="demo.csv"');

// do not cache the file
		header('Pragma: no-cache');
		header('Expires: 0');

// create a file pointer connected to the output stream
		$file = fopen('php://output', 'w');

// send the column headers
		$headers = getHeaders();
		fputcsv($file, $headers);

// Sample data. This can be fetched from mysql too
		$data = getC();

// output each row of the data
		foreach ($data as $row)
		{
			fputcsv($file, $row);
		}

		exit();
	}
}
