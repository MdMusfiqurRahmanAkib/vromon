<?php

	include "inc/db.php";
	// Fetching Values From URL
	$email = $_POST['email'];

	$sql = "SELECT * FROM subscribers WHERE subscriber_email='$email'";
	$result = mysqli_query($con,$sql);
	
	if(!mysqli_num_rows($result)){

		$pk = $pks["subscribers"];
		$sql8 = "SELECT MAX($pk) FROM `subscribers`";
		$result8 = mysqli_query($con, $sql8);
		if(mysqli_num_rows($result8)<1)
			$pk_val = 1;
		else{
			$row8 = mysqli_fetch_assoc($result8);
			$key = "MAX(".$pk.")";
			$pk_val = $row8[$key]+1;
		}
		$sql_2= "INSERT INTO subscribers (subscriber_id, subscriber_email) VALUES ('$pk_val','$email')";
		$result_2 = mysqli_query($con,$sql_2);
		
		if ($result_2) {
	    	echo "successful";
		} else {
		    echo "Error: " . $sql_2 . "<br>" . $con->error;
		}
	}else{
		echo "আপনি আগেই সাবস্ক্রাইব করেছেন!";
	}
	

	mysqli_close($con); // Connection Closed
?>