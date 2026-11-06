<?php 
	include "header.php";
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$obj = new bangla_converter();
	$ts_id = $_GET["ts_id"];
	$sql = "Select * FROM tour_services Where ts_id='$ts_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $workbook = $reader->load($row["service_details"]);

    if($row["service_type"]=="transport"){
    	$type = $workbook->getActiveSheet()->getCell('B1')->getValue();
    	$time = (int)$workbook->getActiveSheet()->getCell('B2')->getValue();
    	if($type=="car"){
    		$price = 2000;
    	}else{
    		$price = 4000;
    	}
    	$payment = $price*($time/6);
    	$sp_id = $workbook->getActiveSheet()->getCell('B4')->getValue();
    }else if($row["service_type"]=="guide"){
    	$exp = $workbook->getActiveSheet()->getCell('B2')->getValue();
    	
    	if($exp=="junior"){
    		$payment = 2000;
    	}else if($exp=="mid"){
    		$payment = 4000;
    	}else{
    		$payment = 6000;
    	}
    	$sp_id = $workbook->getActiveSheet()->getCell('B4')->getValue();
    }else{
    	$line = 1;
    	while(1){
    		$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
    		if($key==""){
    			break;
    		}
	    	$line+=1;
    	}
    	$payment = (int)$workbook->getActiveSheet()->getCell('B'.($line-1))->getValue();
    	$sp_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
    }
?>
<table class="table table-striped table-bordered col-md-6">
	<tbody>
		<tr>
			<td><?php echo $obj->en2bn($payment);?> টাকা পে করুন</td>
		</tr>
		<form action="review_process.php?type=<?php echo $row["service_type"];?>&id=<?php echo $sp_id;?>&ts_id=<?php echo $ts_id;?>" method="post">
			<tr>
				<td>
					<label for="rating">রেটিং দিন (৫ এর মধ্যে):</label>
					<select id="rating" name="rating">
					  <option value="1">১</option>
					  <option value="2">২</option>
					  <option value="3">৩</option>
					  <option value="4">৪</option>
					  <option value="5">৫</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-outline">
					  <textarea class="form-control" id="textAreaExample1" rows="4" name="review"></textarea>
					  <label class="form-label" for="textAreaExample">রিভিউ লিখুন</label>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" class="btn btn-success" value="জমা দিন">
				</td>
			</tr>
		</form>
	</tbody>
</table>
<?php
	include "footer.php";
?>