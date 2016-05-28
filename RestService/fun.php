
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
	/* 	echo "Date is ".$date."</br>";
		echo "credit is ".$credit."</br>";
		echo "Debit is ".$debit."</br>"; */
		
		
		/*working*/
	/* 	$marks = array(
				$date => array (
						"credit" =>  $credit,
						"debit" => $debit
						
				)
		);
*/		
	 	$data[] = array (
				'date' =>  $row['date'],
				'particulars' =>  $row['particulars'],
				'debit' =>  $debit,
				'credit' =>  $credit
		); 

		/*$data[] = array($row['date'],$row['particulars'],$debit,$credit);*/
		
	}
	//print_r($data);
	$obj->data = $data;
	echo json_encode($obj); 
	/* $obj = new stdClass();
	$obj->label="Transaction";
	$obj->data = $data;
	echo json_encode($obj); */
}

?>