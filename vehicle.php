<?php
    include "header.php";
    if(!$flag){
        header("Location: login.php?error=100");
    }
    else{
?>

	<section class="invest_form text-center">
		<div class="container">
			<form class="form-horizontal" role="form" method="POST" action="/register">
		        <div class="row">
		            <div class="col-md-3 col-xs-12"></div>
		            <div class="col-md-6 col-xs-12">
		                <h4>নিচের ফর্মটি পূরণ করুন</h4>
		                <hr>
		            </div>
		        </div>
				
				<div class="row">
		            <div class="col-md-3 col-xs-12 field-label-responsive">
		                <label for="inputState">গাড়ির অবস্থান </label>
		            </div>

		            <div class="col-md-6 col-xs-12">
		                <div class="form-group has-danger">
	                        <?php include "select_city.php";?>
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
		            <div class="col-md-3 col-xs-12 field-label-responsive">
		                <label for="inputState">গাড়ির ধরণ</label>
		            </div>

		            <div class="col-md-6 col-xs-12">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-car" aria-hidden="true"></i></div>

		                        <select class="form-control" id="address">
							      	<option>কার</option>
								    <option>মাইক্রো</option>
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
		            <div class="col-md-3 col-xs-12 field-label-responsive">
		                <label for="name">আপনার গাড়ির নম্বর</label>
		            </div>
		            <div class="col-md-6 col-xs-12">
		                <div class="form-group">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-car"></i></div>
		                        <input type="text" name="name" class="form-control" id="name" placeholder="আপনার গাড়ির নম্বর" required autofocus>
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
		            <div class="col-md-3 col-xs-12"></div>
		            <div class="col-md-6 col-xs-12 text-center">
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