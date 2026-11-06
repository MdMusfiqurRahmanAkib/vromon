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
		                <label for="name">আপনার হোটেলের নাম</label>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-hotel"></i></div>
		                        <input type="text" name="name" class="form-control" id="name" placeholder="আপনার হোটেলের নাম" required autofocus>
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
		                <label for="inputState">হোটেলের অবস্থান</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        
		                        <?php include "select_city.php";?>
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
		                <label for="inputState">ধরণ</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-thermometer"></i></div>
		                        <select class="form-control" id="address">
						      		<option>এসি</option>
							      	<option>নন-এসি</option>
							      	<option>উভয়টি</option>
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
		                <label for="inputState">রুম সংখ্যা</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-home"></i></div>
		                        <select class="form-control" id="address">
						      		<option>৪০-৫০</option>
							      	<option>৫১-৬০</option>
							      	<option>৬১-৭০</option>
							      	<option>৭১-৮০</option>
							      	<option>৮১+</option>
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
		                <label for="inputState">কর্মচারী সংখ্যা</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-users"></i></div>
		                        <select class="form-control" id="address">
						      		<option>১০-১৫</option>
							      	<option>১৬-২০</option>
							      	<option>২০-২৫</option>
							      	<option>২৬+</option>
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
		            <div class="col-md-6 text-center">
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