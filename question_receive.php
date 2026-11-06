<?php

include "inc/db.php";
include "admin/table_description.php";
// Fetching Values From URL
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$question = $_POST['question'];

$sql = "SELECT * FROM questions_to_answer WHERE email='$email'";
$result = mysqli_query($con, $sql);

if (!mysqli_num_rows($result)) {
	$filename = $email . rand(1000, 9000) . ".txt";
	$question_path = fopen("questions/$filename", "w");

	$fb = fwrite($question_path, stripslashes($question)) or die('Could not write
to file');
	fclose($question_path);

	$sql_2 = "INSERT INTO questions_to_answer (name, contact, email, question_path) VALUES ('$name', '$contact', '$email', '$filename')";
	$result_2 = mysqli_query($con, $sql_2);

	if ($result_2) {
		echo "successful";
	} else {
		echo "Error: " . $sql_2 . "<br>" . $con->error;
	}
} else {
	echo "আপনার একটি প্রশ্নের উত্তর দেওয়া বাকি আছে!";
}

mysqli_close($con); // Connection Closed
?>