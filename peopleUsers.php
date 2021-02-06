<?php
require 'conn.php';
session_start();


$posts = mysqli_query($con, "SELECT * FROM book WHERE owner = '$_SESSION[email]'");
while ($row = mysqli_fetch_array($posts)) {
		$name = mysqli_query($con, "SELECT * FROM users WHERE email = '$row[userid]'");
		$fname = mysqli_fetch_array($name);
		echo '<tr>
		<td>'.$fname['fullname'].'</td>
		<td class="text-center">'.$fname['email'].'</td>';

		echo '<td>
			<button  onclick="CancelBook(this.value)" id="book" class="btn btn-danger" value="'.$row['bid'].'"><i class="fa fa-close fa-1x"></i> Cancel</button>';
		
	echo'</tr>';
}

?>