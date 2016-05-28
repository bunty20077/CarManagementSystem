<?php
/**
 * Auhor : Sayantan
 * Service is used to fetch total distance run by car;
 * Status : OK
 */
if ($_SERVER['HTTP_HOST'] == 'localhost:8080'){
	include ("../dbConfig/dbdevdetails.php");
}else{
	include ("../dbConfig/dbproddetails.php");
}

	$carmodel = $_POST ['carmodel'];

	// Create connection
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	if (! $conn) {
		die ( 'Could not connect: ' . mysql_error () );
	}	
	$select_query = "SELECT * FROM distance_details";
	//echo $insert_query;
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	mysql_select_db ( $dbname );
	$retval = mysql_query ( $select_query );
	
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
		
		echo $row['Distance'];
	}
	echo "Fetched data successfully\n";
?>
