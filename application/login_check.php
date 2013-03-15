<?php
require('connection.php');


//create db object
$db = new Connection();

// username and password grabbed

if(isset($_POST['username']) && !empty($_POST['username']) &&
isset($_POST['password']) && !empty($_POST['password'])){

	$username=$_POST['username'];
	$password=$_POST['password'];
	
	//$table = 'membership';
	
	//prepare for query
	$stmt = $db->conn->prepare("SELECT * FROM membership WHERE
	username=:username and password=:password");
		
	$stmt->bindParam(":username", $username , PDO::PARAM_STR);
	$stmt->bindParam(":password", $password , PDO::PARAM_STR);
	
	$stmt->execute();
	
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($stmt->rowCount() > 0){
	
		$_SESSION['username'] = $result['username'];
		//redirect("login_success.php");
		//header("Location:login_success.php");
		
		
	}else {
		
		echo "Wrong Username or Password";
		
	}

}else {

	echo 'Missing Username or Password';

}

