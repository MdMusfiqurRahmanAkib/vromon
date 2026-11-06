<?php
session_start();
ob_start();

include "../inc/db.php";

$table_name = $_GET["name"];
$primary_key = $_GET["pk"];
$id = $_GET["id"];
$confirm = $_GET["confirm"];

if ($confirm == 0) {
	echo "Are you sure you want to delete this record?<br>";

	$sql = "SHOW COLUMNS FROM $table_name";
	$result = mysqli_query($con, $sql);
	$arr = [];
	$l = 0;
	while ($row = mysqli_fetch_array($result)) {
		array_push($arr, $row['Field']);
		$l += 1;
	}
	$sql = "SELECT * FROM $table_name WHERE $primary_key='$id'";
	$result = mysqli_query($con, $sql);

	$index = 0;
	$row = mysqli_fetch_assoc($result);

	while ($index < $l) {
		echo $row[$arr[$index]] . "<br>";
		$index += 1;
	}
	?>

  <a href="delete_record.php?name=<?php echo $table_name; ?>&pk=<?php echo $primary_key; ?>&id=<?php echo $id; ?>&confirm=1"><button class="success">Yes</button></a>
<?php } else {
	$sql = "DELETE FROM $table_name WHERE $primary_key = $id";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Record deleted Successfully!<br>";
	}?>
  <a href="index2.php"><button class="success">Go Back to Panel</button></a>
<?php }
?>
