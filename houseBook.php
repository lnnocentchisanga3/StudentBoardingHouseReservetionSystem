<?php
require 'conn.php';
session_start();


$posts = mysqli_query($con, "SELECT * FROM house WHERE owner = '$_SESSION[email]'");
while ($row = mysqli_fetch_array($posts)) {
	echo '<tr>
		<td><i class="fa fa-institution"></i>'.$row['house_name'].'</td>
		<td class="text-center"><img src="./photos/'.$row['photo1'].'" class="img-responsive" width="100%" height="100"></td>
		<td><i class="fa fa-bed"></i> '.$row['capacity'].' Remaining</td>';
		$name = mysqli_query($con, "SELECT fullname FROM users WHERE email = '$row[owner]'");
		$fname = mysqli_fetch_array($name);
		echo '<td>
			<button onclick="deleteHouse(this.value)" id="book" class="btn btn-danger my-1" value="'.$row['hid'].'"><i class="fa fa-trash fa-1x"></i> Delete</button>';
		
	echo'</tr>';
}

?>