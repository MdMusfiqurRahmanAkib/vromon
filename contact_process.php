<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';
$id = $_GET["id"];

if ($id == 1) {
	$name = $_POST["name"];
	$email = $_POST["email"];

} else {
	$name = $_SESSION['fname'] . " " . $_SESSION['lname'];
	$email = $_SESSION['email'];
}
$message = $_POST["message"];
echo strlen($message);
$file = fopen("uploads/messages/" . $email . "_" . time() . "_" . ".txt", "w") or die("Unable to open file!");
$message_file = "uploads/messages/" . $email . "_" . time() . "_" . ".txt";
fwrite($file, $message);
fclose($file);

$pk = $pks["messages"];
$sql8 = "SELECT MAX($pk) FROM `messages`";
$result8 = mysqli_query($con, $sql8);
if(mysqli_num_rows($result8)<1)
	$pk_val = 1;
else{
	$row8 = mysqli_fetch_assoc($result8);
	$key = "MAX(".$pk.")";
	$pk_val = $row8[$key]+1;
}

$sql = "INSERT INTO `messages` (`message_id`,`email`, `name`, `message_path`) VALUES ('$pk_val','$email', '$name', '$$message_file')";

$result = mysqli_query($con, $sql);

if ($result) {
	echo "successful";?>

    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
<?php } else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
mysqli_close($con);

?>


