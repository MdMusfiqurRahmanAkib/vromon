<?php
include 'header.php';
require 'vendor/autoload.php';
if (!$flag) {
	header("Location: login.php?error=100");
} else {
$obj = new bangla_converter();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$tour_id = $_GET["id"];
	?>
	
<div class="row">
	<div class="col-md-12">
	<form action="tour_services_process.php?service=<?php echo $_GET["service"];?>&id=<?php echo $_GET["id"];?>" method="post">

		<?php if($_GET["service"]=="guide"){?>
			<div class="col-md-3">
			  <div class="form-group">
			    <label for="fname">কোথায় যেতে চান?</label>
				<input type="text" id="fname" name="places_to_visit">
			  </div>
		  	</div>
		  	<div class="col-md-3">
			  <div class="form-group">
	            <div class="input-group-addon"><i class="fa-solid fa-location-crosshairs"></i></div>
	            <select class="form-control" name="experience" id="hospital">
	                <option>কীরকম অভিজ্ঞতাসম্পন্ন গাইড চান?</option>
	                <option value="junior">জুনিয়র/দৈনিক ২০০০ টাকা</option>
	                <option value="mid">মিড লেভেল/দৈনিক ৪০০০ টাকা</option>
	                <option value="senior">সিনিয়র/দৈনিক ৬০০০ টাকা</option>
	            </select>
	           </div>
           	</div>
		  <?php } else if($_GET["service"]=="transport"){?>
		  	<div class="col-md-4">
			  <div class="form-group">
	            <div class="input-group-addon" style="width: 2.6rem"><i class="fa-solid fa-location-crosshairs"></i></div>
	            <select class="form-control" name="car_type" id="hospital">
	                <option>কীরকম গাড়ি চান?</option>
	                <option value="car">কার (৪ সিট)/প্রতি ৬ ঘনটায় ২০০০ টাকা</option>
	                <option value="micro">মাইক্রো (৬ সিট)/প্রতি ৬ ঘনটায় ৪০০০ টাকা</option>
	            </select>
	           </div>

	           <div class="form-group">
	            <div class="input-group-addon" style="width: 2.6rem"><i class="fa-solid fa-location-crosshairs"></i></div>
	            <select class="form-control" name="hours" id="hospital">
	                <option>কত সময়ের জন্য চান?</option>
	                <option value="1">৬ ঘণ্টা</option>
	                <option value="2">১২ ঘণ্টা</option>
	                <option value="3">১৮ ঘণ্টা</option>
	                <option value="4">২৪ ঘণ্টা</option>
	            </select>
	           </div>
           	</div>
           <?php } else {
           	$sql = "SELECT went_to FROM `tours` WHERE `tour_id`='$tour_id'";
           	$result = mysqli_query($con, $sql);
           	$row = mysqli_fetch_assoc($result);
           	$ds_id = $row["went_to"];
           	$sql2 = "SELECT * FROM `homemade_foods` WHERE postal_code in (SELECT postal_code FROM postal_codes where `ds_id`='$ds_id') AND `status`='available'";
           	$result2 = mysqli_query($con, $sql2);
           	?>
           	<div class="row">
           	<?php 
           		$index = 0;
           		while ($row2 = mysqli_fetch_assoc($result2)){
           			$review_file = $row2["reviews"];
           			$index+=1;
           	?>
           	<div class="card col-md-3" style="width: 18rem;">
			  <div class="card-body"> 
			    <p class="card-text" style="color: black;"><?php echo $row2["address"];?></p>
			    <a href="food_menu.php?id=<?php echo $row2["sp_id"];?>&tour_id=<?php echo $tour_id;?>" class="btn btn-primary">খাবারের মেন্যু এবং রিভিউ দেখুন</a>
			  </div>
			  
			</div>
           	
           <?php } ?>
           </div>
           <?php } ?>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
</div>
<?php 

?>
	<?php
 }
include 'footer.php';
?>