<?php

	include "inc/db.php"; 
	$tour_id = $_GET['id'];
	$sql = "UPDATE `tours` SET `status` = 'finished' WHERE `tours`.`tour_id` = '$tour_id'";
	$result = mysqli_query($con, $sql);

	if($result)
		header("Location: profile.php"); 
?>