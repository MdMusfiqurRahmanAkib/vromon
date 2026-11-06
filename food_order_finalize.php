<?php 
	include 'header.php';
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	$obj = new bangla_converter();
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	
	$title = "food"."_".$_SESSION['user_id']."_".time();
	$sheet->setTitle($title);

	$tour_id = $_GET["tour_id"];
	$sp_id = $_GET["sp_id"];

	$sql2 = "SELECT went_to from tours WHERE tour_id='$tour_id'";
	$result2 = mysqli_query($con, $sql2);
	$district = mysqli_fetch_assoc($result2);

	$sheet->setCellValue("A1", "tour_id");
	$sheet->setCellValue("B1", $tour_id);

	$sheet->setCellValue("A2", "sp_id");
	$sheet->setCellValue("B2", $sp_id);

	$sheet->setCellValue("A3", "Request Time");
	$sheet->setCellValue("B3", time());

	$line = 4;
	
	$sql = "Select food_menu FROM `homemade_foods` Where sp_id='$sp_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$bill = 0;

	foreach($_POST as $key => $value){
		$keys = explode("_",$key);
		$workbook = $reader->load($row["food_menu"]);

		$sheet->setCellValue("A".$line, $workbook->getActiveSheet()->getCell('A'.$keys[1])->getValue());
		$sheet->setCellValue("B".$line, $value);
		#echo $obj->bn2en($workbook->getActiveSheet()->getCell('B'.$keys[1])->getValue())."<br>";
		$bill+=(int)$obj->bn2en($workbook->getActiveSheet()->getCell('B'.$keys[1])->getValue());
		$line+=1;		
	}
	$sheet->setCellValue("A".$line, "মোট বিল");
	$sheet->setCellValue("B".$line, $bill);

	$file = "text/services/food"."_".$_SESSION['user_id']."_".time().".xlsx";
	$writer = new Xlsx($spreadsheet);
	$writer->save($file);

	$pk = $pks["tour_services"];
	$sql8 = "SELECT MAX($pk) FROM `tour_services`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}
	
	$sql2 = "INSERT INTO `tour_services` (`ts_id`, `tour_id`, `ds_id`, `service_type`, `service_details`, `status`) VALUES ('$pk_val', '$tour_id','{$district["went_to"]}', 'food', '$file', 'pending')";
	$result2 = mysqli_query($con, $sql2);
	if ($result2){
		echo "successful";?>

    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
<?php } else {
	echo "Error: " . $sql2 . "<br>" . $con->error;
}
?>
<?php 
	include 'footer.php';
?>