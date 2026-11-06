<?php
include "header.php";
if (!$flag) {
	header("Location: login.php?error=100");
} else {

	include 'inc/db.php';
	$change = $_GET["id"];
	if ($change == 1) {?>

<div class="container">
    <h3 class="text-center">যেকোন একটি অপশন সিলেক্ট করুন</h3>
    <div class="row">
        <div class="col-md-3 text-center">
            <a href="business.php?id=11"><button type="button" class="btn btn-primary">VC হিসেবে ইনভেস্ট করুন (বিস্তারিত জানতে ক্লিক করুন)</button></a>
        </div>
        <div class="col-md-3 text-center"></div>
        <div class="col-md-3 text-center">
            <a href="business.php?id=12"><button type="button" class="btn btn-primary">Crowdfunding এ যুক্ত হোন (বিস্তারিত জানতে ক্লিক করুন)</button></a>
        </div>
    </div>

    </form>

</div>
<?php } else if ($change == 11) {
		?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>VC (Venture Capital)</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের উদ্যোগে বিনিয়োগ করার ইচ্ছা পোষণ করার জন্য আপনাকে ধন্যবাদ।
    VC স্কিমের আওতাভুক্ত হয়ে বিনিয়োগ করার জন্য আপনাকে নিম্বলিখিত শর্তাবলী পূরণ করতে হবেঃ
    <br>
    ১/ আপনাকে নূন্যতম ১ কোটি তা তদুর্ধ সম্পত্তির অধিকারী হতে হবে।
    <br>
    ২/ নির্দিষ্ট চুক্তির আওতায় আপনি এককালীন অথবা কিস্তি হিসেবে কমপক্ষে ৫ লক্ষ টাকা থেকে শুরু করে যত খুশী তত বিনিয়োগ করতে পারবেন।
    <br>
    ৩/ আপনার বিনিয়োগকৃত অর্থের বিনিময়ে আমাদের কোম্পানির মোট মূল্যায়নের নির্দিষ্ট একটি শতকরা অংশের অংশীদারিত্ব আপনার থাকবে।

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=111"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=1"><button type="button" class="btn btn-primary">আগের পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 12) {
		?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>Crowdfunding</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের উদ্যোগে বিনিয়োগ করার ইচ্ছা পোষণ করার জন্য আপনাকে ধন্যবাদ।
Crowdfunding স্কিমের আওতাভুক্ত হয়ে বিনিয়োগ করার জন্য আপনাকে নিম্বলিখিত শর্তাবলী পূরণ করতে হবেঃ
    <br>
    ১/ আপনার মাসিক বেতন/আয় নূন্যতম ৩০,০০০ বা তদুর্ধ হতে হবে।
    <br>
    ২/ নির্দিষ্ট চুক্তির আওতায় আপনি এককালীন অথবা কিস্তি হিসেবে কমপক্ষে ৫ হাজার টাকা থেকে শুরু করে যত খুশী তত বিনিয়োগ করতে পারবেন।
    <br>
    ৩/ আপনার বিনিয়োগকৃত অর্থের বিনিময়ে আমাদের কোম্পানির মোট মূল্যায়নের নির্দিষ্ট একটি শতকরা অংশের অংশীদারিত্ব আপনার থাকবে।


            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=121"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=1"><button type="button" class="btn btn-primary">আগের পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 111) {
		?>
<form action="business_process.php?id=1" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার বাৎসরিক আয়</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money"></i></div>
                    <input type="text" name="income" class="form-control" id="income" placeholder="আপনার আয়" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার ব্যবসা প্রতিষ্ঠান/কর্ম প্রতিষ্ঠানের নাম</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-building"></i></div>
                    <input type="text" name="name" class="form-control" id="name" placeholder="নাম" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার ব্যবসা প্রতিষ্ঠান/কর্ম প্রতিষ্ঠানের ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map"></i></div>
                    <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">ব্যাংক অ্যাকাউন্টের তথ্য দিন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-university"></i></div>
                    <select class="form-control" name="bank" id="bank">
                        <option>-- ব্যাংক নির্বাচন করুন --</option>
                        <option value="prime">প্রাইম ব্যাংক</option>
                        <option value="dbbl">ডাচ বাংলা ব্যাংক</option>
                        <option value="islami">ইসলামী ব্যাংক</option>
                        <option value="al_arafah">আল আরাফাহ ইসলামী ব্যাংক</option>
                        <option value="city">সিটি ব্যাংক</option>
                        <option value="bank_asia">ব্যাংক এশিয়া</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">অ্যাকাউন্ট নাম্বার দিন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money-check-alt"></i></div>
                    <input type="text" name="account" class="form-control" id="account" placeholder="অ্যাকাউন্ট নাম্বার" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 121) {?>
<form action="business_process.php?id=2" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার বাৎসরিক আয়</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money"></i></div>
                    <input type="text" name="income" class="form-control" id="income" placeholder="আপনার আয়" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার ব্যবসা প্রতিষ্ঠান/কর্ম প্রতিষ্ঠানের নাম</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-building"></i></div>
                    <input type="text" name="name" class="form-control" id="name" placeholder="নাম" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার ব্যবসা প্রতিষ্ঠান/কর্ম প্রতিষ্ঠানের ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map"></i></div>
                    <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">ব্যাংক অ্যাকাউন্টের তথ্য দিন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-university"></i></div>
                    <select class="form-control" name="bank" id="bank">
                        <option>-- ব্যাংক নির্বাচন করুন --</option>
                        <option value="prime">প্রাইম ব্যাংক</option>
                        <option value="dbbl">ডাচ বাংলা ব্যাংক</option>
                        <option value="islami">ইসলামী ব্যাংক</option>
                        <option value="al_arafah">আল আরাফাহ ইসলামী ব্যাংক</option>
                        <option value="city">সিটি ব্যাংক</option>
                        <option value="bank_asia">ব্যাংক এশিয়া</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">অ্যাকাউন্ট নাম্বার দিন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-money-check-alt"></i></div>
                    <input type="text" name="account" class="form-control" id="account" placeholder="অ্যাকাউন্ট নাম্বার" required autofocus>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 3) {?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>খাদ্য সেবা</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের সাথে যুক্ত হবার ইচ্ছে পোষণ করার জন্য আপনাকে ধন্যবাদ।
                <br>
                <br>
                মাঝে মাঝে শারীরিক অসুস্থতা বা অন্যান্য কারণবশত ট্যুরিস্টরা ঘরোয়া খাবার খেতে পছন্দ করেন, সেক্ষেত্রে আমাদের সিস্টেমের মাধ্যমে দেশের আনাচে কানাচে ছড়িয়ে ছিটিয়ে থাকা রাঁধুনীদের আহ্বান জানাচ্ছি যেন তারা আমাদের মাধ্যমে নিজেদের রান্নার স্বাদ ছড়িয়ে দিতে পারেন এবং সেই সাথে পর্যাপ্ত পরিমাণ অর্থ আয় করে নিতে পারেন।
তবে এক্ষেত্রে নিম্নলিখিত শর্তাবলী পূরণ করা আবশ্যকঃ
                <br>
                <br>
                <br>
                ১/ প্রথমে আপনাকে নির্ধারিত ফর্ম পূরণ করতে হবে যেখানে রান্না করার স্থানের ঠিকানা দিতে হবে
                <br>
                <br>
                ২/ লিখিত ঠিকানায় খাবারের মান এবং রন্ধন পরিবেশ ইন্সপেকশন করার জন্য আমাদের পক্ষ থেকে একজনকে পাঠানো হবে যার রিপোর্টের উপর ভিত্তি করে আপনার আবেদন গ্রহণ করার ব্যাপারে সিদ্ধান্ত নেওয়া হবে।
                <br><br>
                ৩/ প্রতি ৩ মাস অন্তর অন্তর ইন্সপেকশন করা হবে মান যাচাই করার জন্য
                <br><br>
                ৪/ খাবারের দাম আমাদের পক্ষ থেকে নির্ধারণ করে দেওয়া হবে।
                <br>
                <br>
                ৫/ ঠিকানা পরিবর্তন করলে নতুন ঠিকানা জানিয়ে দিতে হবে এবং পুনরায় ইন্সপেকশন করা হবে।
                <br>
                <br>
                ৬/ অসন্তোষজনক রিপোর্টের ব্যাপারে আমাদের অবস্থান হলঃ
                <br>
                <br>
                => প্রথম রিপোর্টের ক্ষেত্রে ওয়ার্নিং দেওয়া হবে
                <br>
                => দ্বিতীয় রিপোর্টের ক্ষেত্রে আপনাকে সাময়িক বরখাস্ত করা হবে।
                <br>
                => তৃতীয় রিপোর্টের ক্ষেত্রে আপনার সাথে চুক্তি বাতিল করা হবে, এবং পুনরায় যুক্ত হতে চাইলে আপনাকে পুনরায় আবেদন করতে হবে।
                <br>
                <br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=31"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="index.php"><button type="button" class="btn btn-primary">মূল পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 31) {?>
<form action="business_process.php?id=3" method="post">

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">রন্ধন স্থানের ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map"></i></div>
                    <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="address">ঠিকানার পোস্টাল কোড দিন (বাংলায়) </label>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fab fa-usps"></i></div>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="পোস্টাল কোড বাংলায় লিখুন" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="menu_1" placeholder="খাবারের নাম লিখুন">
                <input type="text" name="price_1" placeholder="দাম লিখুন">
            </div>
        </div>
        <button type="button" class="btn btn-success add">আইটেম যোগ করুন</button> 
        <button type="button" class="btn btn-danger remove">আইটেম বাদ দিন</button>
        
        <div id="new_chq"></div>
        <input type="hidden" value="1" id="total_chq">        
    </div>
    <br>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 2) {?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>হোটেল সেবা</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের সাথে যুক্ত হবার ইচ্ছে পোষণ করার জন্য আপনাকে ধন্যবাদ।
                <br>
                <br>
                আমাদের সিস্টেমের সাথে আপনার হোটেলকে যুক্ত করে কাস্টমারের কাছে পৌঁছানোর রাস্তা সুগম করুন।
তবে এক্ষেত্রে নিম্নলিখিত শর্তাবলী পূরণ করা আবশ্যকঃ
                <br>
                <br>
                <br>
                ১/ প্রথমে আপনাকে নির্ধারিত ফর্ম পূরণ করতে হবে যেখানে হোটেলের ঠিকানা দিতে হবে
                <br>
                <br>
                ২/ লিখিত ঠিকানায় খাবারের মান এবং পরিবেশ ইন্সপেকশন করার জন্য আমাদের পক্ষ থেকে একজনকে পাঠানো হবে যার রিপোর্টের উপর ভিত্তি করে আপনার আবেদন গ্রহণ করার ব্যাপারে সিদ্ধান্ত নেওয়া হবে।
                <br><br>
                ৩/ প্রতি বছর ইন্সপেকশন করা হবে মান যাচাই করার জন্য
                <br><br>
                ৪/ ঠিকানা পরিবর্তন করলে নতুন ঠিকানা জানিয়ে দিতে হবে এবং পুনরায় ইন্সপেকশন করা হবে।
                <br>
                <br>
                ৫/ অসন্তোষজনক রিপোর্টের ব্যাপারে আমাদের অবস্থান হলঃ
                <br>
                <br>
                => প্রথম রিপোর্টের ক্ষেত্রে ওয়ার্নিং দেওয়া হবে
                <br>
                => দ্বিতীয় রিপোর্টের ক্ষেত্রে আপনাকে সাময়িক বরখাস্ত করা হবে।
                <br>
                => তৃতীয় রিপোর্টের ক্ষেত্রে আপনার সাথে চুক্তি বাতিল করা হবে, এবং পুনরায় যুক্ত হতে চাইলে আপনাকে পুনরায় আবেদন করতে হবে।
                <br>
                <br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=21"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="index.php"><button type="button" class="btn btn-primary">মূল পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 21) {
		?>
<form action="business_process.php?id=4" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার হোটেলের নাম</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-building"></i></div>
                    <input type="text" name="name" class="form-control" id="name" placeholder="নাম" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">হোটেলের ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map"></i></div>
                    <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="address">ঠিকানার পোস্টাল কোড দিন (বাংলায়) </label>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fab fa-usps"></i></div>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="পোস্টাল কোড বাংলায় লিখুন" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="website">হোটেলের ওয়েবসাইট লিংক</label>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fab fa-usps"></i></div>
                    <input type="text" name="website" class="form-control" id="website" placeholder="ওয়েবসাইট লিংক দিন" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">হোটেলের ক্যাটাগরী সিলেক্ট করুন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-university"></i></div>
                    <select class="form-control" name="star" id="bank">
                        <option>-- সিলেক্ট করুন --</option>
                        <option value="1">১ সটার</option>
                        <option value="2">২ সটার</option>
                        <option value="3">৩ সটার</option>
                        <option value="4">৪ সটার</option>
                        <option value="5">৫ সটার</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 4) {?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>যানবাহন সেবা</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের সাথে যুক্ত হবার ইচ্ছে পোষণ করার জন্য আপনাকে ধন্যবাদ।
                <br>
                <br>
                ট্যুরিষ্টরা নিজেদের মত করে ঘোরাঘুরি করার জন্য একটি পছন্দসই যানবাহনের প্রয়োজনয়ীতা অনুভব করেন। সেক্ষেত্রে আপনি আপনার যানবাহন আমাদের সিস্টেমের মাধ্যমে ট্যুরিস্টদের ব্যবহারের জন্য উন্মুক্ত করে দিতে পারেন।
তবে এক্ষেত্রে নিম্নলিখিত শর্তাবলী পূরণ করা আবশ্যকঃ
                <br>
                <br>
                <br>
                ১/ প্রথমে আপনাকে নির্ধারিত ফর্মে গাড়ির নম্বর এবং ঠিকানা দিতে হবে।


                <br>
                <br>
                ২/ গাড়ির অবস্থা ইন্সপেকশন করার জন্য আমাদের একজন প্রতিনিধি উক্ত ঠিকানায় যাবেন।
                <br><br>
                ৩/ ফিটনেস রিপোর্ট এবং অন্যান্য আনুষঙ্গিক বিষয়াবলী দেখে চূড়ান্ত সিদ্ধান্ত নেওয়া হবে।
                <br><br>
                ৪/ ঠিকানা পরিবর্তন করলে নতুন ঠিকানা জানিয়ে দিতে হবে।
                <br>
                <br>
                ৫/ বছরে অন্তত একবার গাড়ির অবস্থা যাচাই করা হবে।
                <br>
                <br>
                ৬/ অসন্তোষজনক রিপোর্টের ব্যাপারে আমাদের অবস্থান হলঃ
                <br>
                <br>
                => প্রথম রিপোর্টের ক্ষেত্রে ওয়ার্নিং দেওয়া হবে
                <br>
                => দ্বিতীয় রিপোর্টের ক্ষেত্রে আপনাকে সাময়িক বরখাস্ত করা হবে।
                <br>
                => তৃতীয় রিপোর্টের ক্ষেত্রে আপনার সাথে চুক্তি বাতিল করা হবে, এবং পুনরায় যুক্ত হতে চাইলে আপনাকে পুনরায় আবেদন করতে হবে।
                <br>
                <br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=41"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="index.php"><button type="button" class="btn btn-primary">মূল পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 41) {
		?>
<form action="business_process.php?id=5" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">গাড়ির নম্বর</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-car-side"></i></div>
                    <input type="text" name="number" class="form-control" id="name" placeholder="নম্বর" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">ঠিকানা</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-map"></i></div>
                    <input type="text" name="address" class="form-control" id="address" placeholder="ঠিকানা" required autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="address">ঠিকানার পোস্টাল কোড দিন (বাংলায়) </label>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fab fa-usps"></i></div>
                    <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="পোস্টাল কোড বাংলায় লিখুন" required autofocus>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">গাড়ির ক্যাটাগরী সিলেক্ট করুন</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-car-side"></i></div>
                    <select class="form-control" name="category" id="bank">
                        <option>-- সিলেক্ট করুন --</option>
                        <option value="bike">বাইক</option>
                        <option value="car">কার (৪ সিট)</option>
                        <option value="micro">মাইক্রো (৬ সিট)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 5) {?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>গাইড সেবা</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের সাথে যুক্ত হবার ইচ্ছে পোষণ করার জন্য আপনাকে ধন্যবাদ।
                <br>
                <br>
                নতুন জায়গা ঘুরে দেখার জন্য অনেক ট্যুরিস্টই একজন গাইডের প্রয়োজনয়ীতা অনুভব করেন, সেক্ষেত্রে আপনি গাইড হিসেবে আমাদের সাথে যুক্ত হয়ে সার্ভিস দেওয়ার এবং নিজের আয় করার পথ সুগম করে নিতে পারেন।
                <br>
                <br>
                <br>
                ১/ প্রথমে আপনাকে নির্ধারিত ফর্মে গাইড হিসেবে আপনার কাজের অভিজ্ঞতা উল্লেখ করতে হবে।
                <br>
                <br>
                ২/ আপনার ব্যাপারে পর্যাপ্ত পরিমাণ তথ্য যাচাইয়ের পর আপনাকে নিয়োগ দেওয়ার ব্যাপারে সিদ্ধান্ত নেওয়া হবে।
                <br><br>
                ৩/ অসন্তোষজনক রিপোর্টের ব্যাপারে আমাদের অবস্থান হলঃ
                <br>
                <br>
                => প্রথম রিপোর্টের ক্ষেত্রে ওয়ার্নিং দেওয়া হবে
                <br>
                => দ্বিতীয় রিপোর্টের ক্ষেত্রে আপনাকে সাময়িক বরখাস্ত করা হবে।
                <br>
                => তৃতীয় রিপোর্টের ক্ষেত্রে আপনার সাথে চুক্তি বাতিল করা হবে, এবং পুনরায় যুক্ত হতে চাইলে আপনাকে পুনরায় আবেদন করতে হবে।
                <br>
                <br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=51"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="index.php"><button type="button" class="btn btn-primary">মূল পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 51) {
		?>
<form id="guide_request" action="business_process.php?id=6" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার কত বছরের অভিজ্ঞতা আছে</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-male"></i></div>
                    <select class="form-control" name="experience" id="bank">
                        <option>-- সিলেক্ট করুন --</option>
                        <option value="no experience">অভিজ্ঞতা নেই</option>
                        <option value="junior">১-৩ বছর</option>
                        <option value="mid">৪-৭ বছর</option>
                        <option value="senior">৮ বছরেরও বেশী</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="upload_text">আপনার সিভি আপলোড করুন: (শুধুমাত্র .pdf ফাইল অনুমোদিত)</label>
            <input id="upload_text" type="file" class="form-control-file" name="doc">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php } else if ($change == 6) {?>
<div class="container">
        <hr>
        <hr>
        <h3 class="text-center"><b>ড্রাইভার হিসেবে যোগ দিন</b></h3>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                আমাদের সাথে যুক্ত হবার ইচ্ছে পোষণ করার জন্য আপনাকে ধন্যবাদ।
                <br>
                <br>
                অনেক ট্যুরিস্ট নতুন জায়গায় ঘুরতে এলে ব্যক্তিগতভাবে একটি গাড়ির প্রয়োজনীয়তা অনুভব করেন। কেউ হয়ত নিজেই ড্রাইভ করতে চান, অথবা কেউ একজন ড্রাইভারের জন্য আবেদন করতে পারেন। সেক্ষেত্রে ড্রাইভার হিসেবে আমাদের সাথে যুক্ত হয়ে নিজের আয়ের পথ সুগম করে নিতে পারেন আপনি।
                <br>
                <br>
                <br>
                ১/ প্রথমে আপনাকে নির্ধারিত ফর্মে ড্রাইভার হিসেবে আপনার কাজের অভিজ্ঞতা এবং ড্রাইভিং লাইসেন্স নম্বর উল্লেখ করতে হবে।
                <br>
                <br>
                ২/ আপনার ব্যাপারে পর্যাপ্ত পরিমাণ তথ্য যাচাইয়ের পর আপনাকে নিয়োগ দেওয়ার ব্যাপারে সিদ্ধান্ত নেওয়া হবে।
                <br><br>
                ৩/ অসন্তোষজনক রিপোর্টের ব্যাপারে আমাদের অবস্থান হলঃ
                <br>
                <br>
                => প্রথম রিপোর্টের ক্ষেত্রে ওয়ার্নিং দেওয়া হবে
                <br>
                => দ্বিতীয় রিপোর্টের ক্ষেত্রে আপনাকে সাময়িক বরখাস্ত করা হবে।
                <br>
                => তৃতীয় রিপোর্টের ক্ষেত্রে আপনার সাথে চুক্তি বাতিল করা হবে, এবং পুনরায় যুক্ত হতে চাইলে আপনাকে পুনরায় আবেদন করতে হবে।
                <br>
                <br>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center">
                <a href="business.php?id=61"><button type="button" class="btn btn-primary">আগ্রহী হলে এখানে ক্লিক করুন </button></a>
            </div>
            <div class="col-md-3 text-center"></div>
            <div class="col-md-3 text-center">
                <a href="index.php"><button type="button" class="btn btn-primary">মূল পেজে যান</button></a>
            </div>
        </div>


</div>
<?php } else if ($change == 61) {
		?>
<form action="business_process.php?id=7" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">আপনার কত বছরের অভিজ্ঞতা আছে</label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-male"></i></div>
                    <select class="form-control" name="experience" id="bank">
                        <option>-- সিলেক্ট করুন --</option>
                        <option value="no experience">অভিজ্ঞতা নেই</option>
                        <option value="junior">১-৩ বছর</option>
                        <option value="mid">৪-৭ বছর</option>
                        <option value="senior">৮ বছরেরও বেশী</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-3">
            <input class="btn btn-success" type="submit" value="জমা দিন">
        </div>
    </div>
</form>
<?php }
}
include "footer.php";
?>