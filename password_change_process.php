<?php
session_start();
ob_start();
include "inc/db.php";
$id = $_SESSION['user_id'];
$pass = $_POST['password'];
$sql = "UPDATE users SET password = MD5('$pass') WHERE user_id = '$id'";

$result = mysqli_query($con, $sql);
if ($result) {
	echo "successful";
} else {
	echo "Error: Password didn't matched! Try Again";
}
?>