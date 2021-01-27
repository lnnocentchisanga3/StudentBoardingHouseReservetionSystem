<?php
 
 require "connect.php";

if (isset($_POST['send'])) {
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$password = $_POST['password'];


	$sql = "INSERT INTO users(email,phone,address,password) VALUES('$email','$phone','$address','$password')";
	$result = mysqli_query($con, $sql);

	if ($result) {
		header("location: index.php");
	}else{
		header("location: index.php");
	}
}

?>