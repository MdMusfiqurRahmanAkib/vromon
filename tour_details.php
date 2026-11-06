<?php
	$tour_id = $_GET["tour_id"];
	include 'header.php';
	require 'vendor/autoload.php';
	include "simplehtmldom/simple_html_dom.php";
	if (!$flag) {
		header("Location: login.php?error=100");
	} else {
		$obj = new bangla_converter();
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

		$sql = "Select * FROM tours Where tour_id=$tour_id";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$workbook = $reader->load($row["tour_file"]);?>
		<table class="table table-striped col-md-6">
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
	          	}else if($field=="হোটেল"){
	          		$html = file_get_html("https://www.booking.com".$value);
	          		$title =  $html->find(".pp-header__title");
			  		foreach($title as $t){
				       echo $t->outertext;
					}
	          	}else{
		          echo $value;
				}
	          ?></td>
	        </tr>
	<?php }else{break;}$line+=1; }?>
	</table>
<?php }
	if($row["status"]=="finished"){
		$sql2 = "Select * FROM tour_services Where tour_id='$tour_id'";
		$result2 = mysqli_query($con, $sql2);
		
		if(mysqli_num_rows($result2)>0){?>
			<h4>ট্যুর চলাকালীন সময়ে নিম্নলিখিত সার্ভিসগুলো নেওয়া হয়েছে</h4>
			<table class="table table-striped col-md-6">
				<thead>
					<th>ধরণ</th>
					<th>সময়</th>
					<th></th>
				</thead>
				<tbody>
					<?php 
						while ($row2 = mysqli_fetch_assoc($result2)){
					?>
					<tr>
						<td><?php if($row2["service_type"]=="guide"){?>
							গাইড
							<?php }else if($row2["service_type"]=="transport"){?>
							যানবাহন
							<?php }else{ ?>
							ঘরোয়া খাবার
							<?php }?>		
						</td>
						<td><?php 
						$workbook = $reader->load($row2["service_details"]);
						echo $obj->en2bn(date('d-m-Y, g:i a', $workbook->getActiveSheet()->getCell('B3')->getValue()));
						?></td>
						<td><a href="tour_service_details.php?id=<?php echo $row2["ts_id"];?>" target=”_blank”><button type="button" class="btn btn-info">বিস্তারিত</button></a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		<?php }
	}
?> 
<?php 
include 'footer.php';
?>