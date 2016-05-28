<?php
try {		
	if ($_SERVER['HTTP_HOST'] == 'localhost'){
		include ("../dbConfig/dbdevdetails.php");
	}else{
		include ("../dbConfig/dbproddetails.php");
	}
	$conn = mysql_connect ( $servername, $dbusername, $dbpassword );
	session_start();
	$username = $_POST['username'];
	$password =$_POST['password'];
	$encryptedpwd = md5($password);
	$query = "SELECT * FROM user_credentials WHERE username = '".$username."' and password ='".$encryptedpwd."'";
	mysql_select_db ( $dbname );
	$count = mysql_query ( $query );
	if($count != 0){
		$_SESSION['username'] = $username;		header("location:index.htm");
	}else {
		echo "Wrong Username or Password";
	}	
} catch (Exception $e) {	
	echo 'Catch Message: ' .$e->getMessage();
}
?>
