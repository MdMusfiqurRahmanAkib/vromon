<?php
    include "header.php";
    if(!$flag){
        header("Location: login.php?error=100");
    }
    else{
?>

	<section class="invest_form text-center">
		<div class="col-md-10">
			<form class="form-horizontal" role="form" method="POST" action="/register">
		        <div class="row">
		            <div class="col-md-3"></div>
		            <div class="col-md-6">
		                <h4>নিচের ফর্মটি পূরণ করুন</h4>
		                <hr>
		            </div>
		        </div>
		        
		     	<div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="inputState">আপনার পেশা</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-briefcase"></i></i></div>
		                        <select id="inputState" class="form-control">
						        	<option selected>সিলেক্ট করুন...</option>
						        	<option>ব্যবসায়ী</option>
						        	<option>চাকুরীজীবী</option>
						      	</select>
		                    </div>
		                </div>
		            </div>
		            <!--
		            <div class="col-md-3">
		                <div class="form-control-feedback">
		                    <span class="text-danger align-middle">
		                        <i class="fa fa-close"> Example Error Message</i>
		                    </span>
		                </div>
		            </div>
		            -->
		        </div>
				
				<div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="name">আপনার কর্মপ্রতিষ্ঠানের নাম</label>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-building" aria-hidden="true"></i></div>
		                        <input type="text" name="name" class="form-control" id="name" placeholder="আপনার কর্মপ্রতিষ্ঠানের নাম" required autofocus>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-3">
		                <div class="form-control-feedback">
	                        <span class="text-danger align-middle">
	                            <!-- Put name validation error messages here -->
	                        </span>
		                </div>
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-3 field-label-responsive">
		                <label for="inputState">আপনার বার্ষিক আয় </label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-money" aria-hidden="true"></i></div>
		                        <select id="inputState" class="form-control">
						        	<option selected>সিলেক্ট করুন...</option>
						        	<option>১২,০০,০০০-২০,০০,০০০</option>
						        	<option>২১,০০,০০০-৩০,০০,০০০</option>
						        	<option>৩১,০০,০০০-৫০,০০,০০০</option>
						        	<option>৫১,০০,০০০+</option>
						      	</select>
		                    </div>
		                </div>
		            </div>
		            <!--
		            <div class="col-md-3">
		                <div class="form-control-feedback">
		                    <span class="text-danger align-middle">
		                        <i class="fa fa-close"> Example Error Message</i>
		                    </span>
		                </div>
		            </div>
		            -->
		        </div>

		        <div class="row">
		            <div class="col-md-3"></div>
		            <div class="col-md-6">
		                <a href="invest_success.php"><button type="submit" class="login_register_btn btn btn-success"><i class="fa fa-user-plus"></i> জমা দিন</button></a>
		            </div>
		        </div>
		    </form>
		</div>
	</section>

<?php
    }
    include "footer.php";
?>