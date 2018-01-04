<?php
class DBConnection {
		private $host='localhost'; 
		private $dbname='pdo';
		private $user='root';
		private $pass='';
		private $DBH='';
	function __construct(){
		try {  
		  $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);  
		  $this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
		}
		catch(PDOException $e) {  

		 echo 'ERROR: ' . $e->getMessage();
		}   

	}//function ends
	 public function getmyDB(){
        if ($this->DBH instanceof PDO){
            return $this->DBH;
		}
	}
}// class ends
?>