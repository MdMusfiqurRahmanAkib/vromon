<?php
	include "header.php";
?>
	<section class="places text-center">
		<div class="container text-center">
			<h2>বাংলাদেশের সবচেয়ে দর্শনীয় স্থানসমূহ </h2>

		  	<hr/>
			<hr/>
			<p class="why_us col-md-6">
				সবুজ শ্যামল বাংলাদেশের প্রতিটি জেলা জুড়ে আছে এমন কিছু স্থান যা সকল পর্যটকদেরই আকর্ষণের কেন্দ্রবিন্দু। জেলাভিত্তিক পর্যটন কেন্দ্রগুলোর ব্যাপারে জানতে চাইলে নিয়ের মানচিত্র থেকে আপনার পছন্দমত এলাকা সিলেক্ট করুন। 
			</p>

			<div id="map"></div>

			<hr/>
			<hr/>
		</div>
	</section>

	<section class="places">
		<div class="container text-center">
		  	<h2>কোন ঋতুতে কোথায় ঘুরবেন </h2>

		  	<hr/>
			<hr/>
			     
		    <div class="row text-center">
			    <div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/summer.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#">গ্রীষ্ম</a>
				        </div>
				    </div>
				</div>

				<div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/rainy.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#">বর্ষা</a>
				        </div>
				    </div>
				</div>

				<div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/autumn.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#"> শরৎ</a>
				        </div>
				    </div>
				</div>

				<div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/l_autumn.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#">হেমন্ত</a>
				        </div>
				    </div>
				</div>

				<div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/winter.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#">শীত</a>
				        </div>
				    </div>
				</div>

				<div class="season col-lg-4 col-md-4 col-sm-6 col-xs-12">
				    <div class="hovereffect">
				        <img class="img-thumbnail" src="images/spring.jpg" alt="">
				        <div class="overlay">
				            <a class="info" href="#">বসন্ত</a>
				        </div>
				    </div>
				</div>
			</div>


		</div>
	</section>
	<!-- end-container -->

<?php
	include 'footer.php';
?>