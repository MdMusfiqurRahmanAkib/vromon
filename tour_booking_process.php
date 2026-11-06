<?php
include "header.php";
$obj = new bangla_converter();

foreach ($_POST as $key=>$value) {
	echo htmlspecialchars($key)."=>".htmlspecialchars($value)."<br>";
}
?>
<h5>যাত্রার তথ্যাদি</h5>
<table class="table table-bordered col-md-6">
	<tbody>
		<tr>
			<td>বর্তমান অবস্থান</td>
			<td>
				<?php
					$sql = "SELECT `ds_name` FROM `districts` WHERE `english_name`='{$_GET['source']}'";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($result);
					echo $row["ds_name"];
				?>
			</td>
		</tr>
		<tr>
			<td>গন্তব্য</td>
			<td>
				<?php
					$chars = str_split($_GET['dest']);
					$dist = "";
					foreach($chars as $c){
						if($c=="'"){
							$dist = $dist."\\";
						}
						$dist = $dist.$c;
					}
					#echo $dist;
					$sql = "SELECT `ds_name` FROM `districts` WHERE `english_name`='$dist'";
					$result = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($result);
					echo $row["ds_name"];
				?>
			</td>
		</tr>
		<tr>
			<td>যাত্রার তারিখ</td>
			<td><?php echo $obj->en2bn($_GET['journey_date']);?></td>
		</tr>
		<tr>
			<td>চেক ইন তারিখ</td>
			<td><?php echo $obj->en2bn($_GET['start_date']);?></td>
		</tr>
		<tr>
			<td>চেক আউট তারিখ</td>
			<td><?php echo $obj->en2bn($_GET['end_date']);?></td>
		</tr>
		<tr>
			<td>হোটেল</td>
			<td><?php 
				echo $obj->en2bn($_POST['hotel']);

			?>
			</td>
		</tr>
		<tr>
			<td>যানবাহন</td>
			<td><?php echo $_POST['transport'];?></td>
		</tr>
	</tbody>
</table>
<a href="tour_plan.php"><button type="button" class="btn btn-warning">পরিতবর্তন করুন</button></a>
<a href="payment.php?source=<?php echo $_GET['source'];?>&dest=<?php echo $_GET['dest'];?>&journey_date=<?php echo $_GET['journey_date'];?>&start_date=<?php echo $_GET['start_date'];?>&end_date=<?php echo $_GET['end_date'];?>&transport=<?php echo $_POST['transport'];?>&hotel=<?php echo $_POST['hotel'];?>"><button type="button" class="btn btn-success">সব ঠিক থাকলে পেমেন্ট করুন</button></a>
<?php 
include "footer.php";
?>