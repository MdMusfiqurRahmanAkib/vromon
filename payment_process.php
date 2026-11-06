<?php 
	include "inc/db.php";
	$tour_id = $_GET["tour_id"];
	$transaction_id = $_POST["transaction_id"];

	$sql = "UPDATE tours SET transaction_id = '$transaction_id', payment = 'done' WHERE tour_id = '$tour_id';";
	$result = mysqli_query($con, $sql);
	if($result){
		header("Location: profile.php");
	}
?>