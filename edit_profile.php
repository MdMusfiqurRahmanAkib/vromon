<?php
include 'header.php';

if (!$flag) {
	header("Location: login.php?error=100");
} else {
	$edit = $_GET["id"];
	if ($edit == 1) {
		?>
<form action="edit_name.php" method="post" enctype="multipart/form-data">
 	<div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">নাম</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                    <input type="text" name="fname" class="form-control" id="fname" placeholder="আপনার প্রথম নাম" required autofocus>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" name="lname" class="form-control" id="lname" placeholder="আপনার শেষ নাম" required autofocus>
                </div>
            </div>
        </div>
        <div class="col-md-3">
	  		<input class="btn btn-success" type="submit" value="জমা দিন">
	  	</div>
        <!--
        <div class="col-md-3 error_message">
            <div class="form-control-feedback">
                <span class="text-danger align-middle">
                    গুরুত্বপূর্ণ
                </span>
            </div>
        </div>
        -->
    </div>

</form>
<?php } else if ($edit == 2) {
		?>
<form action="edit_address.php" method="post" enctype="multipart/form-data">
 	<div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                    <input type="text" name="address" class="form-control" id="fname" placeholder="আপনার ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
        <div class="col-md-3">
	  		<input class="btn btn-success" type="submit" value="জমা দিন">
	  	</div>
    </div>

</form>
<?php } else if ($edit == 3) {
		?>
<form action="edit_mobile.php" method="post" enctype="multipart/form-data">
 	<div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">মোবাইল</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="মোবাইল" required autofocus>
                </div>
            </div>
        </div>
        <div class="col-md-3">
	  		<input class="btn btn-success" type="submit" value="জমা দিন">
	  	</div>
    </div>
</form>
<?php }
}
include 'footer.php';
?>