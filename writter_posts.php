<?php
include "header.php";

$writter_id = $_GET["writter_id"];
$obj = new bangla_converter();
?>

	<section id="blog">
		<div class="container">
			<div class="row">

				<?php

$per_page = 6;

if (isset($_GET['page']) & !empty($_GET['page'])) {
	$cur_page = $_GET['page'];
} else {
	$cur_page = 1;
}
$start = ($cur_page * $per_page) - $per_page;

$all_post = "SELECT * FROM `blog_post` WHERE writter_id ='$writter_id'";
$page_res = mysqli_query($con, $all_post);
$total_res = mysqli_num_rows($page_res);

$end_page = ceil($total_res / $per_page);

$start_page = 1;
$next_page = $cur_page + 1;
$previous_page = $cur_page - 1;

$writter_posts = new database_query("SELECT * FROM `blog_post` WHERE writter_id ='$writter_id' ORDER BY post_date DESC LIMIT $start, $per_page");
$result = $writter_posts->query();

foreach ($result as $post) {

	?>

					<div class = "writter_post text-center col-sm-4 col-md-4">
				      <div class = "thumbnail">
				         <img src = "images/bangladesh_<?php echo rand(1, 15) . ".jpg"; ?>">
				      </div>

				      <div class = "caption">
				      	<h4>মজাদার ভ্রমণ</h4>
				      	<h6>
			      			<?php
$timestamp = $post["post_date"];
	$datetime = new DateTime($timestamp);
	$date = $datetime->format('j F, Y');
	echo $obj->en2bn($date);
	?>
				      	</h6>
				        <p>
				        	<?php
$file_path = "text/blog.docx";
	$myfile = fopen($file_path, "r") or die("Unable to open file!");
	echo fgets($myfile);
	fclose($myfile);
	?>
				        </p>
				        <p class="text-center">
				            <a href = "single_post.php?post_id=<?php echo $post["bp_id"]; ?>" class = "btn btn-dark" role = "button">
				               পড়ুন
				            </a>
				        </p>

				      </div>
				   	</div>

					<?php
}?>

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

					<li class="page-item"><a class="page-link" href="?page=<?php echo $previous_page; ?>&writter_id=<?php echo $post["writter_id"]; ?>"><?php echo $obj->en2bn($previous_page); ?></a></li>

					<?php }?>

					<li class="page-item active"><a class="page-link" href="?page=<?php echo $cur_page; ?>&writter_id=<?php echo $post["writter_id"]; ?>"><?php echo $obj->en2bn($cur_page); ?></a></li>

					<?php if ($cur_page != $end_page) {?>

					<li class="page-item"><a class="page-link" href="?page=<?php echo $next_page; ?>&writter_id=<?php echo $post["writter_id"]; ?>"><?php echo $obj->en2bn($next_page); ?></a></li>

					<li class="page-item">
						<a class="page-link" href="?page=<?php echo $end_page; ?>&writter_id=<?php echo $post["writter_id"]; ?>" aria-label="Next">
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