<?php
	include "header.php";
	$city_name = $_GET["city"];

	$obj = new bangla_converter();
	$city_info =  new database_query("SELECT * FROM `districts` WHERE ds_name ='$city_name'");
	$results = $city_info->query();

	foreach ($results as $city) {
?>
	<section class="places">
		<div class="container text-center">
		  	<h2><?php echo $city["ds_name"];?></h2>

		  	<hr/>
			<hr/>

		    <div class="city_image col-md-10">
				<img src="images/bangladesh_<?php echo rand(1, 15).".jpg";?>" class="img-fluid" alt="Responsive image">
		    </div>

			<hr/>
			<hr/>

		</div>
	</section>
	
	<section class="city_info_rating">
		<div class="container">

		    <div class="row">
				
				<div class="city_map col-md-4 text-center">
					<h4><?php echo $city["ds_name"];?> শহরের মানচিত্র</h4>
					<img src="images/map.jpg" alt="..." class="img-thumbnail">
				</div>

			    <div class="city_info col-md-4 text-center">
					<h4>এক নজরে <?php echo $city["ds_name"];?> এর যাবতীয় গুরুত্বপূর্ণ তথ্য </h4>

					<table class="table table-bordered table-hover">
					  	<tbody>
						    <tr>
						      <td><b>নামঃ</b></td>
						      <td><?php echo $city["ds_name"];?></td>
						    </tr>

						    <tr>
						      <td><b>বিভাগঃ</b></td>
						      <td><?php echo  $obj->en2bn($city["division"]);?></td>
						    </tr>

						    <tr>
						      <td><b>প্রতিষ্ঠাকালঃ</b></td>
						      <td>১৩৪০</td>
						    </tr>

						    <tr>
						      <td><b>আয়তনঃ</b></td>
						      <td>৫২৮৩ বর্গ কিঃমিঃ</td>
						    </tr>

						    <tr>
						      <td><b>জনসংখ্যাঃ</b></td>
						      <td>৩৯,২০,২২২</td>
						    </tr>
					  	</tbody>
					</table>
			    </div>

				<div class="city_rating col-md-4">
					<h4 class="text-center">পর্যটকদের রেটিং</h4>
					   
					<div>
						<h6>দর্শনীয় স্থান</h6>
						<div class="progress">
						  	
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<br>

					<div>
						<h6>আথিতেয়তা</h6>
						<div class="progress">
						  	
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<br>

					<div>
						<h6>আবাসন ব্যবস্থা</h6>
						<div class="progress">
						  	
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 92%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<br>

					<div>
						<h6>যাতায়ত ব্যবস্থা</h6>
						<div class="progress">
						  	
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 82%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<br>

					<div>
						<h6>রেস্টুরেন্ট</h6>
						<div class="progress">
						  	
						  	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 89%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<br>

			    </div>
			</div>
			<hr/>
			<hr/>
			
		</div>
	</section>

	<section class="places">
		<div class="container text-center">
		  	<h2><?php echo $city["ds_name"];?> এর সবচেয়ে আকর্ষণীয় স্থানগুলো</h2>

		  	<hr/>
			<hr/>
			  
		    <div class="row">
			    <div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/patenga.jpg" alt="">
				        <div class="overlay">
				            <h2>দর্শনীয় স্থান ১</h2>
				            <a class="info" href="spot_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/sitakunda.jpg" alt="">
				        <div class="overlay">
				            <h2>দর্শনীয় স্থান ২</h2>
				            <a class="info" href="spot_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/vatiyari.jpg" alt="">
				        <div class="overlay">
				            <h2>দর্শনীয় স্থান ৩</h2>
				            <a class="info" href="spot_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/kaptai.jpg" alt="">
				        <div class="overlay">
				            <h2>দর্শনীয় স্থান ৪</h2>
				            <a class="info" href="spot_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>
			</div>

			<button type="button" class="btn btn-dark btn-font all_button">সব দেখুন</button>
			<hr/>
			<hr/>

		</div>
	</section>
	<!-- end-container -->
	
	<section class="places float-none">
		<div class="container text-center">
		  	<h2>বিখ্যাত হোটেলসমূহ </h2>

		  	<hr/>
			<hr/>
			  
		    <div class="row">
			    <div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/peninsula.jpg" alt="">
				        <div class="overlay">
				            <h2>হোটেল ১</h2>
				            <a class="info" href="hotel_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/well_park.jpg" alt="">
				        <div class="overlay">
				            <h2>হোটেল ২</h2>
				            <a class="info" href="hotel_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/radisson.jpg" alt="">
				        <div class="overlay">
				            <h2>হোটেল ৩</h2>
				            <a class="info" href="hotel_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/seagull.jpg" alt="">
				        <div class="overlay">
				            <h2>হোটেল ৪</h2>
				            <a class="info" href="hotel_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>
			</div>
			
			<button type="button" class="btn btn-dark btn-font all_button">সব দেখুন</button>

			<hr/>
			<hr/>

		</div>
	</section>

	<section class="places float-none">
		<div class="container text-center">
		  	<h2>বিখ্যাত কিছু রেস্টুরেন্ট</h2>

		  	<hr/>
			<hr/>
			  
		    <div class="row">
			    <div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/restaurant_1.jpg" alt="">
				        <div class="overlay">
				            <h2>রেস্টুরেন্ট  ১</h2>
				            <a class="info" href="restaurant_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/restaurant_2.jpg" alt="">
				        <div class="overlay">
				            <h2>রেস্টুরেন্ট  ২</h2>
				            <a class="info" href="restaurant_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/restaurant_3.jpg" alt="">
				        <div class="overlay">
				            <h2>রেস্টুরেন্ট  ৩</h2>
				            <a class="info" href="restaurant_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>

				<div class="mar-img col-lg-3 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/restaurant_4.jpg" alt="">
				        <div class="overlay">
				            <h2>রেস্টুরেন্ট ৪</h2>
				            <a class="info" href="restaurant_details.php">বিস্তারিত</a>
				        </div>
				    </div>
				</div>
			</div>
			
			<button type="button" class="btn btn-dark btn-font all_button">সব দেখুন</button>

		</div>
	</section>

	<section class="places">
		<div class="container text-center">
		  	<h2><?php echo $city["ds_name"];?> ভ্রমণের কিছু অভিজ্ঞতা</h2>

		  	<hr/>
			<hr/>
			
			<div class="row"> 
			    <div class="mar-img col-lg-6 col-md-6 col-sm-12 col-xs-12">

			    	<div class="hovereffect_2 large_post">
				        <img class="img-responsive" src="images/travel_1.jpg" alt="">
				        <div class="overlay_2">
				           <a href="single_post.php?post_id=<?php echo rand(1, 9);?>"><h2>ব্লগ টাইটেল </h2></a>
				           <p>
				           	by: Sadman Abedin
				           </p>
				        </div>
				    </div>
			    </div>

			    <div class="mar-img col-lg-3 col-md-3 col-sm-12 col-xs-12">
			    	
			    	<div class="hovereffect_2 small_post">
				        <img class="img-responsive" src="images/travel_2.jpg" alt="">
				        <div class="overlay_2">
				           <h2><a href="single_post.php?post_id=<?php echo rand(1, 9);?>">ব্লগ টাইটেল </a></h2>
				           <p>
				           	by: Sadman Abedin
				           </p>
				        </div>
				    </div>
					
					<div class="hovereffect_2 small_post">
				        <img class="img-responsive" src="images/travel_3.jpg" alt="">
				        <div class="overlay_2">
				           <h2><a href="single_post.php?post_id=<?php echo rand(1, 9);?>">ব্লগ টাইটেল</a></h2>
				           <p>
				           	by: Sadman Abedin
				           </p>
				        </div>
				    </div>
			    	
			    </div>
				
				<div class="mar-img col-lg-3 col-md-3 col-sm-12 col-xs-12">
			    	<div class="hovereffect_2 small_post">
				        <img class="img-responsive" src="images/travel_4.jpg" alt="">
				        <div class="overlay_2">
				           <h2><a href="single_post.php?post_id=<?php echo rand(1, 9);?>">ব্লগ টাইটেল</a></h2>
				           <p>
				           	by: Sadman Abedin
				           </p>
				        </div>
				    </div>
					
					<div class="hovereffect_2 small_post">
				        <img class="img-responsive" src="images/travel_5.jpg" alt="">
				        <div class="overlay_2">
				           <h2><a href="single_post.php?post_id=<?php echo rand(1, 9);?>">ব্লগ টাইটেল </a></h2>
				           <p>
				           	by: Sadman Abedin
				           </p>
				        </div>
				    </div>
			    </div>
			</div>

			<button type="button" class="btn btn-dark btn-font all_button">সব দেখুন</button>

			<hr/>
			<hr/>
		</div>
	</section>

	<!-- end-container -->

<?php
	}
	include 'footer.php';
?>