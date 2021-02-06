<?php
require 'conn.php';
session_start();

if (isset($_GET['query'])) {
	
	$notify = mysqli_query($con, "SELECT * FROM message WHERE to_person = '$_SESSION[email]'");
	$count = mysqli_num_rows($notify);

	echo "<a href='#' class='text-primary'><i class='fa fa-comment fa-2x'></i>".$count."</a>";
}
?>