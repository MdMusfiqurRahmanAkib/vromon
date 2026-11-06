<?php
include '../inc/db.php';
include "../number_converter.php";
$obj = new bangla_converter();
$name = $_GET["name"];
$id = $_POST["id"];
if ($name == "inspectors") {
	$sql = "UPDATE `users` SET `business_involved` = 'True' WHERE `users`.`user_id` = '$id'";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "added<br>";
	}
} else if ($name == "moderators") {
	$sql = "UPDATE `users` SET `role` = 'moderator' WHERE `users`.`user_id` = '$id'";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "role set<br>";
	}
}
$nid = $_POST["nid"];

if ($name == "inspectors") {
	$pc = $_POST["postal_code"];

	$l = strlen($pc);
	$postal_code = "";

	for ($x = 0; $x < $l; $x++) {
		if ($pc[$x] >= "0" and $pc[$x] <= "9") {
			$c = $obj->en2bn($pc[$x]);
		} else {
			$c = $pc[$x];
		}
		$postal_code = $postal_code . $c;
	}

	$sql = "SELECT ds_id, upazilla from postal_codes where postal_code='$postal_code'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql = "INSERT INTO inspectors (`user_id`, `nid`,`ds_id`, `upazilla`, `postal_code`) VALUES('$id',$nid, '{$row['ds_id']}','{$row['upazilla']}','$postal_code')";
} else if ($name == "moderators") {
	$sql = "INSERT INTO moderators (`user_id`, `nid`) VALUES('$id',$nid)";
}
$result = mysqli_query($con, $sql);

if ($result) {
	echo "successful";?>

    <a href="index2.php"><button class="success">প্যানেলে যান</button></a>
<?php } else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
mysqli_close($con);

?>
