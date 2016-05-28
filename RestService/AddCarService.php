<?php
/**
 * Auhor : Sayantan
 * Service is used to add new car;
 * Status : OK
 */

if ($_SERVER['HTTP_HOST'] == 'localhost:8080'){
	include ("../dbConfig/dbdevdetails.php");
}else{
	include ("../dbConfig/dbproddetails.php");
}

 	$carmodel = $_POST ['carmodel'];
	$registrationnumber = $_POST ['registrationnumber'];
	$purchaseddate = $_POST ['purchaseddate'];
	
	/* $carmodel = "Tata Indica";
	$registrationnumber = "WB26F9878";
	$purchaseddate ="2016-02-12"; */
	echo $carmodel;
	// Create connection
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	if (! $conn) {
		die ( 'Could not connect: ' . mysql_error () );
	}	
	$select_query = "INSERT INTO car_details(CarModel,RegistrationNumber,PurchasedDate) VALUES('$carmodel','$registrationnumber','$purchaseddate')";
//	echo $select_query;
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	mysql_select_db ( $dbname );
	$retval = mysql_query ( $select_query );
//	echo $retval;
	if (! $retval) {
		die ( 'Could not get data: ' . mysql_error () );		
	} else {
		$flag = "Data entered successfully";
	}

?>
