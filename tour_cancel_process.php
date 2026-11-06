<?php 
include "inc/db.php";
$id = $_GET["id"];
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$sql = "SELECT * FROM `tours` WHERE tour_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$workbook = $reader->load($row["tour_file"]);
$date = $uid = $workbook->getActiveSheet()->getCell('B3')->getValue();

$diff = round((strtotime($date)-time()) / (60 * 60 * 24));
#echo strtotime($date)." ".$diff."<br>";
$amount = $row["amount"];
if($diff>=7){
	$amount = $amount;
}else if($diff>=4 and $diff<=6){
	$amount = (0.75)*$amount;
}else if($diff>=2 and $diff<=3){
	$amount = (0.5)*$amount;
}else{
	$amount = 0;
}

$sql = "UPDATE `tours` SET `status` = 'cancelled',`payment` = 'refund',`amount` = '$amount'  WHERE `tours`.`tour_id` = '$id'";
$result = mysqli_query($con, $sql);
if($result){
	header("Location: profile.php");
}
?>