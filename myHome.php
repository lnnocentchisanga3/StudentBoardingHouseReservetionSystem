<?php
$session = session_start();
require 'funct.php';

$email = $_SESSION['email'];

if ($email == null) {
	redirectFunct();
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Boarding House Reservetion System</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/msgcss.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<style>
		ul li:hover{
			cursor: pointer;
		}

		#loader {
			  border: 36px solid #f3f3f3;
			  border-radius: 50%;
			  border-top: 16px solid dodgerblue;
			   border-bottom: 16px solid green;
			    border-left: 16px solid red;
			     border-right: 16px solid yellow;
			  width: 100px;
			  height: 100px;
			  margin-left: 30%;
			  -webkit-animation: spin 2s linear infinite; /* Safari */
			  animation: spin 2s linear infinite;
			}
		@-webkit-keyframes spin {
		  0% { -webkit-transform: rotate(0deg); }
		  100% { -webkit-transform: rotate(360deg); }
		}

		.animate-bottom{
			position: relative;
			-webkit-animation-name:
			animatebottom;
			-webkit-animation-duration: 1s;
			animation-name: animatebottom;
			animation-duration: 1s;
		}
		@-webkit-@keyframes animatebottom{
			from{ bottom: -100px; opacity: 0}
			to{bottom: 0px; opacity: 1} 
		}
		@keyframes animatebottom{
			from{ bottom: -100px; opacity: 0}
			to{bottom: 0px; opacity: 1} 
		}
	</style>
</head>
<body >
	<div class="container shadow pb-5">
		<div class="row">
			<div class="col-md-12 container-fluid mt-2">
				<div class="row">
					<div class="col-md-12 py-5">
						<h4 class="text-center text-uppercase">Student Boarding House Reservetion System</h4>
					</div>
					
				</div>
			</div>

		<div class="col-md-12 container-fluid bg-white">
			<div class="row">
				<div class="container">

				<div class="row">
				<div class="col-md-6 text-center">
					<a href="dashboard.php" class="btn btn-primary"><i class="fa fa-arrow-left fa-1x"></i> Go back to Home</a>
				</div>

				<div class="col-md-6 py-2 text-center">
					<span class="ml-3 mt-2 mr-2"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['fullname']; ?></span>
						<span id="notify" onclick="redirectToMessages()"></span>
					<a href="Logout.php?action=out" class="btn btn-danger ml-3 mt-2"><i class="fa fa-sign-out fa-1x"></i> Logout</a>
				</div>

				</div>

				</div>
				
				<h5 class="col-md-12 mt-2 text-center text-uppercase">My boarding house</h5>
				<div class="col-md-12 mt-2">
					
				</div>

					<div class="card mt-2 col-md-12">
						
						<div class="card-header row">
							<div class="col-md-12">
								<p id="msg1234" class="bg-success text-center text-white"></p>
							</div>
						</div>
						 

						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
								<table class="table table-striped table-hover col-md-12 rounded">
								<thead>
									<h5>My boarding houses</h5>
									<tr>
										<th>Hostel Name</th>
										<th><i class="fa fa-photo"></i> Photo</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="posts">
									
								</tbody>
							</table>
								</div>
								<div class="col-md-6">
									<h5>People who Booked Rooms</h5>
									<table class="table table-striped table-hover col-md-12 rounded">
								<thead>
									<tr>
										<th><i class="fa fa-user"></i> Name</th>
										<th><i class="fa fa-envelope"></i> Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="peopleUsers">
									
								</tbody>
							</table>
								</div>
							</div>
						</div>
						<!-- <script>
							
						</script> -->
						
					</div>
				
			</div>
		</div>
		</div>
		
	</div>

	<!-- Massage box -->

<div class="openChat rounded">
<div class="form">
<div class="row">
	<h6 class="col-md-6">Send a message</h6>
	<a href="#!" class="col-md-4 ml-4" onclick="closeForm()"><i class="fa fa-close fa-2x text-danger ml-5"></i></a>
</div>
<i class="fa fa-user-circle fa-1x mr-2"></i><span id="nameTo" class="py-2"></span>
<div class="input-group" style="display: none;">
	 <i class="fa fa-envelope fa-2x mr-2"></i> <input type="text" name="email" id="email" class="form-control">
</div>
<!-- <label for="msg">Message</label> -->
<textarea placeholder="Type message.." name="msg" id="text" required></textarea>
<div class="row">
<button type="submit" name="send_message" class="btn btn-primary col-md-10 ml-4" onclick="sendText()" data-dismiss="modal">Send <i class="fa fa-paper-plane"></i></button>
</div>
</div>
</div>

<!-- End Massage Box -->

<script>
	setInterval(function(){
		loadTableBook();
		loadTablePeople();
	}, 1000);
function redirectToMessages(){
	let user = "<?php echo $_SESSION['email']; ?>";

	window.location.href = "http://localhost/StudentBoardingHouseReservetionSystem/messages.php?email="+user;
}


function CancelBook(close){
	let xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('msg1234').innerHTML = "<span class='py-3'>"+this.responseText+"</span>";
		}
	};
	xhttp.open("POST", "cancelBook.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("close="+close);


	$('#posts').load("peopleUsers.php");


}
</script>

<script>
setInterval(function() {
	$('#msg1234').load('msg1234.txt');
}, 3000);
</script>



	<!--scripts-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php
}
?>
