<?php
include "header.php";
?>


	<section class="contact_form">
		<div class="container">
		  	<form>
			  	<div class="form-row">
				    <div class="form-group col-md-4">
				      <label for="name">নাম</label>
				      <input type="text" class="form-control" id="name" placeholder="আপনার নাম লিখুন">
				    </div>

				    <div class="form-group col-md-4">
				      <label for="mobile">মোবাইল</label>
				      <input type="text" class="form-control" id="mobile" placeholder="আপনার মোবাইল নম্বর দিন">
				    </div>

				    <div class="form-group col-md-4">
				      <label for="email">ই-মেইল</label>
				      <input type="email" class="form-control" id="email" placeholder="আপনার ই-মেইল দিন">
				    </div>
			  	</div>

				<div class="form-group ">
				    <label for="question_area">আপনার প্রশ্ন</label>
				    <textarea class="form-control" id="question_area" rows="3" placeholder="আপনার প্রশ্ন করুন"></textarea>
				</div>

				<div class="text-center">
					<input id="q_submit" class="btn btn-dark btn-font" onclick="question_function()" type="button" value="সাবমিট">
			  	</div>
			</form>
		</div>

	</section>
	<!-- end-container -->

<?php
include 'footer.php';
?>