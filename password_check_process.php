<?php
session_start();
$password = $_POST['password'];

if (md5($password) == $_SESSION['pass']) {
	echo "successful";
} else {
	echo "Error: Password didn't matched! Try Again";
}
?>