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
		$info = $row;
		$all[] = $info;
	}
	return $all;
}
function csv(){

	if(isset($_POST['csvbtn'])){
		header('Content-Type: text/csv; charset=utf-8');
//header('Content-Disposition: attachment; filename="demo.csv"');
		
// do not cache the file
		header('Pragma: no-cache');
		header('Expires: 0');
		
// create a file pointer connected to the output stream
		$file = fopen('php://output', 'w');
		
// send the column headers
		fputcsv($file, array('Column 1', 'Column 2', 'Column 3', 'Column 4', 'Column 5'));
		
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
