<?php
include "header.php";
if (!$flag) {
	header("Location: login.php?error=100");
} else {

	?>
	<section class="places">
		<div class="container">
			<form id="post_form" action="post_process" method="post">
		     	<div class="form-group">
			    	<label for="post_title">পোস্টের টাইটেল: </label>
			    	<input type="text" class="form-control" id="post_title" name="post_title" placeholder="টাইটেল দিন">
			 	</div>


				<!--
				<div class="form-group">
					<label for="check_buttons">ট্যাগ সিলেক্ট করুন :</label>
				    <div id="check_buttons">

				        <label for="hill" class="btn btn-primary check_button">পাহাড় <input type="checkbox" name="tag_list[]" id="hill" class="badgebox"><span class="badge">&check;</span></label>

				        <label for="sea" class="btn btn-primary check_button">সাগর <input type="checkbox" id="sea" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

				        <label for="river" class="btn btn-primary check_button">নদী <input type="checkbox" id="river" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

				        <label for="lake" class="btn btn-primary check_button">হ্রদ <input type="checkbox" id="lake" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

				        <label for="archetype" class="btn btn-primary check_button">পুরাকীর্তি <input type="checkbox" id="archetype" name="tag_list[]" class="badgebox"><span class="badge">&check;</span></label>

					</div>
				</div>
			    --> 
		        <br>
			 	<div class="form-group">
			    	<label for="upload_text">ফাইল আপলোড করুন: (শুধুমাত্র .docx ফাইল অনুমোদিত)</label>
			    	<input id="upload_text" type="file" class="form-control-file" name="doc">
			  	</div>

			  	<div class="form-group">
			  		<input class="btn btn-success" type="submit" value="জমা দিন">
			  	</div>


			</form>

		</div>
	</section>
	<!-- end-container -->


<?php
}
include 'footer.php';
?>