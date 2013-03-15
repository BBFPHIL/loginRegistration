<?php


class Connection {
	
	 private $user = 'root';
	 private $password = 'root';
	 private $host = 'localhost';
	 private $dbname = 'test' ;
	 
	 public $conn;
	

	 public function Connection (){
	
	
		 $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};", $this->user, $this->password);


	}

}

