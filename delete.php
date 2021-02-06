<?php
require 'conn.php';
session_start();

$del = $_GET['del'];

$book = mysqli_query($con, "DELETE FROM message WHERE mid = '$del'");
	if ($book) {
		echo "Message deleted";
	}else{
		echo "Message not deleted";
	}

?>