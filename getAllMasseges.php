<?php
require 'conn.php';
session_start();

if (isset($_GET['queryAll'])) {
	
	$notify = mysqli_query($con, "SELECT * FROM message WHERE to_person = '$_SESSION[email]' OR from_person = '$_SESSION[email]' ORDER BY mid DESC");
	while ($count = mysqli_fetch_array($notify)) {
		$display = mysqli_query($con, "SELECT * FROM users WHERE email = '$count[from_person]'");
		$row = mysqli_fetch_array($display);

		if ($row['email'] == $_SESSION['email']) {
			echo '<i class="fa fa-user-circle"></i> Me <br>';
		}else{
			echo '<i class="fa fa-user-circle"></i> '.$row['fullname'].'<br>';
		}

		$str = substr($count['message'], 0,60);
		echo '<li class="p-2 my-2 bg-secondary text-white col-md-10 rounded" value="'.$count['mid'].'" onclick="displayMessage(this.value)"><span class="ml-4">'.$str.'<span>....</span></span></li>';
	}
	
}
?>