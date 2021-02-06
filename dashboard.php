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
	<style>
		.nav-hieght{
			height: 91.2vh;
		}
		a{
			color: white;
			font-family: arial, sans-serif;
		}
		a:hover{
		color: dodgerblue;
		text-decoration: none;
		transition: all 0.5s;
		background-color: white;
		border-radius: 1px;
		}
		li:hover{
		border-radius: 2px;
		}
		.dashboard-bg{
			background-color: lightgrey;
		}


		 body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .openChatBtn {
      background-color: rgb(255, 255, 255);
      color: black;
      padding: 16px 16px;
      border: none;
      /*font-weight: 500;
      font-size: 18px;*/
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 100px;
      right: 40px;
      border-radius: 50%;
      width: 100px;
   }
   .openChat {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid dodgerblue;
      z-index: 9;
   }
   .form {
      max-width: 300px;
      padding: 10px;
      background-color: white;
   }
   .form textarea {
      width: 100%;
      font-size: 18px;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      font-weight: 500;
      background: #d5e7ff;
      color: rgb(0, 0, 0);
      resize: none;
      min-height: 200px;
   }
   .form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   }
   /*form .btn {
      background-color: dodgerblue;
      color: white;
      padding: 16px 20px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
   }*/
   .form .close {
      background-color: red;
   }
   .form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
	</style>
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

		<div class="col-md-12 container-fluid bg-white pb-5">
			<div class="row">
				<div class="container">

				<div class="row">
				<div class="col-md-6 text-center">
					<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-1x"></i> Post your boarding house</a>
				</div>

				<div class="col-md-6 py-2 text-center">
						<span class="py-2"><!-- <i class="fa fa-user-circle"></i> -->  <?php /*echo $_SESSION['email'];*/ ?></span> <span id="notify"></span>
						<a href="#" class="ml-3 btn btn-primary mt-2"><i class="fa fa-user-circle"></i> My Account </a>
						<a href="Logout.php?action=out" class="btn btn-danger ml-3 mt-2"><i class="fa fa-sign-out fa-1x"></i> Logout</a>
				</div>

				</div>

				</div>
				
				<h5 class="col-md-12 mt-2 text-center text-uppercase">Available Boarding houses</h5>
				<div class="col-md-12 mt-2">
					
				</div>

					<div class="card mt-5 col-md-12">
						
						<div class="card-header">
								<form class="col-md-6 offset-md-6">
								<div class="input-group">
								<input type="text" name="search" id="search" placeholder="Search By Boarding House name or By Owner name" class="form-control" onkeyup="searchHouse(this.value)">
								<!-- <button class="btn btn-primary"><i class="fa fa-search"></i> Search</button> -->
								</div>
								</form>
						</div>
						<!-- <p id="test">hello</p>
						<p id="test1">hello</p> -->

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover col-md-12">
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

	<!-- End of add boarding house modal --> 



	<!-- Massage box -->

<div class="openChat rounded">
<div class="form">
<div class="row">
	<h5 class="col-md-6">Message <i class="fa fa-comment"></i></h5>
	<a href="#!" class="col-md-4 ml-4" onclick="closeForm()"><i class="fa fa-close fa-2x text-danger ml-5"></i></a>
</div>
<label>Name</label>
<div class="input-group">
	 <i class="fa fa-user-circle fa-2x mr-2"></i> <input type="text" name="email" id="email" class="form-control">
</div>
<label for="msg">Message</label>
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
	/*loadTable();*/
}, 1000);

function reserveSpace(space){
	let xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xhttp.open("POST", "book.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("house="+space);

	
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