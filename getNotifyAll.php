<?php
require 'conn.php';
session_start();

if (isset($_GET['query'])) {
	
	$notify = mysqli_query($con, "SELECT * FROM message WHERE to_person = '$_SESSION[email]'");
	$count = mysqli_num_rows($notify);

	echo "<a href='#' class='btn btn-primary'><i class='fa fa-comment fa-1x mr-2'></i>".$count." messages</a>";
}
?>