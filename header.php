<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
ob_start();

include "inc/db.php";
include 'link.php';
include "database_query.php";
include "number_converter.php";
include "admin/table_description.php";
$flag = false;

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === 'yes') {
	$flag = true;
}

?>

  <body>
  	<section class="banner">
	    <div class="card bg-dark text-white">
		  <img class="card-img" src="images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>" alt="https://picsum.photos/600/450/?image=199">

		  <div class="card-img-overlay container-fluid">

		    <h1 class="card-title text-center"><b>ভ্রমণ</b></h1>

			<div class="nav_buttons">
				<div class="row">

					<div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
			    		<?php if (!$flag): ?>

			    		<a href="login.php"><button type="button" class="login_btn btn btn-dark btn-font">লগইন</button></a>

			    		<a href="register.php"><button type="button" class="btn btn-dark btn-font">রেজিস্টার</button></a>

			    		<?php else: ?>

			    		<a href="profile.php"><button type="button" class="login_btn btn btn-dark btn-font">আপনার প্রোফাইল</button></a>

<?php if ($_SESSION['business_involved'] == "True"): ?>
							<a href="business_profile.php"><button type="button" class="login_btn btn btn-dark btn-font">বিজনেস প্রোফাইল</button></a>
			    		<?php endif;?>

						<a href="write_post.php"><button type="button" class="login_btn btn btn-dark btn-font">আপনার অভিজ্ঞতা শেয়ার করুন</button></a>
						<?php if ($_SESSION['role'] == "admin" or $_SESSION['role'] == "moderator") {?>
							<a href="admin/index2.php"><button type="button" class="login_btn btn btn-dark btn-font">প্যানেলে যান</button></a>
			    		<?php }
endif;?>

			    	</div>

					<div class="col-md-5 col-sm-4 col-lg-6"></div>
					<div class="col-md-3 col-xs-6 col-sm-3 col-lg-3">
<?php 
if($flag){
	$sql = "Select * FROM tours Where user_id={$_SESSION['user_id']} AND (status='pending' OR status='approved' OR status='ongoing')";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount==0){
?>
					
			   	 		<a href="tour_plan.php"><button type="button" class="btn btn-dark btn-font">ভ্রমণ পরিকল্পনা</button></a>
<?php } } ?>
			   	 		<?php if ($flag): ?>
			    		<a href="logout.php"><button type="button" class="login_btn btn btn-dark btn-font">লগ আউট</button></a>
			    		<?php endif;?>

					</div>

				</div>
		    </div>

		    <div id="menu_area" class="menu-area">
			    <div class="container">
			        <div class="row">
			            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
			                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			                <span class="navbar-toggler-icon"></span>
			                </button>

			                <div class="collapse navbar-collapse" id="navbarSupportedContent">

			                    <ul class="navbar-nav mr-auto">
			                        <li class="active"><a href="index.php">মূলপাতা <span class="sr-only">(current)</span></a></li>

			                        <li class="dropdown">
			                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">আমাদের ব্যাপারে</a>
			                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			                            <li><a href="about.php">আমাদের গল্প</a></li>
			                            
			                            </ul>
			                        </li>

									

			                        <li class="dropdown">
			                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ভ্রমণ সহায়িকা</a>
			                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			                            	<li><a href="transport.php">পরিবহন</a></li>
			                            	<li><a href="hotels.php">হোটেল </a></li>
			                            	<li><a href="tour_package.php">ভ্রমণ প্যাকেজ </a></li>
			                            	<li><a href="tour_cancelling.php">ট্যুর ক্যান্সেল পলিসি</a></li>
			                            </ul>
			                        </li>
									<li><a href="blog.php">আমাদের ব্লগ</a></li>
			                        <li><a href="contact.php">যোগাযোগ</a></li>
			                    </ul>
			                </div>
			            </nav>
			        </div>
			    </div>
			</div>

			<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 text-center bn-message btn-font">
				<p>পরিমিত খরচে আরামদায়ক ভ্রমণ</p>
				<button type="button" class="btn btn-dark">বিস্তারিত</button>
			</div>

		  </div>
		</div>
	</section>

	<section class="follow">
		<div class="container">
			<div class="row">
				<h2 class="col-md-6 f-text">আমাদের সাথে থাকুন</h2>
				<div class="col-md-6">
				  	<ul class="social-network social-circle">
	                    <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
	                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
	                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
	                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
	                    <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
	                </ul>
				</div>

			</div>
			<hr/>
			<hr/>
		</div>
	</section>
