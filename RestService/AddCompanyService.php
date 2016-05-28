<?php
/**
 * Auhor : Sayantan
 * Service is used to add new driver ;
 * Status : OK
 */

if ($_SERVER['HTTP_HOST'] == 'localhost:8080'){
	include ("../dbConfig/dbdevdetails.php");
}else{
	include ("../dbConfig/dbproddetails.php");
}

	$companyname = $_POST ['companyname'];
	$companymanager = $_POST ['companymanager'];
	$phonenumber = $_POST ['phonenumber'];
	$companyspoc = $_POST ['companyspoc'];
	$companyaddress = $_POST ['companyaddress'];
	$moredetails = $_POST ['moredetails']; 
	
	// Create connection
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	if (! $conn) {
		die ( 'Could not connect: ' . mysql_error () );
	}	
	$select_query = "INSERT INTO company_details(CompanyName,CompanyManager,PhoneNumber,CompanySpoc,CompanyAddress,MoreDetails) VALUES('$companyname','$companymanager','$phonenumber','$companyspoc','$companyaddress','$moredetails')";
	echo $select_query;
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	mysql_select_db ( $dbname );
	$retval = mysql_query ( $select_query );
	echo $retval;
	if (! $retval) {
		die ( 'Could not get data: ' . mysql_error () );		
	} else {
		$flag = "Data entered successfully";
	}

?>
