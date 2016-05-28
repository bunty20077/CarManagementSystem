
<?php
if ($_SERVER ['HTTP_HOST'] == 'localhost:8080') {
	include ("../dbConfig/dbdevdetails.php");
} else {
	include ("../dbConfig/dbproddetails.php");
}
$data=array();
$obj = new stdClass();

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
	
	$totcredit = $row ['sum(amount)'];
}

while ( $row = mysql_fetch_array ( $totaldebit, MYSQL_ASSOC ) ) {
	
	$totdebit = $row ['sum(amount)'];
}
$balance = $totcredit - $totdebit;

$result = mysql_query ( $select_query );
if (! $result) {
	die ( 'Could not get data: ' . mysql_error () );
} else {
	while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
		$credit;
		$debit;
		$date = $row ["date"];
		$category = $row ["category"];
		$particulars = $row ["particulars"];
		 if ($category == '1') {
			$credit = $row ["amount"];
			$debit = "";
		} elseif ($category == '2') {
			$debit = $row ["amount"];
			$credit = "";
		} else {
		} 
		
	 	$data[] = array (
				'date' =>  $row['date'],
				'particulars' =>  $row['particulars'],
				'debit' =>  $debit,
				'credit' =>  $credit
		); 		
	}
	$obj->label="Transaction";
	$obj->balance=$balance;
	$obj->totcredit=$totcredit;
	$obj->totdebit=$totdebit;
	$obj->data = $data;
	echo json_encode($obj); 
}

?>