<!DOCTYPE html>
<html>
<head>
	<title>Student Boarding House Reservetion System</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="lib/style.css">
	<style>
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
      /*border: 3px solid #ff08086b;*/
      z-index: 9;
   }
   form {
      max-width: 300px;
      padding: 10px;
      background-color: white;
   }
   form textarea {
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
   form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   }
   form .btn {
      background-color: dodgerblue;
      color: white;
      padding: 16px 20px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
   }
   form .close {
      background-color: red;
   }
   form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
</style>
</head>
<body class="bg-primary container">
	<div class="row mt-5">
		<div class="col-md-2"></div>
		<div class="col-md-8 mt-5">
			<h3 class="text-center text-uppercase text-white py-3">Student Boarding House Reservetion System <br>Login</h3>
			<form method="POST" action="auth.php" class="bg-white col-md-8 offset-md-2 rounded">
				<label class="mt-5">Email</label><br>
				<input type="email" name="email" class="form-control" placeholder="email"><br>
				<label>password</label><br>
				<input type="password" name="password" class="form-control" placeholder="password"><br><br>
				<input type="submit" name="login" value="login" class="btn btn-primary my-3 px-5">

				I don't have an account.<a href="./signup.php"> Click here to Signup</a>
			</form>

		</div>
		<div class="col-md-2">
			
		</div>
	</div>
<!-- <button class="openChatBtn" onclick="openForm()"><i class="fa fa-comment fa-2x"></i> Message</button>
<div class="openChat rounded">
<form>
<div class="row">
	<h5 class="col-md-6">Message <i class="fa fa-comment"></i></h5>
	<a href="#" class="col-md-4 ml-4" onclick="closeForm()"><i class="fa fa-close fa-2x text-danger ml-5"></i></a>
</div>
<label for="msg"><b></b></label>
<textarea placeholder="Type message.." name="msg" required></textarea>
<div class="row">
<button type="submit" class="btn btn-primary col-md-10 ml-4">Send <i class="fa fa-paper-plane"></i></button>
</div>
</form>
</div> -->
<script>
   document .querySelector(".openChatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);
   function openForm() {
      document.querySelector(".openChat").style.display = "block";
   }
   function closeForm() {
      document.querySelector(".openChat").style.display = "none";
   }
</script>
</body>
</html>