<?php
require 'conn.php';
session_start();
$space = $_POST['close'];

$book = mysqli_query($con, "SELECT * FROM book WHERE userid = '$_SESSION[email]'");
$count = mysqli_num_rows($book);
if ($count != 0) {
	
$fetch = mysqli_query($con, "SELECT capacity FROM house WHERE owner = '$space'");
$row = mysqli_fetch_array($fetch);

$num = $row['capacity'];

if ($num == 0)
{
	echo "All Rooms Have been Reserved";
}
else
{
$num_sub = $num + 1;

$update = mysqli_query($con, "UPDATE house SET capacity = '$num_sub' WHERE owner = '$space'");

	if ($update) {
		$book = mysqli_query($con, "DELETE FROM book WHERE userid = '$_SESSION[email]'");
		if ($book) {
			echo "Room Reserved Cancled";
		}else{
			echo "Room Reserved Not Cancled";
		}
	}else{
		echo "Failed.......there was an error";
	}

}

}else
{
echo "You don't have a Reserved Room";
}



?>