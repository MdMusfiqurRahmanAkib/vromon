<?php
	include "header.php";
	require 'vendor/autoload.php';
	
	$obj = new bangla_converter();
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	
	$ts_id = $_GET["id"];
	$sql = "Select * FROM tour_services Where ts_id='$ts_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	$workbook = $reader->load($row["service_details"]);?>
	<table class="table table-bordered col-md-6">
		<tbody>

	<?php if($row["service_type"]=='food'){
		$sp_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
		$sql2 = "Select * FROM homemade_foods Where sp_id='$sp_id'";
		$result2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
?>
		<tr>
			<td>ঠিকানা</td>
			<td><?php echo $row2["address"];?></td>
			<td><a href="food_menu.php?id=<?php echo $sp_id;?>"><button class="btn btn-info">বিস্তারিত দেখুন</button></a></td>
		</tr>
		<tr>
			<td>সার্ভিস প্রোভাইডার</td>
			<td>
				<?php 
					$sql3 = "Select fname, lname FROM users Where user_id='{$row2["user_id"]}'";
					$result3 = mysqli_query($con, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					echo $row3["fname"]." ".$row3["lname"];
				?>
			</td>
		</tr>
		<tr>
			<td><h4>খাবারের মেন্যু</h4></td>
		</tr>
		<?php 
			$line = 4;
			while(1){
				$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
				if($key!=""){
		?>
			<tr>
				<td><?php echo $key;?></td>
				<td><?php echo $obj->en2bn($workbook->getActiveSheet()->getCell('B'.$line)->getValue());?>  <?php if($key!="মোট বিল"){?>টি <?php }else{?> টাকা<?php }?></td>
			</tr>
	<?php $line+=1;}else{break;}} ?>
<?php } else if($row["service_type"]=='transport'){
		$transport_id = $workbook->getActiveSheet()->getCell('B4')->getValue();
		$sql2 = "Select * FROM transports Where transport_id='$transport_id'";
		$result2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$review_file = $row2["reviews"];
	?>
		<tr>
			<td>গাড়ির ধরণ</td>
			<td><?php 
					$type = $workbook->getActiveSheet()->getCell('B1')->getValue();
					if ($type=="car")
						echo "কার";
					else if ($type=="micro")
						echo "মাইক্রো";
				?>
			</td>
			
		</tr>
		<tr>
			<td>সময়</td>
			<td><?php echo $obj->en2bn($workbook->getActiveSheet()->getCell('B2')->getValue());?> ঘণ্টা</td>
		</tr>
		<tr>
			<td>বরাদ্দকৃত গাড়ি</td>
			<td><?php echo $row2["car_number"];?></td>
			<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">রিভিউ দেখুন</button></td>
		</tr>
		<tr>
			<td>সার্ভিস প্রোভাইডার</td>
			<td>
				<?php 

					$sql3 = "Select fname, lname FROM users Where user_id='{$row2["user_id"]}'";
					$result3 = mysqli_query($con, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					echo $row3["fname"]." ".$row3["lname"];
				?>
			</td>
		</tr>
<?php } else {
		$user_id = $workbook->getActiveSheet()->getCell('B4')->getValue();
		$sql2 = "Select * FROM guides Where user_id='$user_id'";
		$result2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$review_file = $row2["reviews"];
	?>
		<tr>
			<td>জায়গা</td>
			<td><?php echo $workbook->getActiveSheet()->getCell('B1')->getValue();?></td>
		</tr>
		<tr>
			<td>অভিজ্ঞতা</td>
			<td><?php 
					$type = $workbook->getActiveSheet()->getCell('B2')->getValue();
					if ($type=="junior")
						echo "জুনিয়র";
					else if ($type=="mid")
						echo "মিড";
					else
						echo "সিনিয়র";
				?>
			</td>
			
		</tr>
		<tr>
			<td>সার্ভিস প্রোভাইডার</td>
			<td>
				<?php 

					$sql3 = "Select fname, lname FROM users Where user_id='{$row2["user_id"]}'";
					$result3 = mysqli_query($con, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					echo $row3["fname"]." ".$row3["lname"];
				?>
			</td>
			<td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">রিভিউ দেখুন</button></td>
		</tr>
<?php } ?>
		</tbody>
	</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">রিভিউ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
        	$workbook3 = $reader->load($review_file);
        	$line = 1;?>
        	<table class="table table-striped table-bordered">

			<?php while(1){
				$ts_id2 = $workbook3->getActiveSheet()->getCell('A'.$line)->getValue();
				
				if($ts_id2!="END"){?>
					<?php 

						$sql4 = "SELECT tour_id from tour_services where ts_id='$ts_id2'";
						$result4 = mysqli_query($con, $sql4);
						$row4 = mysqli_fetch_assoc($result4);
						$tour_id2 = $row4["tour_id"];

						$sql4 = "SELECT user_id from tours where tour_id='$tour_id2'";
						$result4 = mysqli_query($con, $sql4);
						$row4 = mysqli_fetch_assoc($result4);
						$user_id2 = $row4["user_id"];

						$sql4 = "SELECT fname, lname from users where user_id='$user_id2'";
						$result4 = mysqli_query($con, $sql4);
						$row4 = mysqli_fetch_assoc($result4);
					?>
					<tr>
						<td><?php echo $row4["fname"]." ".$row4["lname"];?></td>
						<td><?php echo $obj->en2bn($workbook3->getActiveSheet()->getCell('B'.$line)->getValue());?>/৫</td>
						<td><?php echo $workbook3->getActiveSheet()->getCell('C'.$line)->getValue();?></td>
					</tr>
				<?php $line+=1; }else{break;}
			}
        ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php 
	include "footer.php";
?>