<?php
include "header.php";
require 'vendor/autoload.php';
$obj = new bangla_converter();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$id = $_GET["id"];
$sql = "SELECT * from tour_packages where package_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<section id="package_details">
	<div class="container">

		<div class="row">
		    <div class="col-md-6">
				<div id="demo" class="carousel slide" data-ride="carousel">

				  <!-- Indicators -->
				  <ul class="carousel-indicators">
				    <li data-target="#demo" data-slide-to="0" class="active"></li>
				    <li data-target="#demo" data-slide-to="1"></li>
				    <li data-target="#demo" data-slide-to="2"></li>
				  </ul>

				  <!-- The slideshow -->
				  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img src="images/bandarban.jpg" alt="Los Angeles">
					    </div>
					    <div class="carousel-item">
					      <img src="images/coxs_bazar.jpg" alt="Chicago">
					    </div>
					    <div class="carousel-item">
					      <img src="images/saint_martin.jpg" alt="New York">
					    </div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>

				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>

				</div>

		    </div>
		    <div class="col-md-4">
		    	<h5><b><?php 
                    echo $row["title"];
                    $workbook = $reader->load("text/packages/sample.xlsx");
                    $line = 1;
                        while(1){
                        $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                        if ($line==1){
                            $duration = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                        }
                        else if ($line==3){
                            $location = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                        }
                        else if ($workbook->getActiveSheet()->getCell('A'.($line+1))->getValue()==""){
                            $cost = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                            break;
                        }
                        $line+=1;
                      }
                ?></b></h5>
		    	<br>
		    	<table class="table table-borderless">
				  	<tbody>
					    <tr>
					      <td><b>গন্তব্যস্থলঃ</b></td>
					      <td><?php echo $location; ?></td>
					    </tr>

					    <tr>
					      <td><b>সময়কালঃ</b></td>
					      <td><?php echo $duration; ?></td>
					    </tr>

						<tr>
					      <td><b>মূল্যঃ</b></td>
					      <td><?php echo $cost; ?></td>
					    </tr>

						<tr>
							<td><a href = "#" class = "btn btn-success" role = "button">
				               বুক করুন
				            </a></td>
					      	<td><a href = "tour_package_details.php" class = "btn btn-info" role = "button">
				               প্রশ্ন করুন
				            </a></td>
					    </tr>

				  	</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<section id="package_info">
	<div class="container">
		<div class="col-lg-12 col-md-12">
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a href="" data-target="#tour_details" data-toggle="tab" class="nav-link active">ট্যুর এর বিস্তারিত তথ্য</a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#policies" data-toggle="tab" class="nav-link">নীতিমালা</a>
                </li>

            </ul>
            <div class="tab-content py-4">

                <div class="tab-pane active text-center" id="tour_details">

                    <div class="row">
                        <table class="table table-bordered">
                          <tbody>
                            <?php 
                                $line = 1;
                                while(1){
                                    $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                    if($field!=""){
                                       $value = $workbook->getActiveSheet()->getCell('B'.$line)->getValue(); 
                            ?>
                            <tr>
                              <td><?php echo $field; ?></td>
                              <td><?php echo $value; ?></td>
                            </tr>
                            <?php }else{break;} $line+=1; } ?>
                          </tbody>
                        </table>
                    </div>
                    <!--/row-->
                </div>

                <div class="tab-pane" id="policies"  style="color: black;">
                    <div class="col-md-8">

                        <h5 class="policy_title"><b>প্যাকেজ ক্রয় সংক্রান্তঃ</b></h5>
                        <p class="policy_description"  style="color: black;">
                        <?php 
                            $workbook = $reader->load("text/rules/"."package_buying_rules.xlsx");
                            $line = 1;
                            while(1){
                        $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                        if($field!=""){
                            $rule = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                        ?>
                        
							<?php echo $obj->en2bn($line)."/ ".$rule;?>
							<br>
							<br>
                            <?php }else{break;} $line+=1; } ?>
                        </p>

                        <h5 class="policy_title"><b>ট্যুর সংক্রান্তঃ</b></h5>
                        <p class="policy_description"  style="color: black;">
                        	১/ ট্যুর চলাকালীন সময়ে ম্যানেজারের অনুমতি ছাড়া নির্ধারিত সীমারেখার বাইরে যাওয়া যাবে না। অন্যথায় কোন অনভিপ্রতে দুর্ঘটনার জন্য ম্যানেজার বা কর্তৃপক্ষ দায়ী থাকবে না।
                        	<br>
                        	<br>
							২/ ট্যুর চলাকালীন সময় মানসম্পন্ন খাবার প্রদান করা হবে। কারও যদি সেই খাবার পছন্দ না হয়, তবে তিনি চাইলে নিজ পছন্দমত খাবার কিনে খেতে পারেন, তবে এক্ষেত্রে কর্তৃপক্ষ কোন মূল্য পরিশোধ করবে না।
							<br>
                        	<br>
							৩/ প্রত্যেক কাস্টমারকে খাবারের জন্য কুপন প্রদান করা হবে, খাবার গ্রহণের সময় কুপন প্রদর্শন করা বাধ্যতামূলক।
							<br>
                        	<br>
							৪/ ট্যুর ম্যানেজার ও অন্যান্য কর্মচারী কেবল মাত্র ট্যুর সংক্রান্ত কাজের দায়িত্বে নিয়োজিত। কাস্টমারের কোন ব্যক্তিগত প্রয়োজন সম্পাদনের দায়িত্ব কোন কর্মচারীর নয়। তবে বিশেষ প্রয়োজনে বিবেচনা করা যেতে পারে।
                        </p>

						<h5 class="policy_title"><b>আচরণবিধি সংক্রান্তঃ</b></h5>
						<p class="policy_description"  style="color: black;">
                         	১/ ট্যুর চলাকালীন সময় ম্যানেজার, কর্মচারী বা অন্য কোন কাস্টমারের সাথে বাজে ব্যবহার বিন্দুমাত্র সহ্য করা হবে না। এক্ষেত্রে দোষী ব্যক্তির বিরুদ্ধে যথাযথ ব্যবস্থা গ্রহণ করা হবে, গুরুতর অভিযোগে তার ট্যুর বাতিল করাও হতে পারে। এক্ষেত্রে কোন টাকা ফেরত দেওয়া হবে না।
							<br>
							<br>
                         	২/ কোন কর্মচারী বা কাস্টমারের ব্যাপারে অভিযোগ থাকলে ম্যানেজারকে অবহিত করতে হবে। আর ম্যানেজারের ব্যাপারে কোন অভিযোগ থাকলে ওয়েবসাইটের মেসেজ সেকশনে গিয়ে অভিযোগ পত্র জমা দিতে হবে।
                        </p>
                    </div>
                </div>

                <div class="tab-pane" id="customer_review">
                    <div class="col-md-12 col-lg-12">
                    	<div class="row">
							<div class="col-sm-7 col-md-10">
								<div class="review-block">

									<div class="row">

										<div class="col-sm-3 col-md-3">
											<img src="images/man_1.jpg" class="img-rounded">
											<div class="review-block-name"><a href="#">User 1</a></div>

											<div class="review-block-date">জানুয়ারি ২৯, ২০১৮<br/>১ দিন আগে</div>
										</div>

										<div class="col-sm-9 col-md-6">
											<div class="review-block-rate">
												<p>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star-half"></i>
										        </p>
											</div>

											<div class="review-block-title">সেরা, পয়সা উসুল !!</div>

											<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
										</div>
									</div>

									<hr/>

									<div class="row">
										<div class="col-sm-3 col-md-3">
											<img src="images/man_2.jpg" class="img-rounded">
											<div class="review-block-name"><a href="#">User 3</a></div>

											<div class="review-block-date">জানুয়ারি ২৯, ২০১৮<br/>১ দিন আগে</div>
										</div>

										<div class="col-sm-9 col-md-6">

											<div class="review-block-rate">
												<p>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star-half"></i>
										        </p>
											</div>

											<div class="review-block-title">আনন্দায়ক ভ্রমণ !! </div>
											<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
										</div>

									</div>

									<hr/>

									<div class="row">
										<div class="col-sm-3 col-md-3">
											<img src="images/man_3.jpg" class="img-rounded">
											<div class="review-block-name"><a href="#">User 3</a></div>

											<div class="review-block-date">জানুয়ারি ২৯, ২০১৮<br/>১ দিন আগে</div>
										</div>
										<div class="col-sm-9 col-md-6">
											<div class="review-block-rate">
												<p>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star"></i>
										         	<i class="fas fa-star-half"></i>
										        </p>
											</div>
											<div class="review-block-title">অসাধারণ সার্ভিস !!</div>

											<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>


<?php
include "footer.php";
?>