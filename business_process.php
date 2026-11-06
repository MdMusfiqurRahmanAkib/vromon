<?php
//include database configuration file
session_start();
ob_start();
include 'inc/db.php';
include "number_converter.php";
require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$obj = new bangla_converter();
$id = $_GET["id"];

$service_history = new Spreadsheet();
$sheet1 = $service_history->getActiveSheet();

$reviews = new Spreadsheet();
$sheet2 = $reviews->getActiveSheet();

if ($id <= 2) {
	$name = $_POST["name"];
	$address = $_POST["address"];
	$income = $_POST["income"];
	$bank = $_POST["bank"];
	$account = $_POST["account"];
	$type = ($id == 1 ? "VC" : "Crowdfunding");

	$sql = "INSERT INTO `investment_scheme` (`user_id`, `institution`, `address`, `yearly_income`, `bank`, `account_number`, `investment_type`, `verification`) VALUES ('{$_SESSION['user_id']}', '$name', '$address', '$income', '$bank', '$account', '$type', 'pending')";
} else if ($id == 3) {
	
	$address = $_POST["address"];
	$pc = $_POST["postal_code"];
	echo $pc."<br>";
	$l = strlen($pc);
	$postal_code = "";

	$pk = $pks["homemade_foods"];
	$sql8 = "SELECT MAX($pk) FROM `homemade_foods`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	for ($x = 0; $x < $l; $x++) {

		if ($pc[$x] >= "0" and $pc[$x] <= "9") {
			$postal_code = $postal_code .$obj->en2bn($pc[$x]);
		}
		else{
			$postal_code = $postal_code .$pc[$x];	
		}
		
	}

	$sheet1->setTitle("Homemade Foods");
	$sheet2->setTitle("Homemade Foods");

	$file1 = "text/service_histories/homemade_foods/".$pk_val.".xlsx";
	$file2 = "text/reviews/food_".$pk_val.".xlsx";

	echo $postal_code;

	$food_menu = new Spreadsheet();
	$sheet3 = $food_menu->getActiveSheet();
	$sheet3->setTitle("Menu");

	$file3 = "text/food_menu/".$pk_val.".xlsx";
	
	$x = 1;
	while(1){
		if (empty($_POST["menu_".$x]) or $_POST["menu_".$x]=="") {
			break;
		}
		$sheet3->setCellValue("A".$x, $_POST["menu_".$x]);
		$sheet3->setCellValue("B".$x, $_POST["price_".$x]);
		$x+=1;
	}

	$writer3 = new Xlsx($food_menu);
	$writer3->save($file3);

	$sql = "INSERT INTO `homemade_foods` (`sp_id`,`user_id`,`address`,`postal_code`, `food_menu`,`service_history`, `reviews`) VALUES ('$pk_val','{$_SESSION['user_id']}', '$address', '$postal_code', '$file3', '$file1', '$file2')";
	
	
} else if ($id == 4) {
	$name = $_POST["name"];
	$address = $_POST["address"];
	$star = $_POST["star"];
	$website = $_POST["website"];
	$pc = $_POST["postal_code"];

	$l = strlen($pc);
	$postal_code = "";

	$pk = $pks["hotels"];
	$sql8 = "SELECT MAX($pk) FROM `hotels`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	for ($x = 0; $x < $l; $x++) {
		$c = $pc[$x];
		if ($pc[$x] >= "0" and $pc[$x] <= "9") {
			$c = $obj->en2bn($pc[$x]);
		}
		$postal_code = $postal_code . $c;
	}

	echo $postal_code;
	$sql = "INSERT INTO `hotels` (`hotel_id`,`user_id`,`name`,`postal_code`,`address`,`star`,`website`) VALUES ('$pk_val','{$_SESSION['user_id']}', '$name','$postal_code','$address', '$star', '$website')";

} else if ($id == 5) {
	$number = $_POST["number"];
	$address = $_POST["address"];
	$category = $_POST["category"];
	$pc = $_POST["postal_code"];

	$l = strlen($pc);
	$postal_code = "";

	$pk = $pks["transports"];
	$sql8 = "SELECT MAX($pk) FROM `transports`";
	$result8 = mysqli_query($con, $sql8);
	if(mysqli_num_rows($result8)<1)
		$pk_val = 1;
	else{
		$row8 = mysqli_fetch_assoc($result8);
		$key = "MAX(".$pk.")";
		$pk_val = $row8[$key]+1;
	}

	for ($x = 0; $x < $l; $x++) {
		$c = $pc[$x];
		if ($pc[$x] >= "0" and $pc[$x] <= "9") {
			$c = $obj->en2bn($pc[$x]);
		}
		$postal_code .= $c;
	}
	
	$sheet1->setTitle("Transport");
	$sheet2->setTitle("Transport");

	$file1 = "text/service_histories/transports/".$pk_val.".xlsx";
	$file2 = "text/reviews/transports_".$pk_val.".xlsx";

	$sql = "INSERT INTO `transports` (`transport_id`, `user_id`,`car_number`,`postal_code`,`address`,`category`, `service_history`, `reviews`) VALUES ('$pk_val','{$_SESSION['user_id']}', '$number','$postal_code','$address', '$category', '$file1', '$file2')";

} else if ($id == 6) {
	$experience = $_POST["experience"];
	$_SESSION['user_id'];

	$sheet1->setTitle("Guide");
	$sheet2->setTitle("Guide");

	$file1 = "text/service_histories/guides/".$_SESSION['user_id'].".xlsx";
	$file2 = "text/reviews/guides_".$_SESSION['user_id'].".xlsx";

	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'docx', 'ppt', 'txt'); // valid extensions
	$path = 'text/guide_cvs/'; // upload directory

	$doc = $_FILES['doc']['name'];
	$tmp = $_FILES['doc']['tmp_name'];

	$ext = strtolower(pathinfo($doc, PATHINFO_EXTENSION));
	$final_doc = $_SESSION['user_id']."_". $doc;

	if (in_array($ext, $valid_extensions)) {
		$path = $path . strtolower($final_doc);
		
		if (move_uploaded_file($tmp, $path)) {

			$sql = "INSERT INTO `guides` (`user_id`,`experience`,`cv`, `postal_code`,`service_history`, `reviews`) VALUES ('{$_SESSION['user_id']}', '$experience', '$path', '{$_SESSION['postal_code']}', '$file1', '$file2')";

			$insert = mysqli_query($con, $sql);

			$ret_val = ($insert) ? 'File Submitted Successfully!' : mysqli_error($con);
			echo $ret_val;
		}
	} else {
		echo 'Invalid File Type!';
	}


	

} else if ($id == 7) {
	$experience = $_POST["experience"];

	$sql = "INSERT INTO `drivers` (`user_id`,`experience`, `license`) VALUES ('{$_SESSION['user_id']}', '$experience',$license)";

}


$sheet1->setCellValue("A1", "END");
$sheet2->setCellValue("A1", "END");

$writer1 = new Xlsx($service_history);
$writer2 = new Xlsx($reviews);

$writer1->save($file1);
$writer2->save($file2);
if ($id != 6){
	$result = mysqli_query($con, $sql);

	if ($result) {
		echo "successful";?>

	    <a href="profile.php"><button class="success">প্রোফাইলে যান</button></a>
	<?php } else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
}
mysqli_close($con);

?>


