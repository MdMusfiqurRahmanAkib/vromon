<?php
	include "header.php";
	require 'vendor/autoload.php';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="package_form col-md-4">
					<form action="tour_package.php" method="POST">
				    <div class="plan_form form-group">
					    <label for="exampleSelect1"><h5>কখন যেতে চান?</h5></label>
						    <select class="form-control" id="exampleSelect1" name="month">
						      <option value="january">জানুয়ারি</option>
						      <option value="february">ফেব্রুয়ারি</option>
						      <option value="march">মার্চ</option>
						      <option value="april">এপ্রিল</option>
						      <option value="may">মে</option>
						      <option value="june">জুন</option>
						      <option value="july">জুলাই</option>
						      <option value="august">আগস্ট</option>
						      <option value="september">সেপ্টেম্বর</option>
						      <option value="october">অক্টোবর</option>
						      <option value="november">নভেম্বর</option>
						      <option value="december">ডিসেম্বর</option>
						    </select>
					    </select>
				    </div>
				    <button class="btn btn-dark">খোঁজ করুন</button>
				</form>
				          
				</div>

				   	<?php 
				   		if(isset($_POST['month'])) {
				   			$sql = "SELECT * FROM `tour_packages` WHERE month='{$_POST['month']}'";
				   		}else{
				   			$sql = "SELECT * from tour_packages";
				   		}
				   		$result = mysqli_query($con, $sql);
				   		$item = 1;
				   		while($row = mysqli_fetch_assoc($result)){
				   	?>
				   	<?php if($item!==1 and $item%2==1){?>
				   		<div class="col-md-4">
				   		</div>
				   	<?php }?>
				   	<div class="blog_posts col-sm-6 col-md-4 text-center">
				   	<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/travel_2.jpg">
				      </div>
				      
				      <div class = "caption">
				      	<h4><?php echo $row["title"];
				      	$workbook = $reader->load("text/packages/sample.xlsx");
				      	$line = 1;
				      	while(1){
				      	$field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
				      	if ($line==1){
				      		$duration = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
				      	}
				      	else if ($workbook->getActiveSheet()->getCell('A'.($line+1))->getValue()==""){
				      		$cost = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
				      		break;
				      	}
				      	$line+=1;
				      }
				      	?></h4>
				        <p>
				        	<b>সময়কালঃ</b> <?php echo $duration; ?>
				        	<br>
				        	<b>মূল্যঃ</b> <?php echo $cost; ?>
				        </p>

				        <p>
				            <a href = "tour_package_details.php?id=<?php echo $row["package_id"];?>" class = "btn btn-dark" role = "button">
				               বিস্তারিত  
				            </a>

				            <a href = "tour_package_boking.php?id=<?php echo $row["package_id"];?>" class = "btn btn-dark" role = "button">
				               বুক করুন 
				            </a>
				        </p>
				         
				      </div>
				   	</div>
				   	</div>
				   <?php $item+=1;} ?>
			   	
			   	
			</div>

			<div class="paging col-md-8">
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-end">
				    <li class="page-item disabled">
				      <a class="page-link" href="#" tabindex="-1"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">১</a></li>
				    <li class="page-item"><a class="page-link" href="#">২</a></li>
				    <li class="page-item"><a class="page-link" href="#">৩</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				    </li>
				  </ul>
				</nav>
			</div>	
			</div> <!-- end paging -->

		</div> <!-- end container -->

	</section>

<?php
	include "footer.php";
?>