<?php
include 'header.php';
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if (!$flag) {
	header("Location: login.php?error=100");
} else {
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$obj = new bangla_converter();
	/*
	$file = "services/".$_GET["service"]."_".$_SESSION['user_id']."_".time();
	$sql = "INSERT INTO `tour_services` (`ts_id`, `tour_id`, `service_type`, `service_details`, `status`) VALUES (NULL, '{$_GET["id"]}', '{$_GET["service"]}', '$file', 'pending')";
	$result = mysqli_query($con, $sql);
	*/
	if ($_GET["service"]=="guide"){
		$sheet->setTitle("Guide");
		$sheet->setCellValue("A1", "Places to Visit");
		$sheet->setCellValue("B1", $_POST["places_to_visit"]);

		$sheet->setCellValue("A2", "Experience");
		$sheet->setCellValue("B2", $_POST["experience"]);

		$sheet->setCellValue("A3", "Request Time");
		$sheet->setCellValue("B3", time());

	}else if ($_GET["service"]=="transport"){
		$sheet->setTitle("Transport");
		$sheet->setCellValue("A1", "Car Type");
		$sheet->setCellValue("B1", $_POST["car_type"]);

		$sheet->setCellValue("A2", "Duration");
		$sheet->setCellValue("B2", $_POST["hours"]*6);

		$sheet->setCellValue("A3", "Request Time");
		$sheet->setCellValue("B3", time());
	}else{
		$sheet->setTitle("Food");
		$sql2 = "SELECT food_name, price FROM food_menu";
		$result2 = mysqli_query($con, $sql2);
		
		$item = 1;
		#echo $foods["COUNT(*)"]."<br>";
		while ($foods = mysqli_fetch_assoc($result2)){
			#echo $foods["food_name"]."<br>";
			if ($_POST[$foods["food_name"]]!=0){
				$sheet->setCellValue("A".$item, $foods["food_name"]);
				$sheet->setCellValue("B".$item, $_POST[$foods["food_name"]]);
				$sheet->setCellValue("C".$item, $foods["price"]*$_POST[$foods["food_name"]]);
				$item++;
			}
		}
		$sheet->setCellValue("A".$item, "Request Time");
		$sheet->setCellValue("B".$item, time());

	}
	$file = "text/services/".$_GET["service"]."_".$_SESSION['user_id']."_".time().".xlsx";
	$writer = new Xlsx($spreadsheet);
	$writer->save($file);

	$sql2 = "SELECT went_to from tours WHERE tour_id='{$_GET["id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$district = mysqli_fetch_assoc($result2);
	
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

	$sql = "INSERT INTO `tour_services` (`ts_id`, `tour_id`, `ds_id`, `service_type`, `service_details`, `status`) VALUES ('$pk_val', '{$_GET["id"]}','{$district["went_to"]}', '{$_GET["service"]}', '$file', 'pending')";
	$result = mysqli_query($con, $sql);
	if ($result){
		echo "successful";?>

    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
<?php } else {
	echo "Error: " . $sql . "<br>" . $con->error;
}
?>

<?php
 }
include 'footer.php';
?>