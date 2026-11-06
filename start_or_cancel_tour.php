<?php
	$tour_id = $_GET["tour_id"];
	$verdict = $_GET["verdict"];
	include 'header.php';
	require 'vendor/autoload.php';
	$obj = new bangla_converter();
	if (!$flag) {
		header("Location: login.php?error=100");
	} else {
		$obj = new bangla_converter();
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

		$sql = "Select * FROM tours Where tour_id=$tour_id";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$workbook = $reader->load($row["tour_file"]);?>
		<table class="table table-striped">
		<?php $line = 1;
	    while(1){
	        $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
	        if($field!=""){
	            $value = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
	          ?>
	        <tr>
	          <td><?php echo $field;?></td>
	          <td><?php 
	          	if($field=="অবস্থান" or $field=="গন্তব্য"){
	          		$sql2 = "Select ds_name FROM districts Where ds_id=$value";
					$result2 = mysqli_query($con, $sql2);
					$row2 = mysqli_fetch_assoc($result2);
					echo $row2["ds_name"];
	          	}else if($field=="যাত্রার তারিখ" or $field=="চেক ইন" or $field=="চেক আউট"){
	          			echo $obj->en2bn(date("j F, Y", strtotime($value)));
	          	}else{
		          echo $value;
				}
	          ?></td>
	        </tr>
	<?php }else{break;}$line+=1; }?>
	<tr>
	
		<td>
			<a href="tour_decision.php?verdict=<?php echo $verdict;?>&tour_id=<?php echo $tour_id;?>"><button type="button" class="btn btn-<?php if($verdict=="start"){echo "success";}else if($verdict=="cancel"){echo "danger";}?>"><?php if($verdict=="start"){echo "শুরু করুন";}else if($verdict=="cancel"){echo "ক্যান্সেল করুন";}?></button></a>
		</td>
		<td>
			<a href="profile.php"><button type="button" class="btn btn-info">প্রোফাইলে যান</button></a>
		</td>
	</tr>
	</table>
<?php } 

include 'footer.php';
?>