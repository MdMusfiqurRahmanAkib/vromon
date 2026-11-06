<?php
include "header.php";
?>
<div class="signin-form">
    <div class="container">
        <form class="form-horizontal" method="post">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>রেজিস্টার করুন </h2>
                    <hr>
                </div>
            </div>
            <div id="error"></div>
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

            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="username">ইউজারনেম</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="username" class="form-control" id="username" placeholder="ইউজারনেম" required autofocus>
                        </div>
                    </div>
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

            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="nid">এন.আই.ডি.</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="nid" class="form-control" id="nid" placeholder="enter your NID" required>
                        </div>
                    </div>
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

            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">ই-মেইল</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
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

            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">পাসওয়ার্ড</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="পাসওয়ার্ড" required>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-md-3 error_message">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-asterisk"> গুরুত্বপূর্ণ</i>
                        </span>
                    </div>
                </div>
                -->
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">কনফার্ম পাসওয়ার্ড </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input type="password" name="c_password" class="form-control" id="c_password" placeholder="কনফার্ম পাসওয়ার্ড " required>
                        </div>
                    </div>
                </div>
            <!--
                <div class="col-md-3 error_message">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <i class="fa fa-asterisk"> গুরুত্বপূর্ণ</i>
                        </span>
                    </div>
                </div>
            -->
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="address">মোবাইল নম্বর দিন</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-mobile"></i></div>
                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="মোবাইল নম্বর" required autofocus>
                        </div>
                    </div>
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
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="address">ঠিকানা দিন</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map-marker"></i></div>
                            <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                        </div>
                    </div>
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
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="address">পোস্টাল কোড দিন (বাংলায়) </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fab fa-usps"></i></div>
                            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="পোস্টাল কোড বাংলায় লিখুন" required autofocus>
                        </div>
                    </div>
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
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 text-center">
                    <input id="submit" class="login_register_btn btn btn-success" onclick="register_function()" type="button" value="রেজিস্টার">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>