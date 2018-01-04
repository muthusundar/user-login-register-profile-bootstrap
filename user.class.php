<?php
require_once('db.class.php');
class User{
	private $db;
	function __construct(){
		//error_reporting('E_ALL');
		$this->db=new DBConnection();
		$this->db=$this->db->getmyDB();
	}
	function get_user(){
		
		try{		
			session_start();
			$sql="SELECT Email FROM user WHERE Email='".$_POST['Email']."'";
			$STH = $this->db->prepare($sql);
			$STH->execute();
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$RST=$STH->FETCH();
			return $RST;
		}catch(PDOExecption $e) { 
			$db->rollback(); 
			print "Error!: " . $e->getMessage() . "</br>"; 
		}
	}
	function create_user(){	
		try{
			if(move_uploaded_file($_FILES['Image']['tmp_name'],"images/".$_FILES['Image']['name'])){
				$_POST['Image']="images/".$_FILES['Image']['name'];
			}
			$sql="INSERT INTO `user` ( `FirstName`, `LastName`, `Email`, `Password`, `Address`, `Image`, `Department`, `HireDate`, `DateofBirth`, `Gender`, `PhoneNo`) VALUES(',".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Email']."','".md5($_POST['Password'])."','".$_POST['Address']."','".$_POST['Image']."','".$_POST['Department']."','".$_POST['HireDate']."','".$_POST['DateofBirth']."','".$_POST['Gender']."','".$_POST['PhoneNo']."')";
			echo $sql;
			$STH = $this->db->prepare($sql);
			$STH->execute();
			return $this->db->lastInsertId();
		}catch(PDOExecption $e) { 
			$db->rollback(); 
			print "Error!: " . $e->getMessage() . "</br>"; 
		} 
	}
	function login_user(){	
		try{
			$sql="SELECT * FROM user WHERE Email='".mysql_escape_string($_POST['Email'])."' AND Password='".mysql_escape_string(md5($_POST['Password']))."'";;
			$STH = $this->db->prepare($sql);
			$STH->execute();
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$RST=$STH->FETCH();
			return $RST;
		}catch(PDOExecption $e) { 
			$db->rollback(); 
			print "Error!: " . $e->getMessage() . "</br>"; 
		} 
	}
} //Class ends
$USR=new User();
?>