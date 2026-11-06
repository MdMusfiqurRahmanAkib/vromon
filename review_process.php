<?php 
	include "header.php";
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	
	$type = $_GET["type"];
	$id = $_GET["id"];
	$ts_id = $_GET["ts_id"];
	$sql2 = "UPDATE `tour_services` SET `status` = 'finished' WHERE `tour_services`.`ts_id` = '$ts_id'";
	$result2 = mysqli_query($con, $sql2);

	if ($result2){	
		if($type=="guide")
			$sql = "SELECT * FROM `guides` WHERE user_id='$id'";	
		else if($type=="transport")
			$sql = "SELECT * FROM `transports` WHERE transport_id='$id'";
		else
			$sql = "SELECT * FROM `homemade_foods` WHERE sp_id='$id'";

		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);

		$workbook = $reader->load($row["reviews"]);
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($row["reviews"]);
		$sheet = $spreadsheet->getActiveSheet();

		$rating = $_POST["rating"];
		$review = $_POST["review"];

		$line = 1;

		while (1){
			$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
			if($key=="END"){
				break;
			}
			$line+=1;
		}

		$sheet->setCellValue('A'.$line, $ts_id);
		$sheet->setCellValue('B'.$line, $rating);
		$sheet->setCellValue('C'.$line, $review);
		$sheet->setCellValue('D'.$line, time());
		$sheet->setCellValue('A'.($line+1), "END");

		$writer = new Xlsx($spreadsheet);
		$writer->save($row["reviews"]);

		$workbook = $reader->load($row["service_history"]);
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($row["service_history"]);
		$sheet = $spreadsheet->getActiveSheet();

		$line = 1;

		while (1){
			$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
			if($key=="END"){
				break;
			}
			$line+=1;
		}

		$sheet->setCellValue('A'.$line, $ts_id);
		$sheet->setCellValue('B'.$line, time());
		$sheet->setCellValue('A'.($line+1), "END");

		$writer = new Xlsx($spreadsheet);
		$writer->save($row["service_history"]);

		header("Location: profile.php");
	}
?>