<?php 
	include 'header.php';
	require 'vendor/autoload.php';
	include "simplehtmldom/simple_html_dom.php";
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

	$obj = new bangla_converter();
	$ts_id = $_GET["ts_id"];

	$sql = "SELECT * from tour_services where ts_id='$ts_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $workbook = $reader->load($row["service_details"]);

	#$obj->en2bn
?>
	<table class="table table-striped col-md-6">
		<tbody>
			<?php 
				$tour_id = $workbook->getActiveSheet()->getCell('B1')->getValue();
				#echo $tour_id."<br>";
				
				$sql2 = "SELECT tour_file from tours where tour_id='$tour_id'";
	    		$result2 = mysqli_query($con, $sql2);
	    		$row2 = mysqli_fetch_assoc($result2);
	    		$workbook2 = $reader->load($row2["tour_file"]);
	    		$hotel_link = $workbook2->getActiveSheet()->getCell('B6')->getValue();

	    		$html = file_get_html("https://www.booking.com".$hotel_link);
          		$title =  $html->find(".pp-header__title");
		  		foreach($title as $t){?>
			       <tr>
			       	<td>
			       		হোটেল
			       	</td>
			       	<td><?php echo $t->outertext;?></td>
			       </tr>
			       <?php 
				}
			?>
			<tr>
				<td>
					ঠিকানা
				</td>
				<td>
					<?php 
						$sp_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
						$sql2 = "SELECT address from homemade_foods where sp_id='$sp_id'";
	    				$result2 = mysqli_query($con, $sql2);
	    				$row2 = mysqli_fetch_assoc($result2);
	    				echo $row2["address"];
					?>
				</td>
			</tr>
			<?php
				$line = 3; 
				while(1){
					$item = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
					if($item!=""){?>
						<tr>
							<td><?php echo $item;?></td>
							<td><?php echo $workbook->getActiveSheet()->getCell('B'.$line)->getValue();?> <?php if($item!="মোট বিল"){?>টি <?php }else{?> টাকা<?php }?></td>
						</tr>
					<?php $line+=1; }else{break;}
				}
			?>
			<tr>
				<td><a href="service_accept_action.php?ts_id=<?php echo $ts_id;?>&verdict=accept"><button class="btn-success">গ্রহণ করুন</button></a></td>
				<td><a href="service_accept_action.php?ts_id=<?php echo $ts_id;?>&verdict=reject"><button class="btn-danger">প্রত্যাখ্যান করুন</button></a></td>
			</tr>
		</tbody>
	</table>
<?php
	include 'footer.php';
?>