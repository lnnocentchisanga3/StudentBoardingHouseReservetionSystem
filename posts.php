<?php
require 'conn.php';
session_start();


$posts = mysqli_query($con, "SELECT * FROM house");
while ($row = mysqli_fetch_array($posts)) {
	echo '<tr>
		<td><i class="fa fa-institution"></i>'.$row['house_name'].'</td>
		<td><img src="./photos/'.$row['photo1'].'" class="img-responsive" width="100%" height="100"></td>
		<td><i class="fa fa-bed"></i> '.$row['capacity'].' Remaining</td>
		<td><i class="fa fa-user-circle"></i> '.$row['owner'].'</td>
		<td>
			<button class="btn btn-primary" value="'.$row['owner'].'" onclick="openForm(this.value)"><i class="fa fa-comments"></i> Massage</button>
		</td>
		<td>
			<button  onclick="viewDetails(this.value)" id="details" data-toggle="modal" data-target="#houseDetails" class="btn btn-success" value="'.$row['hid'].'"><i class="fa fa-bars"></i> Details</button>
		</td>';
		echo '<td>
			<button  onclick="reserveSpace(this.value)" id="book" class="btn btn-danger" value="'.$row['owner'].'"><i class="fa fa-toggle-off fa-1x"></i> Reserve</button>
		</td>';
		
	echo'</tr>';
}

?>