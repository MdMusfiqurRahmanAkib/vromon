<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'ppt', 'txt'); // valid extensions
$path = 'uploads/images/'; // upload directory

if ($_FILES['doc']) {
	$doc = $_FILES['doc']['name'];
	$tmp = $_FILES['doc']['tmp_name'];

	// get uploaded file's extension
	$ext = strtolower(pathinfo($doc, PATHINFO_EXTENSION));

	// can upload same test using rand function
	$final_doc = $_SESSION['user_id'] . "_" . time() . "_" . $doc;

	// check's valid format
	if (in_array($ext, $valid_extensions)) {
		$path = $path . strtolower($final_doc);
		$writter_id = $_SESSION['user_id'];

		if (move_uploaded_file($tmp, $path)) {

			//insert form data in the database
			$sql = "UPDATE `users` SET `profile_pic` = '$path' WHERE `users`.`user_id` = {$_SESSION['user_id']}";

			$insert = mysqli_query($con, $sql);

			$ret_val = ($insert) ? 'File uploaded Successfully!' : mysqli_error($con);
			echo $ret_val;
			$_SESSION['profile_pic'] = $path;
			?>
			<a href="index.php"><button class="success">হোমপেজে যান</button></a>
		<?php }
	} else {
		echo 'Invalid File Type!';
	}
}
mysqli_close($con);
?>


