<?php
include 'inc/db.php';
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$table = $_GET["table"];
$primary_key = $_GET["primary_key"];
$id = $_GET["id"];
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$authenticity = $_POST["authenticity"];
echo $authenticity."<br>";

if ($authenticity=="False"){

	$sql = "UPDATE $table SET `inspection` = 'decilned' WHERE $primary_key = $id";
	$result = mysqli_query($con, $sql);
	$sql2 = "DELETE FROM `inspections` WHERE primary_key='$primary_key' AND id='$id'";

	$result2 = mysqli_query($con, $sql2);
	echo $result2;
	if ($result and $result2){
		echo "Successfull!" . "<br>";?>
		<a href="business_profile.php"><button class="success">প্রোফাইলে যান</button></a>
	<?php }
}else{
	if ($table=="hotels"){
	// (C) GET WORKSHEET


		$environment = $_POST["environment"];
		$experience = $_POST["experience"];
		$grocery = $_POST["grocery"];
		$hospital = $_POST["hospital"];
		// (B) CREATE A NEW SPREADSHEET
		#echo $environment." ".$experience." ".$grocery." ".$hospital."<br>";
		$sheet->setTitle("Hospital");
		$sheet->setCellValue("A1", "Environment");
		$sheet->setCellValue("B1", $environment);

		$sheet->setCellValue("A2", "Experience");
		$sheet->setCellValue("B2", $experience);

		$sheet->setCellValue("A3", "Grocery");
		$sheet->setCellValue("B3", $grocery);

		$sheet->setCellValue("A4", "Hospital");
		$sheet->setCellValue("B4", $hospital);

	}else if ($table=="transports"){
		$fitness = $_POST["fitness"];
		// (B) CREATE A NEW SPREADSHEET

		$sheet->setTitle("Transport");
		$sheet->setCellValue("A1", "Fitness");
		$sheet->setCellValue("B1", $fitness);
	}else if ($table=="guides"){
		$previous_report = $_POST["previous_report"];
		// (B) CREATE A NEW SPREADSHEET

		$sheet->setTitle("Guide");
		$sheet->setCellValue("A1", "Previous Report");
		$sheet->setCellValue("B1", $previous_report);
	}else{
		$environment = $_POST["environment"];
		$cleanliness = $_POST["cleanliness"];
		// (B) CREATE A NEW SPREADSHEET

		$sheet->setTitle("Homemade Foods");
		$sheet->setCellValue("A1", "Environment");
		$sheet->setCellValue("B1", $environment);

		$sheet->setCellValue("A2", "Cleanliness");
		$sheet->setCellValue("B2", $cleanliness);
		$file = "text/inspections/".$table."_".$id.".xlsx";
	}

	// (E) OUTPUT
	$writer = new Xlsx($spreadsheet);
	$file = "text/inspections/".$table."_".$id.".xlsx";
	$sql = "UPDATE $table SET `inspection` = 'done', `status` = 'available' WHERE $primary_key = $id";
	$result = mysqli_query($con, $sql);
	$date = date('Y/m/d H:i:s');

	$sql2 = "UPDATE `inspections` SET `status` = 'done', `done_date` = '$date', `inspection_report` = '$file' WHERE primary_key='$primary_key' AND id='$id'";
	$result2 = mysqli_query($con, $sql2);

	echo $result2."<br>";
	// (E1) SAVE TO A FILE ON THE SERVER
	$writer->save($file);
	echo "OK!";
}?>
<a href="business_profile.php"><button class="success">প্রোফাইলে যান</button></a>