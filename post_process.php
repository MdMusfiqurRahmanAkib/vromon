<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';
require "vendor/autoload.php";
include "admin/table_description.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle("");
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'ppt', 'txt'); // valid extensions
$path = 'text/posts/'; // upload directory

if (!empty($_POST['post_title']) || $_FILES['doc']) {
	$doc = $_FILES['doc']['name'];
	$tmp = $_FILES['doc']['tmp_name'];

	// get uploaded file's extension
	$ext = strtolower(pathinfo($doc, PATHINFO_EXTENSION));

	// can upload same test using rand function
	$final_doc = $_SESSION['user_id'] . "_" . time() . "_" ."post_". $doc;
	
	// check's valid format
	
	if (in_array($ext, $valid_extensions)) {
		$path = $path . strtolower($final_doc);
		$writter_id = $_SESSION['user_id'];

		if (move_uploaded_file($tmp, $path)) {

			//insert form data in the database
			$pk = $pks["blog_post"];
			$sql8 = "SELECT MAX($pk) FROM `blog_post`";
			$result8 = mysqli_query($con, $sql8);
			if(mysqli_num_rows($result8)<1)
				$pk_val = 1;
			else{
				$row8 = mysqli_fetch_assoc($result8);
				$key = "MAX(".$pk.")";
				$pk_val = $row8[$key]+1;
			}

			$sql = "INSERT INTO `blog_post` (`bp_id`,`user_id`, `post_title`, `post_file`) VALUES ('$pk_val','$writter_id', '{$_POST['post_title']}', '$path')";

			$insert = mysqli_query($con, $sql);

			$ret_val = ($insert) ? 'File Submitted Successfully!' : mysqli_error($con);
			echo $ret_val;
		}
	} else {
		echo 'Invalid File Type!';
	}

	$sql = "SELECT bp_id FROM `blog_post` WHERE post_file='$path'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$file_name = "text/like_dislikes/".$row["bp_id"].".xlsx";
	$sheet->setTitle($row["bp_id"]);
	$sheet->setCellValue("A1", "END");
	$writer = new Xlsx($spreadsheet);

	$sql2 = "UPDATE `blog_post` SET `like_dislikes` = '$file_name' WHERE `blog_post`.`bp_id` = '{$row["bp_id"]}'";
	$update = mysqli_query($con, $sql2);
	$writer->save($file_name);
}
mysqli_close($con);
?>


