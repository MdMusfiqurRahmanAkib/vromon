<?php 
	include "header.php";
	require 'vendor/autoload.php';
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$ts_id = $_GET['ts_id'];

	$sql = "SELECT * from tour_services where ts_id='$ts_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	#echo $row["tour_id"]."==".$row["ds_id"]."==".$row["service_type"]."==".$row["service_details"]."<br>";
	$workbook = $reader->load($row["service_details"]);

	if($row["service_type"]=="transport"){
		$car_type = $workbook->getActiveSheet()->getCell('B1')->getValue();
		$sql2 =  "SELECT * from transports Where category='$car_type' and status='available' and user_id ='{$_SESSION['user_id']}' and postal_code in (SELECT postal_code FROM `postal_codes` WHERE ds_id='{$row["ds_id"]}')";
		$result2 = mysqli_query($con, $sql2);?>
		<form action="service_accept_action.php?ts_id=<?php echo $ts_id;?>&verdict=accept" method="POST">
			<p>গাড়ি সিলেক্ট করুন</p>
		<?php while ($row2 = mysqli_fetch_assoc($result2)){?>
		  
		  	<input type="radio" id="age1" name="car_number" value="<?php echo $row2["transport_id"];?>">
		  	<label for="age1"><?php echo $row2["car_number"];?></label><br>
	
		<?php }?>
			<input type="submit" value="Submit">
		</form>

	<?php }else if($row["service_type"]=="homemade_foods"){?>
		
	<?php }
?>

<?php 
	include "footer.php";
?>