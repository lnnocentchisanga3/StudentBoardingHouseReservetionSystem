<?php
require 'conn.php';
session_start();

	
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	$sender = $_SESSION['email'];

	if (empty($email) || empty($msg)) {
		echo "Feilds are empty";
	}else{
	$send = mysqli_query($con, "INSERT INTO message(from_person,to_person,message) VALUES('$sender','$email','$msg')");
	if ($send){
	 	echo "Message is sent";
	 }else{
	 	echo "Message is not sent";
	 }
	}


?>