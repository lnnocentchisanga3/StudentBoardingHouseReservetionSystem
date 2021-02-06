<?php
require 'conn.php';

if (isset($_GET['search'])) {
	$search = $_GET['search'];

	$posts = mysqli_query($con, "SELECT * FROM house JOIN users ON house.owner=users.email WHERE house_name LIKE '%$search%' OR owner LIKE '%$search%' OR fullname LIKE '%$search%'");

	
if (mysqli_num_rows($posts) == 0) {
	echo "<p class='text-center py-5'>'".$search."'- Sorry !! nothing is found for this search <i class='fa fa-search fa-2x'></i></p>";
}else{
	while ($row = mysqli_fetch_array($posts)) {
	echo '<tr>
		<td><i class="fa fa-institution"></i>'.$row['house_name'].'</td>
		<td><img src="./photos/'.$row['photo1'].'" class="img-responsive" width="100" width="100"></td>
		<td><i class="fa fa-bed"></i> '.$row['capacity'].' Remaining</td>';
		$name = mysqli_query($con, "SELECT fullname FROM users WHERE email = '$row[owner]'");
		$fname = mysqli_fetch_array($name);
		echo '<td><i class="fa fa-user-circle"></i> '.$fname['fullname'].'</td>
			<td>';
		echo'<td>
			<button class="btn btn-primary" value="'.$row['owner'].'" onclick="openForm(this.value)"><i class="fa fa-comments"></i> Massage</button>
		</td>
		<td>
			<button  onclick="viewDetails(this.value)" id="details" data-toggle="modal" data-target="#houseDetails" class="btn btn-success" value="'.$row['hid'].'"><i class="fa fa-bars"></i> Details</button>
		</td>
		<td>
			<button  onclick="" id="details" class="btn btn-danger" value="'.$row['owner'].'"><i class="fa fa-toggle-off fa-1x"></i> Book</button>
		</td>
	</tr>';
}
}

}
?>