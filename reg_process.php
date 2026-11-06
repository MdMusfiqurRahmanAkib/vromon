<?php

include "inc/db.php";
// Fetching Values From URL
include "admin/table_description.php";
$email = $_POST['email'];

$sql = "SELECT * from users where email='$email'";
$email_check = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($email_check);

if ($rowcount > 0) {
	echo "Error!<br>Email already exists<br>";
} else {
	$username = $_POST['username'];
	$sql = "SELECT * from users where username='$username'";
	$un_check = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($un_check);
	if ($rowcount > 0) {
		echo "Error!<br>Username is taken<br>";
	} else {
		$mobile = $_POST['mobile'];
		$sql = "SELECT * from users where mobile='$mobile'";
		$mb_check = mysqli_query($con, $sql);
		$rowcount = mysqli_num_rows($mb_check);
		if ($rowcount > 0) {
			echo "Error!" . "<br>" . "Mobile Number is taken" . "<br>";
		} else {
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];

			$address = $_POST['address'];
			$nid = $_POST['nid'];
			$postal_code = $_POST['postal_code'];
			$password = $_POST['password'];
			$profile_pic = "images/bangladesh_" . rand(1, 15) . ".jpg";

			$pk = $pks["users"];
			$sql8 = "SELECT MAX($pk) FROM `users`";
			$result8 = mysqli_query($con, $sql8);
			if(mysqli_num_rows($result8)<1)
				$pk_val = 1;
			else{
				$row8 = mysqli_fetch_assoc($result8);
				$key = "MAX(".$pk.")";
				$pk_val = $row8[$key]+1;
			}

			$sql = "INSERT INTO users(user_id, fname, lname, email, username, password,profile_pic,mobile,nid,postal_code,address) VALUES ('$pk_val','$fname', '$lname', '$email', '$username', md5('$password'),'$profile_pic','$mobile','$nid','$postal_code','$address')"; //Insert Query

			$result = mysqli_query($con, $sql);

			if ($result) {
				echo "successful";
				header("index.php");
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
		}
	}
}
mysqli_close($con); // Connection Closed
?>