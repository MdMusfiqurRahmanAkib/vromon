<?php

session_start();
ob_start();
include "inc/db.php";
// Fetching Values From URL
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($con, $sql);

if ($result) {

	//number of rows
	$rowcount = mysqli_num_rows($result);

	if ($rowcount == 0) {
		echo "No Such Users!";
	} else {
		// userdata
		$user = mysqli_fetch_assoc($result);

		if (md5($password) != $user['password']) {
			echo "Wrong Password!";
		} else {
			$_SESSION['isLoggedIn'] = 'yes';
			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
			$_SESSION['mobile'] = $user['mobile'];
			$_SESSION['pass'] = $user['password'];
			$_SESSION['address'] = $user['address'];
			$_SESSION['profile_pic'] = $user['profile_pic'];
			$_SESSION['role'] = $user['role'];
			$_SESSION['business_involved'] = $user['business_involved'];
			$_SESSION['postal_code'] = $user['postal_code'];
			echo "successful";
		}
	}

} else {
	echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con); // Connection Closed
?>