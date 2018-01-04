<?php
session_start();
error_reporting('E_ALL');
require_once('user.class.php');
if(isset($_POST['Submit']) && $_POST['Submit']=='Login'){
	$data=$USR->login_user();
	if(!empty($data)){
		$_SESSION['user']=$data;
		include_once('profile.php');
	}else{
		header('Location:login.php?le');
	}	
}else if(isset($_POST['Submit']) && $_POST['Submit']=='Register'){
	$data=$USR->create_user();
	if($data>1){
		header('Location:login.php?s');
	}else{
		header('Location:login.php?e');
	}	
}else if(isset($_GET['logout'])){
	session_destroy();
	header('location:login.php');	
}else if(isset($_GET['check_email'])){
	$data=$USR->get_user();
	if(!empty($data)){
		echo "false";
	}else{echo "true";}	
}
else{
	header('location:login.php');
}
?>