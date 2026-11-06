<?php 

	include "header.php";
	require 'vendor/autoload.php';
	$obj = new bangla_converter();
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	if (!isset($_GET["tour_id"])){
		/*
		foreach ($_GET as $key=>$value) {
			echo htmlspecialchars($key)."=>".htmlspecialchars($value)."<br>";
		}*/
		$spreadsheet = new Spreadsheet();
	  	$sheet = $spreadsheet->getActiveSheet();

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
		$title = $_SESSION['user_id']."_".$pk_val;
		$sheet->setTitle($title);

		$chars = str_split($_GET['source']);
		$source = "";
		foreach($chars as $c){
			if($c=="'"){
				$source = $source."\\";
			}
			$source = $source.$c;
		}
		$sql8 = "SELECT `ds_id` FROM `districts` WHERE `english_name`='$source'";
		$result8 = mysqli_query($con, $sql8);
		$row8 = mysqli_fetch_assoc($result8);
		$source = $row8["ds_id"];

		$chars = str_split($_GET['dest']);
		$dest = "";
		foreach($chars as $c){
			if($c=="'"){
				$dest = $dest."\\";
			}
			$dest = $dest.$c;
		}

		$sql8 = "SELECT `ds_id` FROM `districts` WHERE `english_name`='$dest'";
		$result8 = mysqli_query($con, $sql8);
		$row8 = mysqli_fetch_assoc($result8);
		$dest = $row8["ds_id"];

		$sheet->setCellValue("A1", "অবস্থান");
		$sheet->setCellValue("B1", $source);

		$sheet->setCellValue("A2", "গন্তব্য");
		$sheet->setCellValue("B2", $dest);

		$sheet->setCellValue("A3", "যাত্রার তারিখ");
		$sheet->setCellValue("B3", $_GET['journey_date']);

		$sheet->setCellValue("A4", "চেক ইন");
		$sheet->setCellValue("B4", $_GET['start_date']);

		$sheet->setCellValue("A5", "চেক আউট");
		$sheet->setCellValue("B5", $_GET['end_date']);

		$sheet->setCellValue("A6", "হোটেল");
		$sheet->setCellValue("B6", $_GET['hotel']);

		$sheet->setCellValue("A7", "পরিবহন");
		$sheet->setCellValue("B7", $_GET['transport']);

		echo $pk." ".$source." ".$dest."<br>";

		$writer = new Xlsx($spreadsheet);
	  	$file = "text/tours/custom_tours/".$title.".xlsx";
	  	$writer->save($file);
	  	$amount = (rand(3,7)*rand(15,25)*100)+3000;
		$sql = "INSERT INTO tours(tour_id, user_id, started_from, went_to, status, payment, tour_type, amount, tour_file) VALUES ('$pk_val','{$_SESSION['user_id']}', '$source', '$dest', 'pending', 'pending', 'custom','$amount','$file')";
		$result = mysqli_query($con, $sql);
		if($result){
			echo "OK!<br>";
		}

		$tour_id = $pk_val;
}
else{
	$tour_id = $_GET["tour_id"];
	$sql = "SELECT amount from tours where tour_id='$tour_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
}
?>

<section class="container">
	<h5>০১৭৪২১৪৬৪৯১ এই নম্বরে <?php echo $obj->en2bn($row["amount"])?> টাকা বিকাশ করুন এবং ট্রান্সেকশন নম্বরটি নিচের খালিঘরে লিখুন। পেমেন্ট সফল হলে আপনাকে মেইলে জানিয়ে দেওয়া হবে।</h5>
	<form action="payment_process.php?tour_id=<?php echo $tour_id;?>" class="form-horizontal" role="form" method="POST">
	  <div class="form-group col-md-3">
	    <label for="exampleInputEmail1">Transaction ID</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="transaction_id" placeholder="Enter the transaction id">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</section>
<?php 
	include "footer.php";
?>