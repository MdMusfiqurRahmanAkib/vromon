<?php
include "inc/db.php";
include "admin/table_description.php";

$table = $_GET["name"];
$primary_key = $_GET["pk"];
$id = $_GET["id"];
$ins = $_GET["ins"];
$sql = "UPDATE $table SET `inspection` = 'ongoing' WHERE $primary_key = $id";
$result = mysqli_query($con, $sql);

if ($result) {
	echo "here"."<br>";

	$pk = $pks["inspections"];
	$sql8 = "SELECT MAX($pk) FROM `inspections`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	$sql2 = "INSERT INTO `inspections` (`inspection_id`, `table_name`, `primary_key`, `id`, `inspector_id`, `status`, `done_date`, `inspection_report`) VALUES ('$pk_val', '$table', '$primary_key', '$id', '$ins', 'ongoing', CURRENT_TIMESTAMP, '')";
	$result2 = mysqli_query($con, $sql2);
	echo $result2;
	if ($result2) {
		echo "Successfull!" . "<br>";?>
		<a href="business_profile.php"><button class="success">প্রোফাইলে যান</button></a>
	<?php }
}
?>