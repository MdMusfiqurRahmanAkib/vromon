<?php
session_start();
ob_start();

include "inc/db.php";
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


$id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
$status = $_POST['status'];

$sql = "SELECT * FROM `blog_post` WHERE bp_id='$post_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$workbook = $reader->load($row["like_dislikes"]);
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($row["like_dislikes"]);

$sheet = $spreadsheet->getActiveSheet();
$line = 1;
while(1){
	$uid = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
	if($uid=="END"){
		break;
	}
	else if($uid==$id){
		$prev_status = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
		$sheet->setCellValue('B'.$line, $status);
		break;
	}
	$line+=1;
}

if($uid=="END"){
	$sheet->setCellValue('A'.$line, $id);
	$sheet->setCellValue('B'.$line, $status);
	$sheet->setCellValue('A'.($line+1), "END");
}
$writer = new Xlsx($spreadsheet);
$writer->save($row["like_dislikes"]);

#$result = mysqli_query($con, $sql);
/*if ($result) {
	echo "successful";
} else {
	echo "Error: Password didn't matched! Try Again";
}*/
$diff = round((time()-strtotime($row["post_date"])) / (60 * 60 * 24));

if($diff<=15){
	$mul = 50;
}else if($diff>15 and $diff<=30){
	$mul = 25;
}else{
	$mul = 10;
}
$point = -1;

if($status=="Like"){
	$point =$row["post_score"]+(5*$mul);
	$sql2 = "UPDATE `blog_post` SET `post_score` = '$point' WHERE `blog_post`.`bp_id` = '$post_id'";
	$result2 = mysqli_query($con, $sql2);
}else if($status=="Unlike" or ($status=="Dislike" and $prev_status=="Like")){
	$point =$row["post_score"]-(5*$mul);
	$sql2 = "UPDATE `blog_post` SET `post_score` = '$point' WHERE `blog_post`.`bp_id` = '$post_id'";
	$result2 = mysqli_query($con, $sql2);
}

if($point>0){
	if ($point>=2500){
		if($point>=2500 and $point<5000)
			$incentive_category = "Silver";
		else if($point>=5000 and $point<7500)
			$incentive_category = "Gold";
		else if($point>=7500){
			$incentive_category = "Platinum";
		}

		$sql2 = "SELECT * FROM `post_incentives` WHERE `bp_id` = '$post_id' AND `incentive_category`='$incentive_category'";
		$result2 = mysqli_query($con, $sql2);
		
		if(mysqli_num_rows($result2)==0){
			$pk = "pi_id";
			$sql8 = "SELECT MAX($pk) FROM `post_incentives`";
			$result8 = mysqli_query($con, $sql8);
			  if(mysqli_num_rows($result8)<1)
			    $pk_val = 1;
			  else{
			    $row8 = mysqli_fetch_assoc($result8);
			    $key = "MAX(".$pk.")";
			    $pk_val = $row8[$key]+1;
			  }

			$sql3 = "INSERT INTO `post_incentives` (`pi_id`, `bp_id`, `incentive_category`) VALUES ('$pk_val', '$post_id', '$incentive_category')";
			$result3 = mysqli_query($con, $sql3);
		}
	}
}
echo "successful";
?>