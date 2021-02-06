<?php
require 'conn.php';
session_start();



if (isset($_GET['email'])) {
	$email = $_GET['email'];

	$details = mysqli_query($con, "SELECT * FROM house WHERE `hid` = '$email'");
	if (!$details) {
		echo "<ul class='nav'>";
		echo "<li class='text-center py-3 text-dark'>There nothing on this one </li>";
		echo "</ul>";
	}else{
		$row = mysqli_fetch_array($details);
			echo '<div class="container-fluid py-1">
	<div class="row">
		<div class="col-md-6 [py-2">
			<img src="./photos/'.$row['photo1'].'" class="img-responsive" width="100%">
		</div>
		<div class="col-md-6 py-2">
			<ul class="navbar-nav">
				<li class="nav-item py-2"><h5>Boarding House Name</h5> '.$row['house_name'].'</li>
				<li class="nav-item py-2"><h5>LandLord </h5>'.$row['owner'].'</li>
				<li class="nav-item py-2">
				<fieldset>
				<legend>Description</legend>
				'.$row['description'].'
				</fieldset>
				</li>
			</ul>
		</div>
		<div class="col-md-12 row py-3">
		<h5 class="text-center col-md-12">More photos</h5>
			<div class="col-md-4">
				<img src="./photos/'.$row['photo1'].'" class="img-responsive" width="100%" height="200">
			</div>

			<div class="col-md-4">
				<img src="./photos/'.$row['photo2'].'" class="img-responsive" width="100%" height="200">
			</div>

			<div class="col-md-4">
				<img src="./photos/'.$row['photo3'].'" class="img-responsive" width="100%" height="200">
			</div>
		</div>
	</div>
</div>';
	}


}

?>

