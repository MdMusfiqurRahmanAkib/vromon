<?php
include "header.php";
if (!$flag) {
	header("Location: login.php?error=100");
} else {
	$change = $_GET["id"];
	if ($change == 1) {
		?>

<div class="container">
    <form class="form-horizontal" role="form" method="POST">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h3>সতর্কতার খাতিরে আপনার আগের পাসওয়ার্ডটি একবার টাইপ করুন</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">পাসওয়ার্ড</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="পাসওয়ার্ড" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <input id="submit" class="login_register_btn btn btn-success" onclick="password_change_check()" type="button" value="জমা দিন">
            </div>
        </div>

    </form>

</div>
<?php } else if ($change == 11) {
		?>
<div class="container">
    <form class="form-horizontal" role="form" method="POST">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h3>নতুন পাসওয়ার্ড দিন</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">পাসওয়ার্ড</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="পাসওয়ার্ড" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <input id="submit" class="login_register_btn btn btn-success" onclick="password_change()" type="button" value="জমা দিন">
            </div>
        </div>

    </form>

</div>
<?php } else {?>
<section class="places">
	<div class="container">
		<form id="image_form" action="img_process.php" method="post" enctype="multipart/form-data">
		 	<div class="form-group">
		    	<label for="upload_img">ফাইল আপলোড করুন: (শুধুমাত্র .jpg ফাইল অনুমোদিত)</label>
		    	<input id="upload_img" type="file" class="form-control-file" name="doc">
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
}
include "footer.php";
?>