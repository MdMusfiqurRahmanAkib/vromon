<?php 
	include "header.php";

	$ts_id = $_GET["ts_id"];
	$sql = "UPDATE `tour_services` SET `status` = 'cancelled' WHERE `tour_services`.`ts_id` = '$ts_id'";
	$result = mysqli_query($con, $sql);
	if($result){?>
		<h6>ক্যান্সেল হয়েছে</h6>
		<a href="profile.php"><button class="btn btn-success">প্রোফাইলে যান</button></a>
	<?php }
?>
<?
	include "footer.php";
?>