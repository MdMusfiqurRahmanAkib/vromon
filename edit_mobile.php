<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';

$mobile = $_POST["mobile"];

$sql = "UPDATE `users` SET `mobile` = '$mobile' WHERE `users`.`user_id` = '$_SESSION[user_id]'";

$result = mysqli_query($con, $sql);

if ($result) {
	$_SESSION['mobile'] = $mobile;
	echo "successful";?>

    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
<?php } else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
mysqli_close($con);

?>


