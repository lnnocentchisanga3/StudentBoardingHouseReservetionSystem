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
	</style>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script> 
</head>
<body>
	<div class="container shadow pb-5">
		<div class="row">
			<div class="col-md-12 container-fluid mt-2">
				<div class="row">
					<div class="col-md-6 py-3">
						<h4>Student Boarding House Reservetion System</h4>
					</div>
					<div class="col-md-6 py-3">
						<form>
							<div class="input-group">
								<input type="text" name="search" placeholder="Search for a Boarding House" class="form-control">
								<input type="submit" name="submit" value="Search" class="form-control col-md-3 bg-primary text-white">
							</div>
						</form>
					</div>
				</div>
			</div>

		<div class="col-md-12 container-fluid bg-white pb-5">
			<div class="row">
				<div class="col-md-12">
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add a boarding house</a>
				</div>
				<div class="col-md-2 mt-5 border mx-3 rounded">
					<h6 class="text-center">Green gate Boarding house</h6>
					<img src="./lib/images/teacher-icon.png" class="img-responsive py-3" width="100%">
					<div class="row">
						<a href="#" class="col-md-4 mx-2 mb-3 btn btn-primary">Book</a>
					    <a href="#" class="col-md-5 mx-2 mb-3 btn btn-success">Details</a>
					</div>
				</div>

				<div class="col-md-2 mt-5 border mx-3 rounded">
					<h6 class="text-center">Green gate Boarding house</h6>
					<img src="./lib/images/teacher-icon.png" class="img-responsive py-3" width="100%">
					<div class="row">
						<a href="#" class="col-md-4 mx-2 mb-3 btn btn-primary">Book</a>
					    <a href="#" class="col-md-5 mx-2 mb-3 btn btn-success">Details</a>
					</div>
				</div>

				<div class="col-md-2 mt-5 border mx-3 rounded">
					<h6 class="text-center">Green gate Boarding house</h6>
					<img src="./lib/images/teacher-icon.png" class="img-responsive py-3" width="100%">
					<div class="row">
						<a href="#" class="col-md-4 mx-2 mb-3 btn btn-primary">Book</a>
					    <a href="#" class="col-md-5 mx-2 mb-3 btn btn-success">Details</a>
					</div>
				</div>

				<div class="col-md-2 mt-5 border mx-3 rounded">
					<h6 class="text-center">Green gate Boarding house</h6>
					<img src="./lib/images/BIOHazard.png" class="img-responsive py-3" width="100%">
					<div class="row">
						<a href="#" class="col-md-4 mx-2 mb-3 btn btn-primary">Book</a>
					    <a href="#" class="col-md-5 mx-2 mb-3 btn btn-success">Details</a>
					</div>
				</div>

				<div class="col-md-2 mt-5 border mx-3 rounded">
					<h6 class="text-center">Green gate Boarding house</h6>
					<img src="./lib/images/BIOHazard.png" class="img-responsive py-3" width="100%">
					<div class="row">
						<a href="#" class="col-md-4 mx-2 mb-3 btn btn-primary">Book</a>
					    <a href="#" class="col-md-5 mx-2 mb-3 btn btn-success">Details</a>
					</div>
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
          <h4 class="modal-title">Add a boarding house</h4>
          <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form method="POST" action="dashboard.php" class="bg-white col-md-12">
				<label class="mt-1">Email</label><br>
				<input type="email" name="email" class="form-control" placeholder="email"><br>
            <label>password</label><br>
            <input type="password" name="password" class="form-control" placeholder="password"><br>
				<label>Confirm password</label><br>
				<input type="password" name="cpassword" class="form-control" placeholder="Confirm password"><br><br>
				<input type="submit" name="send" value="Signup" class="btn btn-primary my-3 px-5">
			</form>

        </div>
      </div>
    </div>
  </div>

	<!-- End of add boarding house modal --> 


	<!--scripts-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/popper.min.js"></script>
</body>
</html>