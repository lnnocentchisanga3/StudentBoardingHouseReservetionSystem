<?php
require 'conn.php';
session_start();
$space = $_POST['house'];

$book = mysqli_query($con, "SELECT * FROM book WHERE userid = '$_SESSION[email]'");
$count = mysqli_num_rows($book);
if ($count == 0) {
	
$fetch = mysqli_query($con, "SELECT capacity FROM house WHERE owner = '$space'");
$row = mysqli_fetch_array($fetch);

$num = $row['capacity'];

if ($num == 0)
{
	echo "All Rooms Have been Reserved";
}
else
{
$num_sub = $num - 1;

$update = mysqli_query($con, "UPDATE house SET capacity = '$num_sub' WHERE owner = '$space'");

	if ($update) {
		$book = mysqli_query($con, "INSERT INTO book(userid,owner) VALUES('$_SESSION[email]','$space')");
		if ($book) {
			echo "Room Reserved";
		}else{
			echo "Room not Reserved";
		}
	}else{
		echo "Failed.......there was an error";
	}

}

}else
{
echo "You have Already Reserved a Room";
}



?>