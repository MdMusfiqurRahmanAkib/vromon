<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];

$sql = "UPDATE `users` SET `fname` = '$fname',  `lname` = '$lname' WHERE `users`.`user_id` = '$_SESSION[user_id]'";

$result = mysqli_query($con, $sql);

if ($result) {
	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	echo "successful";?>

    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
<?php } else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
mysqli_close($con);

?>


