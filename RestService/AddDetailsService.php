<?php

if ($_SERVER['HTTP_HOST'] == 'localhost:8080'){
	include ("../dbConfig/dbdevdetails.php");
}else{
	include ("../dbConfig/dbproddetails.php");
}

	$date = $_POST ['date'];
	$category = $_POST ['category'];
	$amount = $_POST ['amount'];
	$particulars = $_POST ['particulars'];
	
	// Create connection
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	if (! $conn) {
		die ( 'Could not connect: ' . mysql_error () );
	}
	
	$select_query = "INSERT INTO transactions(date,category,amount,particulars) VALUES('$date','$category','$amount','$particulars')";
	
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	mysql_select_db ( $dbname );
	echo ($select_query);
	$retval = mysql_query ( $select_query );
	if (! $retval) {
		die ( 'Could not get data: ' . mysql_error () );
		
	} else {
			
		$flag = "Data entered successfully";
	}

?>
