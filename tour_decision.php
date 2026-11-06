<?php 
	include "inc/db.php";
	require 'vendor/autoload.php';
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$id = $_GET["tour_id"];
	$verdict = $_GET["verdict"];

	if($verdict=="start"){
		$sql = "UPDATE `tours` SET `status` = 'ongoing' WHERE `tours`.`tour_id` = $id";
	}else{
		$sql2 = "SELECT * FROM `tours` WHERE `tour_id`='$id'";
		$result2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_array($result2);
		$amount = $row2["amount"];

		$workbook = $reader->load($row2["tour_file"]);
		
		$journey_date = $workbook->getActiveSheet()->getCell('B3')->getValue();
		
		$diff = round((strtotime($journey_date) - strtotime(date("Y-m-d")))/ (60 * 60 * 24));

		if ($diff>=14){
			$amount-=0;
		}else if ($diff>=10 and diff<=13){
			$amount-=($amount*0.25);
		}else if ($diff>=7 and diff<=9){
			$amount-=($amount*0.5);
		}else if ($diff>=3 and diff<=6){
			$amount-=($amount*0.75);
		}else{
			$amount=0;
		}
		echo $amount;
		$sql = "UPDATE `tours` SET `status` = 'cancelled', `payment` = 'refund', `amount` = '$amount' WHERE `tours`.`tour_id` = $id";
	}

	$result = mysqli_query($con, $sql);
	echo $result;
	if($result){?>
  <a href="profile.php"><button type="submit" class="login_register_btn btn btn-primary"></i>প্রোফাইলে যান</button></a>
<?php }
?>