<?php
include 'header.php';
require 'vendor/autoload.php';
if (!$flag) {
	header("Location: login.php?error=100");
} else {
	$obj = new bangla_converter();
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$not_id = $_GET["notification"];

	$sql = "SELECT * from notification where notification_id='$not_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $workbook = $reader->load($row["notification_file"]);
    
    if($row["notification_type"]=="guide" or $row["notification_type"]=="transport" or $row["notification_type"]=="food"){
    	$ts_id = $workbook->getActiveSheet()->getCell('B1')->getValue();

    	$sql2 = "SELECT * from tour_services where ts_id='$ts_id'";
		$result2 = mysqli_query($con, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$workbook2 = $reader->load($row2["service_details"]);?>
	<h4>আপনার নিম্নলিখিত রিকোয়েস্টটি গৃহীত হয়েছে</h4>
    <table class="table table-striped col-md-6">
    	<?php 
    		if($row["notification_type"]=="food"){
    			$line = 4;
    			while(1){
					$item = $workbook2->getActiveSheet()->getCell('A'.$line)->getValue();
					if($item!=""){?>
						<tr>
							<td><?php echo $item;?></td>
							<td><?php echo $obj->en2bn($workbook2->getActiveSheet()->getCell('B'.$line)->getValue());?> <?php if($item!="মোট বিল"){?>টি <?php }else{?> টাকা<?php }?></td>
						</tr>
					<?php $line+=1; }else{break;}
				}?>
				<tr>
					<td>অর্ডার করা হয়েছে</td>
					<td><?php echo $obj->en2bn(date("j F, Y",$workbook2->getActiveSheet()->getCell('B3')->getValue()));?></td>
				</tr>
    		<?php } else if($row["notification_type"]=="guide"){ ?>
    			<tr>
					<td>গন্তব্য</td>
					<td><?php echo $workbook2->getActiveSheet()->getCell('B1')->getValue();?></td>
				</tr>
				<tr>
					<td>অভিজ্ঞতা</td>
					<td><?php $exp = $workbook2->getActiveSheet()->getCell('B2')->getValue();
						if($exp=="junior"){
							echo "জুনিয়র";
						}else if($exp=="mid"){
							echo "মধ্যম";
						} else{
							echo "সিনিয়র";
						}
					?>
						
					</td>
				</tr>
				<tr>
					<td>সার্ভিস দেবেন</td>
					<td>
					<?php 
						$user_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
						$sql2 = "SELECT * from users where user_id='$user_id'";
						$result2 = mysqli_query($con, $sql2);
						$row2 = mysqli_fetch_assoc($result2);
						echo $row2["fname"]." ".$row2["lname"];
					?>
					</td>
					<td>
						<?php 
							$sql3 = "SELECT reviews from guides where user_id='$user_id'";
							$result3 = mysqli_query($con, $sql3);
							$row3 = mysqli_fetch_assoc($result3);
							$review_file = $row3["reviews"];
						?>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">রিভিউ দেখুন</button>
					</td>
				</tr>
				<tr>
					<td>যোগাযোগ করুন</td>
					<td>
					<?php 
						echo $row2["mobile"];
					?>
					</td>
					
				</tr>
    		<?php } else if($row["notification_type"]=="transport"){ ?>
				<tr>
					<td>গাড়ির ধরণ</td>
					<td><?php $type = $workbook2->getActiveSheet()->getCell('B1')->getValue();
						if($type=="car"){
							echo "গাড়ি";
						}else if($type=="micro"){
							echo "মাইক্রো";
						} else{
							echo "বাইক";
						}
					?>
						
					</td>
				</tr>
				<tr>
					<td>সময়</td>
					<td><?php echo $obj->en2bn($workbook2->getActiveSheet()->getCell('B2')->getValue());?> ঘণ্টা</td>
				</tr>
				<tr>
					<td>বরাদ্দকৃত গাড়ি</td>
					<td>
					<?php 
						$transport_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
						$sql2 = "SELECT * from transports where transport_id='$transport_id'";
						$result2 = mysqli_query($con, $sql2);
						$row2 = mysqli_fetch_assoc($result2);
						echo $row2["car_number"];
					?>
					</td>
					<td>
						<?php 
							$review_file = $row2["reviews"];
						?>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">রিভিউ দেখুন</button>
					</td>
				</tr>
				<tr>
					<td>মালিক</td>
					<td>
					<?php 
						$sql3 = "SELECT * from users where user_id='{$row2["user_id"]}'";
						$result3 = mysqli_query($con, $sql3);
						$row3 = mysqli_fetch_assoc($result3);
						echo $row3["fname"]." ".$row3["lname"];
					?>
					</td>
					
				</tr>
				<tr>
					<td>যোগাযোগ করুন</td>
					<td>
					<?php 
						echo $row3["mobile"];
					?>
					</td>
					
				</tr>
    		<?php }
    	?>
    </table>
    <?php } else if ($row["notification_type"]=="post_decision"){
    	$bp_id = $workbook->getActiveSheet()->getCell('B1')->getValue();
    	$sql2 = "SELECT post_date,post_title from blog_post where bp_id='$bp_id'";
  		$result2 = mysqli_query($con, $sql2);
  		$row2 = mysqli_fetch_assoc($result2);
    	?>
    	<table class="table table-striped col-md-6">
    		<tr>
    			<td>টাইটেল</td>
    			<td><?php 
    				echo $row2["post_title"];
    			?></td>
    		</tr>
    		<tr>
    			<td>জমা দেওয়ার তারিখ</td>
    			<td><?php 
    				echo $obj->en2bn(date("d-m-Y, g:i a", strtotime($row2["post_date"])));
    			?></td>
    		</tr>
    		<tr>
    			<td>সিদ্ধান্ত</td>
    			<td>
    				<?php 
						$decision = $workbook->getActiveSheet()->getCell('B2')->getValue();
						if($decision=="approved"){
							echo "অনুমোদিত";
						}else{
							echo "প্রত্যাখ্যাত";
						}
    				?>
    			</td>
    		</tr>
    		<tr>
    			<td>মন্তব্য</td>
    			<td>
    				<?php 
						echo $workbook->getActiveSheet()->getCell('B3')->getValue();
    				?>
    			</td>
    		</tr>
    		<tr>
    			<td>সিদ্ধান্ত গ্রহণের সময়</td>
    			<td>
    				<?php 
    					echo $obj->en2bn(date("d-m-Y, g:i a", strtotime($workbook->getActiveSheet()->getCell('B4')->getValue())));
    				?>
    			</td>
    		</tr>
    	</table>
    <?php }

    	
    	$sql = "UPDATE `notification` SET `status` = 'seen' WHERE `notification`.`notification_id`='$not_id'";
    	$result = mysqli_query($con, $sql);
    
?>

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
}
include 'footer.php';
?>