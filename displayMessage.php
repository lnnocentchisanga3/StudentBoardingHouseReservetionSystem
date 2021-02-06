<?php
require 'conn.php';
session_start();

if (isset($_GET['query'])) {
	
	$id = $_GET['query'];
	$notify = mysqli_query($con, "SELECT * FROM message WHERE mid = '$id'");
	$count = mysqli_fetch_array($notify);

	$display = mysqli_query($con, "SELECT * FROM users WHERE email = '$count[from_person]'");
	$row = mysqli_fetch_array($display);

	echo '<fieldset>';
		echo '<legend><i class="fa fa-user-circle"></i><span id="nameToPerson" value="'.$row['fullname'].'">'.' '.$row['fullname'].'</span><br></legend>';

		echo '<p class="p-2 my-2 bg-secondary text-white col-md-10 rounded" value="'.$count['mid'].'" onclick="displayMessage(this.value)"><span class="ml-4">'.$count['message'].'<span>....</span></span></p>';
	echo '</fieldset>';
	echo '<button class="btn btn-primary" onclick="openForm(this.value)" value="'.$row['email'].'">reply <i class="fa fa-paper-plane"></i></button>';
	echo '<button class="btn btn-danger ml-4" onclick="deleteMsg(this.value)" value="'.$count['mid'].'">Delete <i class="fa fa-trash"></i></button>';
}

?>