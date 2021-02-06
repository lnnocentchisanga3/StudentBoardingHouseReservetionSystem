<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];

	echo $action;

	if ($action == 'out') {	
		session_unset();
		session_destroy();
		
		header("location: ./index.php");
	}else
	{
	 header("location: ./dashboard.php");
	}
}
?>