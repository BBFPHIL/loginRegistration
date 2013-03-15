<?php
require('connection.php');

//Create new db connection
$db = new Connection();

$password = $_POST['password'];
$email_address = $_POST['email_address'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];

if(isset($_POST['username']) && !empty($_POST['password']) &&
isset($_POST['password']) && !empty($_POST['password']) && 
isset($_POST['email_address']) && !empty($_POST['email_address']) &&
isset($_POST['first_name']) && !empty($_POST['first_name']) &&
isset($_POST['last_name']) && !empty($_POST['last_name']) &&
filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)){


	$username=$_POST['username'];
	$password=$_POST['password'];	
	$username=$_POST['first_name'];
	$username=$_POST['last_name'];
	$username=$_POST['email_address'];
	
	//check if email exists
	
	$stmt = $db->conn->prepare("SELECT * FROM membership WHERE email_address=:email_address");
	
	$stmt->bindParam(":email_address", $email_address , PDO::PARAM_STR);
	
	$stmt->execute();
	
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	
	if($stmt->rowCount() == 0){
	
		
		//prepare for query
		$stmt = $db->conn->prepare("INSERT INTO membership (first_name, last_name, username, password, email_address) VALUES (:first_name, :last_name, :username, :password, :email_address)");
	
		$stmt->bindParam(":first_name", $first_name , PDO::PARAM_STR);
		$stmt->bindParam(":last_name", $last_name , PDO::PARAM_STR);		
		$stmt->bindParam(":username", $username , PDO::PARAM_STR);
		$stmt->bindParam(":password", $password , PDO::PARAM_STR);
		$stmt->bindParam(":email_address", $email_address , PDO::PARAM_STR);
		
		$stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo "Congratulations, you have signed up!";
		
	}else{
		
		echo "Email already exists, please pick a different email";
	
	}
	
}else{

	echo "You are missing a required field";
	
}

	








