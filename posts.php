<?php
require 'conn.php';
session_start();


$posts = mysqli_query($con, "SELECT * FROM house WHERE NOT capacity = 0");
while ($row = mysqli_fetch_array($posts)) {
	echo '<tr>
		<td><i class="fa fa-institution"></i>'.$row['house_name'].'</td>
		<td class="text-center"><img src="./photos/'.$row['photo1'].'" class="img-responsive" width="60%" height="100"></td>
		<td><i class="fa fa-bed"></i> '.$row['capacity'].' Remaining</td>';
		$name = mysqli_query($con, "SELECT fullname FROM users WHERE email = '$row[owner]'");
		$fname = mysqli_fetch_array($name);
		echo '<td><i class="fa fa-user-circle"></i> <span id="nameToPerson">'.$fname['fullname'].'</span></td>
			<td>';
		echo'<button class="btn btn-primary" value="'.$row['owner'].'" onclick="openForm(this.value)"><i class="fa fa-comments"></i> Massage</button>
		</td>
		<td>
			<button  onclick="viewDetails(this.value)" id="details" data-toggle="modal" data-target="#houseDetails" class="btn btn-success" value="'.$row['hid'].'"><i class="fa fa-bars"></i> Details</button>
		</td>';
		$book = mysqli_query($con, "SELECT * FROM book WHERE userid = '$_SESSION[email]' AND owner = '$row[owner]'");
		$count = mysqli_num_rows($book);
		if ($count == 0) {
			echo '<td>
			<button  onclick="reserveSpace(this.value)" id="book" class="btn btn-danger" value="'.$row['owner'].'"><i class="fa fa-toggle-off fa-1x"></i> Reserve</button>
		</td>';
		}else
		{
		echo '<td>
			<button  onclick="reserveSpace(this.value)" id="book" class="btn btn-warning my-1" value="'.$row['owner'].'"><i class="fa fa-toggle-on fa-1x"></i> Reserved</button>
		
			<button  onclick="Cancel(this.value)" id="book" class="btn btn-danger" value="'.$row['owner'].'"><i class="fa fa-close fa-1x"></i> Cancel</button>
		</td>';
		}
		
	echo'</tr>';
}

?>