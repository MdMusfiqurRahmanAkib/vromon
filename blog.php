<?php

include "header.php";
$obj = new bangla_converter();
?>

	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

					<div class="search ">
						<div class="input-group mb-3">

						  <input type="text" class="form-control" placeholder="অনুসন্ধান করুন " aria-label="search" aria-describedby="basic-addon1">

						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><a class="nav-link" href="#"><i class="fa fa-search btn-font" aria-hidden="true"></i></a></span>
						  </div>
						</div>
					</div>

					<h4>শহরসমূহ</h4>
					<hr>
					<div class="vertical-menu">
					  	<?php
$district_info = new database_query("SELECT ds_id, ds_name FROM `districts`");
$results = $district_info->query();

foreach ($results as $district) {
	?>
						<a href="#" class="<?php echo ($district["ds_id"] == 1) ? "active" : ""; ?>">

							<?php
echo $district["ds_name"];
	?>

						</a>

						<?php }?>
					</div>

					<div class="archive">
						<h4>আর্কাইভ</h4>
						<hr>
						<div class="form-group">
						    <label for="exampleSelect1"><h5>বছর সিলেক্ট করুন</h5></label>
						    <select class="form-control" id="exampleSelect1">
						      <option>২০১৮</option>
						      <option>২০১৯</option>
						      <option>২০২০</option>
						      <option>২০২১</option>
						    </select>
						</div>

						<div class="form-group">
						    <label for="exampleSelect1"><h5>মাস সিলেক্ট করুন</h5></label>
						    <select class="form-control" id="exampleSelect1">
						      <option>জানুয়ারি</option>
						      <option>ফেব্রুয়ারি</option>
						      <option>মার্চ</option>
						      <option>এপ্রিল</option>
						      <option>মে</option>
						      <option>জুন</option>
						      <option>জুলাই</option>
						      <option>আগস্ট</option>
						      <option>সেপ্টেম্বর</option>
						      <option>অক্টোবর</option>
						      <option>নভেম্বর</option>
						      <option>ডিসেম্বর</option>
						    </select>
						</div>

						<button type="button" class="btn btn-dark">খোঁজ করুন</button>
					</div>

				</div>

				<div class="blog_posts col-sm-6 col-md-4 text-center">

				<?php

$per_page = 6;

if (isset($_GET['page']) & !empty($_GET['page'])) {
	$cur_page = $_GET['page'];
} else {
	$cur_page = 1;
}
$start = ($cur_page * $per_page) - $per_page;

$page_sql = "SELECT * FROM `blog_post`";
$page_res = mysqli_query($con, $page_sql);
$total_res = mysqli_num_rows($page_res);

$end_page = ceil($total_res / $per_page);

$start_page = 1;
$next_page = $cur_page + 1;
$previous_page = $cur_page - 1;

$sql = "SELECT * FROM `blog_post` where `approval`='approved' ORDER BY post_date DESC LIMIT $start, $per_page";

$result = mysqli_query($con, $sql);

while ($post = mysqli_fetch_assoc($result)) {

	?>
					<?php if ($post["bp_id"] % 2 == 1): ?>

					<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>">
				      </div>

				      <div class = "caption">
				      	<h4><?php echo $post["post_title"];?></h4>
				        <p>
				        	<?php
$file_path = $post["post_file"];
	$myfile = fopen($file_path, "r") or die("Unable to open file!");
	echo fgets($myfile);
	fclose($myfile);
	?>
				        </p>
				        <p>
				            <a href = "single_post.php?post_id=<?php echo $post["bp_id"]; ?>" class = "btn btn-dark" role = "button">
				               পড়ুন
				            </a>
				        </p>

				      </div>
				   	</div>

					<?php endif;
}?>
			   	</div>



			   	<div class="blog_posts col-sm-6 col-md-4 text-center">

				<?php
$result = mysqli_query($con, $sql);
while ($post = mysqli_fetch_assoc($result)) {
	?>
					<?php if ($post["bp_id"] % 2 == 0): ?>
					<div class = "blog_post">
				      <div class = "thumbnail">
				         <img src = "images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>">
				      </div>

				      <div class = "caption">
				      	<h4><?php echo $post["post_title"];?></h4>
				        <p>
				        	<?php
$file_path = $post["post_file"];
	$myfile = fopen($file_path, "r") or die("Unable to open file!");
	echo fgets($myfile);
	fclose($myfile);
	?>
				        </p>
				        <p>
				            <a href = "single_post.php?post_id=<?php echo $post["bp_id"]; ?>" class = "btn btn-dark" role = "button">
				               পড়ুন
				            </a>
				        </p>

				      </div>
				   	</div>

					<?php endif;
}?>
			   	</div>

			</div>

			<div class="paging col-md-8">
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-end">

					<?php if ($cur_page != $start_page) {?>

					<li class="page-item">
						<a class="page-link" href="?page=<?php echo $start_page; ?>" tabindex="-1" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						</a>
					</li>

					<?php }?>

					<?php if ($cur_page >= 2) {?>

					<li class="page-item"><a class="page-link" href="?page=<?php echo $previous_page ?>"><?php echo $obj->en2bn($previous_page); ?></a></li>

					<?php }?>

					<li class="page-item active"><a class="page-link" href="?page=<?php echo $cur_page; ?>"><?php echo $obj->en2bn($cur_page); ?></a></li>

					<?php if ($cur_page != $end_page) {?>

					<li class="page-item"><a class="page-link" href="?page=<?php echo $next_page ?>"><?php echo $obj->en2bn($next_page); ?></a></li>

					<li class="page-item">
						<a class="page-link" href="?page=<?php echo $end_page ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						</a>
					</li>

					<?php }?>

				  </ul>
				</nav>
			</div>
		</div>

	</section>

<?php
include "footer.php";
?>