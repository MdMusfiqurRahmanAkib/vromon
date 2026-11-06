<?php
	session_start();
	ob_start();
	include "inc/db.php";
	include "number_converter.php";
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$obj = new bangla_converter(); 
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$id = $_GET["id"];

	$sql = "SELECT title, month from tour_packages where package_id='$id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	$workbook = $reader->load("text/packages/sample.xlsx");
	$file = "text/packages/sample.xlsx";

	$started_from = $workbook->getActiveSheet()->getCell('B2')->getValue();
	$went_to = $workbook->getActiveSheet()->getCell('B3')->getValue();
	$amount = explode(" ",$workbook->getActiveSheet()->getCell('B10')->getValue());
	$amount = $obj->bn2en($amount[0]);

	$sql = "SELECT ds_id from districts where ds_name='$started_from'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$started_from = $row["ds_id"];

	$sql = "SELECT ds_id from districts where ds_name='$went_to'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$went_to = $row["ds_id"]; 

	$year = date('Y', time());
	echo $year."<br>";

	$file = "text/tours/packaged_tours/".$_GET["id"]."_".$year.".xlsx";
	echo $file."<br>";

	if(file_exists($file)){
		$workbook2 = $reader->load($file);
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);

		$sheet = $spreadsheet->getActiveSheet();
		
		$line = 1;
		while(1){
			$uid = $workbook2->getActiveSheet()->getCell('A'.$line)->getValue();
			if($uid=="END"){
				break;
			}
			$line+=1;
		}

		$sheet->setCellValue('A'.$line, $_SESSION['user_id']);
		$sheet->setCellValue('B'.$line, "unpaid");
		$sheet->setCellValue('A'.($line+1), "END");
	}else{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setTitle($id."_".$year);
		$sheet->setCellValue('A1', $_SESSION['user_id']);
		$sheet->setCellValue('B1', "unpaid");
		$sheet->setCellValue('A2', "END");
		$sql = "UPDATE `tour_packages` SET `package_file` = '$file' WHERE `tour_packages`.`package_id` = '$id'";
		$result = mysqli_query($con, $sql);
	}
	$writer = new Xlsx($spreadsheet);
	$writer->save($file);

	$pk = $pks["tours"];
	$sql8 = "SELECT MAX($pk) FROM `tours`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	$sql = "INSERT INTO tours(tour_id, user_id, started_from, went_to, status, payment, tour_type, amount, tour_file) VALUES ('$pk_val','{$_SESSION['user_id']}', '$started_from', '$went_to', 'pending', 'pending', 'package','12000','$file')";
	$result = mysqli_query($con, $sql);
	if($result){
		header('Location: profile.php');
	}

?>