<?php
    include "header.php";
?>
<div class="container">
    <form class="form-horizontal" role="form" method="POST">

        <div class="row">
            <div class="col-md-3"></div>

            <?php if(isset($_GET['error']) && $_GET['error'] === '100' ) : ?>

            <div class="col-md-6 alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> আগে লগইন করুন!</h4>
            </div>

            <?php elseif(isset($_GET['notification']) && $_GET['notification'] === '101' ) : ?>
            <div class="col-md-6 alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> আপনি সফলভাবে লগআউট করেছেন!</h4>

            </div>

            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <h3>লগইন করুন </h3>
                <hr>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">ই-মেইল</label>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required autofocus>
                    </div>
                </div>
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
                <input id="submit" class="login_register_btn btn btn-success" onclick="login_function()" type="button" value="লগইন">
            </div>
        </div>

    </form>
    
</div>

<?php
    include "footer.php";
?>