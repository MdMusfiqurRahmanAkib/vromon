<?php
include "header.php";

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != 1) {
	?>

	<section class="places">
		<div class="container text-center">
			<div id="gmap">
				<div id='gmap_canvas'>

				</div>
				<div>
					<small>
						<a href="https://embedgooglemaps.com/">https://embedgooglemaps.com/</a>
					</small>
				</div>

				<div>
					<small><a href="http://www.kumo-racing.nl/">NYC reisgids</a></small>
				</div>

			</div>
			<!--
			<img src="images/map_location.png" class="img-fluid" alt="Responsive image">
			-->
		</div>
	</section>

	<section class="contact">
		<div class="container text-center">
			<div class="row">
			  	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  		<p><i class="c_icon fas fa-home"></i></p>
			  		<p class="c_title">ঠিকানা</p>
			  		<p class="c_details">জাকির হোসেন রোড, খুলশী, চট্টগ্রাম </p>
			  	</div>

			  	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  		<p><i class="c_icon fas fa-phone"></i></p>
			  		<p class="c_title">ফোন</p>
			  		<p class="c_details">০১২৩৪৫৬৭৮৯১</p>
			  	</div>

			  	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			  		<p><i class="c_icon fas fa-envelope"></i></p>
			  		<p class="c_title">ই-মেইল</p>
			  		<p class="c_details">vromon@gmail.com</p>
			  	</div>
			</div>

		</div>
	</section>
	<!-- end-container -->
<?php }
if (!$flag) {
	?>
	<section class="contact_form">
		<div class="container">
		  	<form action="contact_process.php?id=1" method="post">
			  	<div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="inputEmail4">নাম</label>
				      <input type="email" class="form-control" id="inputEmail4" placeholder="আপনার নাম লিখুন">
				    </div>

				    <div class="form-group col-md-4">
				      <label for="inputEmail4">ই-মেইল</label>
				      <input type="email" class="form-control" id="inputEmail4" placeholder="আপনার ই-মেইল দিন">
				    </div>
			  	</div>

				<div class="form-group ">
				    <label for="exampleFormControlTextarea1">মেসেজ লিখুন / প্রশ্ন করুন</label>
				    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="আপনার মেসেজ লিখুন"></textarea>
				</div>

				<div class="text-center">
			  		<button type="submit" class="btn btn-dark btn-font">সাবমিট</button>

			  	</div>
			</form>
		</div>

	</section>
	<!-- end-container -->
<?php } else {
	?>
	<section class="contact_form">
		<div class="container">
		  	<form action="contact_process.php?id=2" method="post">
				<div class="form-group ">
				    <label for="exampleFormControlTextarea1">মেসেজ লিখুন / প্রশ্ন করুন</label>
				    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="আপনার মেসেজ লিখুন/প্রশ্ন"></textarea>
				</div>

				<div class="text-center">
			  		<button type="submit" class="btn btn-dark btn-font">সাবমিট</button>

			  	</div>
			</form>
		</div>

	</section>
<?php }
include 'footer.php';
?>