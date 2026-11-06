<?php
	include "header.php";
?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="package_form col-md-4">
					
					<div class="plan_form form-group">
					    <label for="destination"><h4>আপনার গন্তব্য :</h4></label>
					    <?php include "select_city.php";?>
				    </div>


				    <button type="button" class="btn btn-dark">খোঁজ করুন</button>       
				</div>

				<div class="blog_posts col-sm-6 col-md-4 text-center">
					<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/travel_1.jpg">
				      </div>
				      
				      <div class = "caption">
				      	<h4>গ্রীষ্মকালীন ভ্রমণ</h4>
				        <p>
				        	<b>সময়কালঃ</b> ৩ দিন, ২ রাত
				        	<br>
				        	<b>মূল্যঃ</b> ৭০০০ টাকা (মাথাপিছু)
				        </p>

				        <p>
				            <a href = "#" class = "btn btn-dark" role = "button">
				               বিস্তারিত  
				            </a>

				            <a href = "#" class = "btn btn-dark" role = "button">
				               বুক করুন 
				            </a>
				        </p>
				         
				      </div>
				   	</div>

				   	<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/travel_3.jpg">
				      </div>
				      
				      <div class = "caption">
				      	<h4>ঈদুল ফিতর</h4>
				      	<p>
				        	<b>সময়কালঃ</b> ৩ দিন, ২ রাত
				        	<br>
				        	<b>মূল্যঃ</b> ৭০০০ টাকা (মাথাপিছু)
				        </p>

				        <p>
				            <a href = "#" class = "btn btn-dark" role = "button">
				               বিস্তারিত  
				            </a>

				            <a href = "#" class = "btn btn-dark" role = "button">
				               বুক করুন 
				            </a>
				        </p>
				         
				      </div>
				   	</div>
			   	</div>

			   	<div class="blog_posts col-sm-6 col-md-4 text-center">
					
					<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/travel_4.jpg">
				      </div>
				      
				      <div class = "caption">
				         <h4>শীতকালীন ভ্রমণ</h4>
				         <p>
				        	<b>সময়কালঃ</b> ৩ দিন, ২ রাত
				        	<br>
				        	<b>মূল্যঃ</b> ৭০০০ টাকা (মাথাপিছু)
				        </p>

				        <p>
				            <a href = "#" class = "btn btn-dark" role = "button">
				               বিস্তারিত  
				            </a>

				            <a href = "#" class = "btn btn-dark" role = "button">
				               বুক করুন 
				            </a>
				        </p>
				         
				      </div>
				   	</div>

				   	<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/travel_5.jpg">
				      </div>
				      
				      <div class = "caption">
				        <h4>ঈদুল আযহা</h4>
				         <p>
				        	<b>সময়কালঃ</b> ৩ দিন, ২ রাত
				        	<br>
				        	<b>মূল্যঃ</b> ৭০০০ টাকা (মাথাপিছু)
				        </p>

				        <p>
				            <a href = "#" class = "btn btn-dark" role = "button">
				               বিস্তারিত  
				            </a>

				            <a href = "#" class = "btn btn-dark" role = "button">
				               বুক করুন 
				            </a>
				        </p>
				         
				      </div>
				   	</div>
			   	</div>
			   	
			</div>

			<div class="paging col-md-8 col-xs-12">
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