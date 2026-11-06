<?php
session_start();
ob_start();

include "inc/db.php";
include "link.php";
include "number_converter.php";
include "database_query.php";

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$obj = new bangla_converter();
$id = $_GET["post_id"];
$sql = "SELECT * FROM `blog_post` WHERE bp_id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$workbook = $reader->load($row["like_dislikes"]);
$line = 1;
$like_count = 0;
$dislike_count = 0;
$user_status = "";

while(1){
	$uid = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
	if($uid=="END"){
		break;
	}
	$status = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();

	if($uid==$_SESSION['user_id']){
		$user_status = $status;
	}
	
	$like_count+=($status=="Like");
	$dislike_count+=($status=="Dislike");
	
	$line+=1;
}
echo $user_status;
?>
	<body>

		<section class="single_post">
			<div class="container">
				<div class="row post_description">

					<div class="col-md-8 post_details">
						<div class="post_image text-center">
							<img src="images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>" class="img-fluid" alt="Responsive image">
						</div>

						<div class="post_title text-center"><h3><?php echo $row["post_title"];?></h3>
							<h5><b>লেখক : <a href="user_profile.php?profile_id=<?php echo $row["user_id"]; ?>"></b>
								<?php 
									$sql2 = "SELECT user_id, fname, lname from users where user_id='{$row["user_id"]}'";
									$result2 = mysqli_query($con, $sql2);
									$row2 = mysqli_fetch_array($result2);
									echo $row2["fname"]." ".$row2["lname"];
								?>
							</a></h5>
							<h5>
								<b>প্রকাশিত : </b>
								<?php
echo $obj->en2bn(date("j F, Y", strtotime($row["post_date"])))."<br>";

?>
							</h5>
							<hr>
							<hr>
						</div>

						<div class="post_text">
							<?php

if ($fh = fopen($row["post_file"], 'r')) {
	while (!feof($fh)) {
		$line = fgets($fh);
		echo $line . "<br><br>";
		if ($line == "\n") {
			$image = "images/bangladesh_" . rand(1, 15) . ".jpg";

			echo "<div class=\"text-center\">";
			echo "<img src=" . $image . " class=\"img-fluid\"><br><br>";
			echo "</div>";
		}
	}
	fclose($fh);
}

?>
						</div>
						<div class="like-outer">
						 <div id="like-counter" class="like-area">
						  <ul>
						   <li>
						    <a id="<?php echo $row["bp_id"];?>" class="like_button <?php if($user_status=="Like"){echo "like-active";}?>" style="<?php if($user_status=="Like"){echo "color: yellow; --darkreader-inline-color:#ffff1a;";}else{echo "color: white; --darkreader-inline-color:#e8e6e3;";}?>">
						     <i class="far fa-thumbs-up">পছন্দ </i>
						     <span class="like-no"><?php echo $like_count;?></span>
						    </a>
						   </li>
						   <li>
						    <a id="<?php echo $row["bp_id"];?>" class="dislike_button <?php if($user_status=="Dislike"){echo "like-active";}?>" style="<?php if($user_status=="Dislike"){echo "color: yellow; --darkreader-inline-color:#ffff1a;";}else{echo "color: white; --darkreader-inline-color:#e8e6e3;";}?>">
						     <i class="far fa-thumbs-down">অপছন্দ</i>
						     <span class="dislike-no"><?php echo $dislike_count;?></span>
						    </a>
						   </li>
						  </ul>
						 </div>
						</div>

					</div>

					<div class="col-md-4 right_sidear">
						<div class="post_writter text-center">
							<h5><a href="user_profile.php?profile_id=1">সাদমান আবেদীন</a> এর <a href="writter_posts.php?writter_id=1">সকল আর্টিকেল</a></h5>
						</div>

						<div class="recent_articles">
							<h5><b>সাম্প্রতিক আর্টিকেল সমূহ</b></h5>
							<hr>
							<hr>
							<?php
$recent_posts = new database_query("SELECT * FROM `blog_post` ORDER BY post_date DESC LIMIT 0, 4");

$post_results = $recent_posts->query();
foreach ($post_results as $recent_post) {

	?>
							<div class="mar-img recent_post">

						    	<div class="hovereffect_2 small_post">
							        <img class="img-responsive" src="images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>" alt="">
							        <div class="overlay_2">
							           <h2><a href="?post_id=<?php echo $recent_post["bp_id"]; ?>">মজাদার ভ্রমণ</a></h2>
							           <p>
							           	<b>লেখক</b> : <a href="user_profile.php?profile_id=<?php echo $post["writter_id"]; ?>">সাদমান আবেদীন</a>
							           </p>
							        </div>
							    </div>
						    </div>
							<?php }?>
						</div>

					</div>
					<!--
					<div class="comment_section">
				        <div class="comments col-md-9" id="comments">
				            <h3 class="mb-2">মন্তব্যগুলো</h3>

				            <?php
$post_comments = new database_query("SELECT * FROM `post_comments` WHERE bp_id = 1");
$comments = $post_comments->query();

foreach ($comments as $comment) {
	?>

				            <div class="comment mb-2 row">
				                <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
				                    <a href=""><img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m103.jpg" alt="avatar"></a>
				                </div>

				                <div class="comment-content col-md-11 col-sm-10">
				                    <h6 class="small comment-meta"><a href="#">admin</a> Today, 2:38</h6>
				                    <div class="comment-body">
				                        <p>
				                            <?php
$file_path = $comment["comment_source"];
	$myfile = fopen($file_path, "r") or die("Unable to open file!");
	echo fgets($myfile);
	?>
				                            <br>
				                            <a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>
				                        </p>
				                    </div>
				                </div>

				                <?php
if ($comment["has_reply"]) {
		$comment_id = $comment["comment_id"];

		$comment_replies = new database_query("SELECT * FROM `comment_replies` WHERE comment_id = '$comment_id'");
		$replies = $comment_replies->query();

		foreach ($replies as $reply) {
			?>
				                

				                <div class="comment-reply col-md-11 offset-md-1 col-sm-10 offset-sm-2">
				                    <div class="row">
				                        <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
				                            <a href=""><img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="avatar"></a>
				                        </div>

				                        <div class="comment-content col-md-11 col-sm-10 col-12">
				                            <h6 class="small comment-meta"><a href="#">phildownney</a> Today, 12:31</h6>
				                            <div class="comment-body">
				                                <p>
				                                	<?php
$reply_path = $reply["reply_source"];
			$myreply = fopen($reply_path, "r") or die("Unable to open file!");
			echo fgets($myreply);
			?>
				                                    <br>
				                                    <a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>
				                                </p>
				                            </div>
				                        </div>
				                    </div>
				               </div>
				               
				           	<?php
}
	}
	?>

				            </div>
				            
							<?php }?>
				        </div>

						<div class="col-md-12">
							
							<form  method="POST">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<textarea rows="5" name="comment_content" class="comment_box" placeholder="আপনার মন্তব্য এখানে লিখুন"></textarea>
								<br>
								<br>
								<button name="comment" type="submit" class="btn btn-info"><i class="icon-share"></i>&nbsp;পোস্ট করুন</button>
							</form>
						</div>
					</div>
				-->
				</div>

			</div>

		</section>
<?php
include "footer.php";
?>