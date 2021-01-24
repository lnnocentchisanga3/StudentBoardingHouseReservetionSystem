<!DOCTYPE html>
<html>
<head>
	<title>Admin | Dashboard</title>
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="lib/animate/animate.min.css">
	<link rel="stylesheet" type="text/css" href="lib/font-awesome/css/font-awesome.min.css">
</head>
<body class="bg-primary container">
	<div class="row mt-5">
		<div class="col-md-2"></div>
		<div class="col-md-8 mt-5">
			<h3 class="text-center text-uppercase text-white">Login</h3>
			<form method="POST" action="dashboard.php" class="bg-white col-md-8 offset-md-2 rounded">
				<label class="mt-5">Email</label><br>
				<input type="email" name="email" class="form-control" placeholder="email"><br>
				<label>password</label><br>
				<input type="password" name="password" class="form-control" placeholder="password"><br><br>
				<input type="submit" name="send" value="login" class="btn btn-primary my-3 px-5">
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>