<?php 
	include "header.php";
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();

	$ts_id = $_GET["ts_id"];
	$verdict = ($_GET["verdict"]=="accept" ? "accepted" : "rejected");

	$sql = "SELECT * from tour_services where ts_id='$ts_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$spreadsheet_edit = \PhpOffice\PhpSpreadsheet\IOFactory::load($row["service_details"]);
	$sheet_edit = $spreadsheet_edit->getActiveSheet();

	$sql2 = "SELECT user_id from tours where tour_id='{$row["tour_id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	
	$user_id = $row2["user_id"];

	$sheet->setTitle($row["service_type"]);
	$sheet->setCellValue("A1", "tour_services");
	$sheet->setCellValue("B1", $ts_id);
	$line = 1;

	if ($row["service_type"]=="transport"){
		$line+=1;
		$sheet->setCellValue("A".$line, "provided car");
		$sheet->setCellValue("B".$line, $_POST["car_number"]);
		$sheet_edit->setCellValue('A4', "provided vehicle");
		$sheet_edit->setCellValue('B4', $_POST["car_number"]);
	}

	if ($row["service_type"]=="guide"){
		$line+=1;
		$sheet->setCellValue("A".$line, "accepted by");
		$sheet->setCellValue("B".$line, $_SESSION['user_id']);
		$sheet_edit->setCellValue('A4', "served by");
		$sheet_edit->setCellValue('B4', $_SESSION['user_id']);
	}

	$title = $row["service_type"]."_".$ts_id."_".time();
	$writer = new Xlsx($spreadsheet);
	$file = "text/notifications/".$title.".xlsx";
	$writer->save($file);

	$writer2 = new Xlsx($spreadsheet_edit);
	$writer2->save($row["service_details"]);

	$pk = $pks["notification"];
	$sql8 = "SELECT MAX($pk) FROM `notification`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	$sql = "UPDATE `tour_services` SET `status` = 'accepted' WHERE `tour_services`.`ts_id` = '$ts_id'";
	$result = mysqli_query($con, $sql);

	$sql = "INSERT INTO `notification` (`notification_id`, `user_id`, `notification_type`, `notification_file`, `status`, `notification_time`) VALUES ('$pk_val', '$user_id', '{$row["service_type"]}', '$file', 'unseen', CURRENT_TIMESTAMP)"; //Insert Query

	$result = mysqli_query($con, $sql);
	if($result){?>
		<a href="business_profile.php"><button class="btn-success">প্রোফাইলে যান</button></a>
	<?php }


?>

<?php 
	include "footer.php";
?>