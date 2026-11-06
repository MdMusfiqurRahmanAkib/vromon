<?php
include 'header.php';
$obj = new bangla_converter();
$table = $_GET["name"];
$primary_key = $_GET["pk"];
$id = $_GET["id"];
$sql = "SELECT * From $table where $primary_key='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
        	<h5>প্রয়োজনীয় তথ্যসমূহ</h5>
        	<?php if ($table == "hotels") {
	?>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>সার্ভিসের ধরণ</td>
						<td>হোটেল</td>
					</tr>
					<tr>
						<td>নাম</td>
						<td><?php echo $row["name"]; ?></td>
					</tr>
					<tr>
						<td>পোস্টাল কোড</td>
						<td><?php echo $row["postal_code"]; ?></td>
					</tr>
					<tr>
						<td>ঠিকানা</td>
						<td><?php echo $row["address"]; ?></td>
					</tr>
					<tr>
						<td>সটার</td>
						<td><?php echo $obj->en2bn($row["star"]); ?></td>
					</tr>
					<tr>
						<td>দরখাস্তের তারিখ</td>
						<td><?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?></td>
					</tr>
				</tbody>
			</table>
			<h5>আপনাকে নিম্নোক্ত তথ্যগুলো ভেরিফাই এবং যাচাই করে এনে নির্ধারিত ফর্ম পূরণ করতে হবে</h5>
			<ul class="list-group">
			  <li class="list-group-item">ঠিকানা</li>
			  <li class="list-group-item">কতদিন ধরে উক্ত ঠিকানায় কর্মরত</li>
			  <li class="list-group-item">মালিকের সকল তথ্য</li>
			  <li class="list-group-item">উল্লিখিত ক্যাটাগরীর যথার্থতা</li>
			  <li class="list-group-item">পরিষ্কার পরিচ্ছন্নতা এবং রন্ধন পরিবেশ</li>
			</ul>
<?php } else if ($table == "homemade_foods") {?>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td>সার্ভিসের ধরণ</td>
						<td>ঘরোয়া খাবার</td>
					</tr>
					<tr>
						<td>পোস্টাল কোড</td>
						<td><?php echo $row["postal_code"]; ?></td>
					</tr>
					<tr>
						<td>ঠিকানা</td>
						<td><?php echo $row["address"]; ?></td>
					</tr>
					<tr>
						<td>দরখাস্তের তারিখ</td>
						<td><?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?></td>
					</tr>
				</tbody>
			</table>
			<h5>আপনাকে নিম্নোক্ত তথ্যগুলো ভেরিফাই এবং যাচাই করে এনে নির্ধারিত ফর্ম পূরণ করতে হবে</h5>
			<ul class="list-group">
			  <li class="list-group-item">ঠিকানা</li>
			  <li class="list-group-item">কতদিন ধরে উক্ত ঠিকানায় অবস্থানরত</li>
			  <li class="list-group-item">মালিকের সকল তথ্য</li>
			  <li class="list-group-item">খাবারের মান</li>
			  <li class="list-group-item">পরিষ্কার পরিচ্ছন্নতা এবং রন্ধন পরিবেশ</li>
			</ul>
			<?php } else if ($table == "transports") {?>
				<table class="table table-bordered">
				<tbody>
					<tr>
						<td>সার্ভিসের ধরণ</td>
						<td>যানবাহন সেবা</td>
					</tr>
					<tr>
						<td>পোস্টাল কোড</td>
						<td><?php echo $row["postal_code"]; ?></td>
					</tr>
					<tr>
						<td>ঠিকানা</td>
						<td><?php echo $row["address"]; ?></td>
					</tr>
					<tr>
						<td>দরখাস্তের তারিখ</td>
						<td><?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?></td>
					</tr>
				</tbody>
			</table>
			<h5>আপনাকে নিম্নোক্ত তথ্যগুলো ভেরিফাই এবং যাচাই করে এনে নির্ধারিত ফর্ম পূরণ করতে হবে</h5>
			<ul class="list-group">
			  <li class="list-group-item">ঠিকানা</li>
			  <li class="list-group-item">গাড়ির কাগজপত্র</li>
			  <li class="list-group-item">মালিকের সকল তথ্য</li>
			  <li class="list-group-item">গাড়ির ফিটনেস</li>
			</ul>
			<?php } else {
	$sql2 = "SELECT * From users where user_id='{$row["user_id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	?>
				<table class="table table-bordered">
				<tbody>
					<tr>
						<td>সার্ভিসের ধরণ</td>
						<td>গাইড সেবা</td>
					</tr>
					<tr>
						<td>নাম</td>
						<td><?php echo $row2["fname"] . " " . $row2["lname"]; ?></td>
					</tr>
					<tr>
						<td>পোস্টাল কোড</td>
						<td><?php echo $row["postal_code"]; ?></td>
					</tr>
					<tr>
						<td>এন.আই.ডি</td>
						<td><?php echo $obj->en2bn($row2["nid"]); ?></td>
					</tr>
					<tr>
						<td>মোবাইল নম্বর</td>
						<td><?php echo $obj->en2bn($row2["mobile"]); ?></td>
					</tr>
					<tr>
						<td>ঠিকানা</td>
						<td><?php echo $row2["address"]; ?></td>
					</tr>
					<tr>
						<td>দরখাস্তের তারিখ</td>
						<td><?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?></td>
					</tr>
				</tbody>
			</table>
			<h5>আপনাকে নিম্নোক্ত তথ্যগুলো ভেরিফাই এবং যাচাই করে এনে নির্ধারিত ফর্ম পূরণ করতে হবে</h5>
			<ul class="list-group">
			  <li class="list-group-item">এন.আই.ডি</li>
			  <li class="list-group-item">কাজের অভিজ্ঞতা</li>
			</ul>
			<?php }?>
			<br>
			<a href="inspection_confirm.php?name=<?php echo $table; ?>&pk=<?php echo $primary_key; ?>&id=<?php echo $id; ?>&ins=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-warning">ইন্সপেকশন করুন</button></a>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>