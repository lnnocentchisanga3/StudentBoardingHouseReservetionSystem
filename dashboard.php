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
</head>
<body onload="loadTable()">
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
					<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-1x"></i> Post your boarding house</a>

					<a href="myHome.php?email=<?php echo $_SESSION['email']?>" class="btn btn-success"><i class="fa fa-home fa-1x"></i> My boarding house</a>
				</div>

				<div class="col-md-6 py-2 text-center">
					<span class="ml-3 mt-2 mr-2"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['fullname']; ?></span>
						<span id="notify" onclick="redirectToMessages()"></span>
					<a href="Logout.php?action=out" class="btn btn-danger ml-3 mt-2"><i class="fa fa-sign-out fa-1x"></i> Logout</a>
				</div>

				</div>

				</div>
				
				<h5 class="col-md-12 mt-2 text-center text-uppercase">Look for Boarding houses from the list below</h5>
				<div class="col-md-12 mt-2">
					
				</div>

					<div class="card mt-2 col-md-12">
						
						<div class="card-header row">
							<div class="col-md-6">
								<p id="msg123" class="bg-danger text-center text-white"></p>
								<p id="msg1234" class="bg-success text-center text-white"></p>
							</div>
								<form class="col-md-6">
								<div class="input-group">
								<input type="text" name="search" id="search" placeholder="Search By Boarding House name or By Owner name" class="form-control" onkeyup="searchHouse(this.value)">
								<!-- <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button> -->
								</div>
								</form>
						</div>
						 

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover col-md-12 rounded">
								<thead>
									<tr>
										<th>Hostel Name</th>
										<th><i class="fa fa-photo"></i> Photo</th>
										<th>Status</th>
										<th> Onwer</th>
										<th>Massage</th>
										<th>Details</th>
										<th>Book</th>
									</tr>
								</thead>
								<tbody id="posts">
									
								</tbody>
							</table>
							</div>
						</div>
						<!-- <script>
							
						</script> -->
						
					</div>
				
			</div>
		</div>
		</div>
		
	</div>

	<!-- Add boarding house modal -->

	 <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg rounded-0">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Post a boarding house</h4>
          <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form method="POST" action="#!" class="bg-white col-md-12" enctype="multipart/form-data">
				<label class="mt-1">Boarding House Name</label><br>
				<input type="text" name="bhname" class="form-control" placeholder="Boarding House Name">
				<label class="mt-1">Rooms Available</label><br>
				<input type="number" name="capacity" class="form-control" placeholder="Rooms Available">
				<br>
	            <label>Picture 1</label><br>
	            <input type="file" name="photo" class="form-control" placeholder="Picture 1"><br>
	             <label>Picture 2</label><br>
	            <input type="file" name="photo1" class="form-control" placeholder="Picture 2"><br>
	             <label>Picture 3</label><br>
	            <input type="file" name="photo2" class="form-control" placeholder="Picture 3"><br>
				<label>Description</label><br>
				<textarea class="form-control"  rows="4" name="desc">
					
				</textarea>
				<br>
				<input type="submit" name="post" value="Post" class="btn btn-primary my-3 px-5">
			</form>

        </div>
      </div>
    </div>
  </div>

  

	<!-- End of add boarding house modal --> 


<!-- Details house modal -->

	 <!-- The Modal -->
  <div class="modal fade" id="houseDetails">
    <div class="modal-dialog modal-lg rounded-0">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Boarding house Details</h4>
          <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<p class="py-5" id="bhDetails"></p>
        </div>
      </div>
    </div>
  </div>

<button class="btn btn-white" data-toggle="modal" data-target="#bookedRoom" id="booked"></button>
	<!-- End of Booked boarding house modal --> 

	 <!-- The Modal -->
  <div class="modal fade" id="bookedRoom">
    <div class="modal-dialog modal-lg rounded-0">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Boarding house Details</h4>
          <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<p class="py-5" id="bhDetails"></p>
        </div>
      </div>
    </div>
  </div>

	<!-- End of add boarding house modal -->



	<!-- Massage box -->

<div class="openChat rounded">
<div class="form">
<div class="row">
	<h6 class="col-md-6">Send a message</h6>
	<a href="#!" class="col-md-4 ml-4" onclick="closeForm()"><i class="fa fa-close fa-2x text-danger ml-5"></i></a>
</div>
<!-- <i class="fa fa-user-circle fa-1x mr-4"></i>To : <span id="nameTo" class="py-2">hello</span> -->
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
	showNotify();
	$('#posts').load("posts.php");
}, 3000);

setInterval(function() {
	$('#msg123').load('msg123.txt');
}, 10000);


function reserveSpace(space){
	let xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('msg123').innerHTML = "<span class='py-3'>"+this.responseText+"</span>";
		}
	};
	xhttp.open("POST", "book.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("house="+space);


	$('#posts').load("posts.php");


}

function Cancel(close){
	let xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('msg123').innerHTML = "<span class='py-3'>"+this.responseText+"</span>";
		}
	};
	xhttp.open("POST", "cancel.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("close="+close);


	$('#posts').load("posts.php");


}

function redirectToMessages(){
	let user = "<?php echo $_SESSION['email']; ?>";

	window.location.href = "http://localhost/StudentBoardingHouseReservetionSystem/messages.php?email="+user;
}
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

<?php
  require 'conn.php';
if (isset($_POST['post'])) {

	$name = $_POST['bhname'];
	$capacity= $_POST['capacity'];
	$owner = $_SESSION['email'];
	$photo = $_FILES['photo']['name'];
	$photo1 = $_FILES['photo1']['name'];
	$photo2 = $_FILES['photo2']['name'];
	$desc = $_POST['desc'];


	$post = mysqli_query($con, "INSERT INTO house(owner,house_name,description,photo1,photo2,photo3,capacity) VALUES('$owner','$name','$desc','$photo','$photo1','$photo2','$capacity')");

	if ($post) {
		move_uploaded_file($_FILES['photo']['tmp_name'], "./photos/$photo");
		move_uploaded_file($_FILES['photo1']['tmp_name'], "./photos/$photo1");
		move_uploaded_file($_FILES['photo2']['tmp_name'], "./photos/$photo2");

		echo "done";
	}else{
		echo "Error".mysqli_error($con);
	}
}
  ?>