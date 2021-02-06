<?php
require 'conn.php';
session_start();
$space = $_POST['close'];

$book = mysqli_query($con, "SELECT * FROM book WHERE bid = '$space'");
$count = mysqli_num_rows($book);
if ($count != 0) {

$row1 = mysqli_fetch_array($book);
$fetch = mysqli_query($con, "SELECT capacity FROM house WHERE owner = '$row1[owner]'");
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
		$book = mysqli_query($con, "DELETE FROM book WHERE bid = '$space'");
		if ($book) {
			echo "Room Reservation is Cancled";
		}else{
			echo "Room Reservation is Not Cancled";
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