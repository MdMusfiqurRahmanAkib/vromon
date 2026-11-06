<?php
include "header.php";
$obj = new bangla_converter();
?>
	<section id="review">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 order-lg-2">

	                <div class="review-block-rate">
						<h5>
							<b>রিভিউ দিয়েছেনঃ</b>
							<a href="user_profile.php?profile_id=1">
								Spencer Mills
							</a>
						</h5>
						<br>
						<h5>
				         	৪.৫/৫
			         	</h5>

					</div>

					<div class="review-block-title"><h5>সেরা, পয়সা উসুল !!</h5></div>

					<div class="review-block-description">
					<h6>
						<?php
if ($fh = fopen("text/review.docx", 'r')) {
	while (!feof($fh)) {
		$line = fgets($fh);
		echo $line . "<br><br>";
	}
	fclose($fh);
}
?>
					</h6>
				</div>


			    </div>

		        <div class="col-lg-4 order-lg-1 text-center">
		            <img src="https://picsum.photos/300/250/?image=<?php echo rand(1, 999); ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">
		        </div>
			</div>
		</div>
	</section>
<?php
include "footer.php";
?>
