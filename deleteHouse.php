<?php
require 'conn.php';
session_start();
$delHouse = $_GET['delHouse'];

$book = mysqli_query($con, "DELETE FROM house WHERE hid = '$delHouse'");
	if ($book) {
		$bookDel = mysqli_query($con, "DELETE FROM book WHERE owner = '$_SESSION[email]'");
		if ($bookDel) {
			echo "House deleted";
		}else{
			echo "House not deleted";
		}
	}else{
		echo "House not deleted";
	}

?>