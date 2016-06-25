
<?php
if ($_SERVER ['HTTP_HOST'] == 'localhost:8080') {
	include ("../dbConfig/dbdevdetails.php");
} else {
	include ("../dbConfig/dbproddetails.php");
}

// Create connection
$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
if (! $conn) {
	die ( 'Could not connect: ' . mysql_error () );
}
mysql_select_db ( $dbname );
$select_query = "select * from notify_details";

$result = mysql_query ( $select_query );
if (! $result) {
	die ( 'Could not get data: ' . mysql_error () );
}else{
	while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
	
		$notify_summary = $row ['notify_summary'];
		//$notify_burge_date = $row['notify_burge_date'];
		//$today = getdate();
		//print_r($today);
		echo json_encode($notify_summary);
	}
	
}
?>
