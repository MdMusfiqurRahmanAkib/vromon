 <?php
include "header.php";
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$obj = new bangla_converter();
$workbook = $reader->load("text/rules/package_buying_rules.xlsx");
?>
<table class="table table-bordered col-md-6">
	<thead>
		<tr>
			<th>প্যাকেজ ট্যুর ক্যান্সেল করার ক্ষেত্রে নিম্নোক্ত নীতিমালাগুলো অনুসরণীয়</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$line = 1;
			while(1){
				$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
				if($key==""){
					break;
				}
				else {?>
					<tr>
						<td><?php echo $obj->en2bn($line);?>/ <?php echo $workbook->getActiveSheet()->getCell('A'.$line)->getValue();?></td>
					</tr>
				<?php }
				$line+=1;
			}
		?>
		
		
	</tbody>
</table>
<?php 
	$workbook = $reader->load("text/rules/tour_cancel_policy.xlsx");
?>
<br>
<table class="table table-bordered col-md-6">
	<thead>
		<tr>
			<th>ট্যুরিস্ট দ্বারা পরিকল্পিত  ট্যুর ক্যান্সেল করার ক্ষেত্রে নিম্নোক্ত নীতিমালাগুলো অনুসরণীয়</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$line = 1;
			while(1){
				$key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
				if($key==""){
					break;
				}
				else {?>
					<tr>
						<td><?php echo $obj->en2bn($line);?>/ <?php echo $workbook->getActiveSheet()->getCell('A'.$line)->getValue();?></td>
					</tr>
				<?php }
				$line+=1;
			}
		?>
		
		
	</tbody>
</table>
<?php 
	if(isset($_GET["id"])){?>
		<a href="profile.php"><button class="btn btn-success">ফিরে যান</button></a>
		<a href="tour_cancel_process.php?id=<?php echo $_GET["id"];?>"><button class="btn btn-danger">ক্যান্সেল করুন</button></a>
	<?php }
?>
<?php
include 'footer.php';
?>