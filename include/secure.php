<?php 
session_start();
if(!isset($_SESSION['name'])){
	header("location:login.php");
}
// Store Session Data
 $username= $_SESSION['name'];  // Initializing Session with value of PHP Variable
 $userrole= $_SESSION['role'];  // Initializing Session with value of PHP Variable
 
 
 ?>

