<?php 
	if(isset($_GET["tour_id"])) {
	    	$tour_id = $_GET["tour_id"];
	} else {
	    $tour_id = "";
	}

	$sp_id = $_GET["id"];
	include 'header.php';
	require 'vendor/autoload.php';
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$sql = "Select * FROM `homemade_foods` Where sp_id='$sp_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	$obj = new bangla_converter();
?>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">রিভিউ দেখুন</button>
<form action="food_order_details.php?tour_id=<?php echo $tour_id;?>&sp_id=<?php echo $sp_id;?>" method="POST">
<table class="table table-striped col-md-6">
	
	<?php 
		$workbook = $reader->load($row["food_menu"]);
		$line =1;
	    $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
	    $line = 1;?>
	    <tbody>
	   <?php while(1){
	        $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
	        if($field!=""){
	            $value = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
	          ?>
	        <tr>
	          <td><?php echo $field;?></td>
	          <td><?php echo $value;?></td>
	          <?php if($tour_id!=""){ ?>
	          <td><input type="text" id="item" name="<?php echo "menu_".$line;?>"></td>
	      	<?php } ?>
	        </tr>
	<?php }else{break;}$line+=1; }?>
	</tbody>
</table>

<?php if($tour_id!=""){ ?>
 <button class="btn-success" type="submit">অর্ডার করুন</button>
<?php } ?>
</form>

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
        	$workbook3 = $reader->load($row["reviews"]);
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
	include 'footer.php';
?>