<?php
    include "header.php";

    if(!$flag){
        header("Location: login.php?error=100");
    }
    else{
?>

	<section class="invest_form text-center">
		<div class="ccontainer">
			<form class="form-horizontal" role="form" method="POST" action="/register">
		        <div class="row">
		            <div class="col-md-9">
		                <h4>নিচের ফর্মটি পূরণ করুন</h4>
		                <hr>
		            </div>
		        </div>
				
				<div class="row">
		            <div class="col-md-2 col-xs-12 field-label-responsive">
		                <label for="inputState">আপনার অবস্থান </label>
		            </div>

		            <div class="col-md-6 col-xs-12">
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

				<div class="row tourist_spot">
		            <div class="col-md-2 field-label-responsive">
		                <label for="inputState">কোন জায়গাগুলো আপনি ভালভাবে চেনেন?</label>
		            </div>

		            <div class="col-md-6 col-xs-12">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
								
								<div class="col-md-3 col-xs-6">
			                        <div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 
										<label class="form-check-label">
									    	বিছানাকান্দি  
									  	</label>
									</div>

									<div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> 

										<label class="form-check-label">
									    	রাতারগুল 
									  	</label>
									</div>

								</div>

								<div class="col-md-3 col-xs-6">
			                        <div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 
										<label class="form-check-label">
									    	হাম্মাম
									  	</label>
									</div>

									<div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> 
										<label class="form-check-label">
									    	পাংথুমাই
									  	</label>
									</div>
									
								</div>

								<div class="col-md-3 col-xs-6">
			                        <div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"> 
									    <label class="form-check-label">
									    	জাফলং 
									  	</label>
									</div>

									<div class="form-check form-check-inline">
									  
									    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2"> 
									    <label class="form-check-label">
									    	মাধবকুণ্ড
									  	</label>
									</div>
									
								</div>

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
		            <div class="col-md-2 field-label-responsive">
		                <label for="inputState">পূর্বের অভিজ্ঞতা</label>
		            </div>

		            <div class="col-md-6">
		                <div class="form-group has-danger">
		                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
		                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user" aria-hidden="true"></i></div>

		                        <select class="form-control" id="address">
							      	<option>নেই</option>
								    <option>১-৩ বছর</option>
								    <option>৩-৫ বছর</option>
								    <option>৫+ বছর</option>
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
		            <div class="col-md-2 col-xs-12"></div>
		            <div class="col-md-6 col-xs-12 text-center">
		                <a href="#"><button type="submit" class="login_register_btn btn btn-success"><i class="fa fa-user-plus"></i> জমা দিন</button></a>
		            </div>
		        </div>
		    </form>
		</div>
	</section>

<?php
	}	
    include "footer.php";
?>