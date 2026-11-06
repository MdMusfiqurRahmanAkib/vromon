<?php 
	include 'header.php';
	require 'vendor/autoload.php';
	$tour_id = $_GET["tour_id"];
	$sp_id = $_GET["sp_id"];
	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	$sql = "Select food_menu FROM `homemade_foods` Where sp_id='$sp_id'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	#echo $row["food_menu"];

?>
<h4>অর্ডার নিশ্চিত করুন</h4>
<form action="food_order_finalize.php?tour_id=<?php echo $_GET["tour_id"];?>&sp_id=<?php echo $_GET["sp_id"];?>" method="POST">
	<table class="table table-striped col-md-6">
		<?php foreach($_POST as $key => $value){?>
		<?php if($value!=""){?>
		
		<tr>
			<td><?php 
				#echo $key;
				$keys = explode("_",$key);
				$workbook = $reader->load($row["food_menu"]);
				echo $workbook->getActiveSheet()->getCell('A'.$keys[1])->getValue();
			?>
			</td>
			<td><input type="text" id="item" name="<?php echo $key;?>" value="<?php echo $value;?>"></td>
		</tr>
		
	<?php }}?>
	</table>
<button class="btn-success" type="submit">নিশ্চিত করুন</button>
</form>
<?php 
	include 'footer.php';
?>