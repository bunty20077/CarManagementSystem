
<?php
if ($_SERVER ['HTTP_HOST'] == 'localhost:8080') {
	include ("../dbConfig/dbdevdetails.php");
} else {
	include ("../dbConfig/dbproddetails.php");
}
$data=array();
$obj = new stdClass();
$obj->label="Transaction";
// Create connection
$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
if (! $conn) {
	die ( 'Could not connect: ' . mysql_error () );
}
mysql_select_db ( $dbname );
$select_query = "select * FROM transactions order by date";
$select_query_credit = "select sum(amount) from transactions where category = 1";
$select_query_debit = "select sum(amount) from transactions where category = 2";
$totaldebit = mysql_query ( $select_query_debit );
$totalcredit = mysql_query ( $select_query_credit );

while ( $row = mysql_fetch_array ( $totalcredit, MYSQL_ASSOC ) ) {
	
	$credit = $row ['sum(amount)'];
}

while ( $row = mysql_fetch_array ( $totaldebit, MYSQL_ASSOC ) ) {
	
	$debit = $row ['sum(amount)'];
}
$balance = $credit - $debit;

echo json_encode($balance);

?>