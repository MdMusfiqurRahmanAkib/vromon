<?php
include 'header.php';
require 'vendor/autoload.php';
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$obj = new bangla_converter();
if (!$flag) {
	header("Location: login.php?error=100");
} else {
	$sql = "SELECT * from hotels where user_id='{$_SESSION['user_id']}'";
	$result_h = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result_h);
	$hotel = False;
	$hf = False;
	$ins = False;
	$guide = False;
	$transport = False;

	if ($rowcount > 0) {
		$hotel = True;
	}

	$sql = "SELECT * from homemade_foods where user_id='{$_SESSION['user_id']}'";
	$result_hf = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result_hf);
	if ($rowcount > 0) {
		$hf = True;
	}

	$sql = "SELECT * from transports where user_id='{$_SESSION['user_id']}'";
	$result_trans = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result_trans);
	if ($rowcount > 0) {
		$transport = True;
	}

	$sql = "SELECT * from guides where user_id='{$_SESSION['user_id']}'";
	$result_guide = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result_guide);
	if ($rowcount > 0) {
		$guide = True;
	}

	$sql = "SELECT * from inspectors where user_id='{$_SESSION['user_id']}'";
	$result_ins = mysqli_query($con, $sql);
	$rowcount = mysqli_num_rows($result_ins);
	if ($rowcount > 0) {
		$ins = True;
	}

	?>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <?php if ($hotel) {?>
                <li class="nav-item">
                    <a href="" data-target="#hotels" data-toggle="tab" class="nav-link">আপনার হোটেলগুলো</a>
                </li>
              <?php }?>
              <?php if ($hf) {?>
                <li class="nav-item">
                    <a href="" data-target="#hf" data-toggle="tab" class="nav-link">ঘরোয়া খাবার</a>
                </li>
              <?php }?>
              <?php if ($guide) {?>
                <li class="nav-item">
                    <a href="" data-target="#guide" data-toggle="tab" class="nav-link">গাইড সেবা</a>
                </li>
              <?php }?>
              <?php if ($transport) {?>
                <li class="nav-item">
                    <a href="" data-target="#transport" data-toggle="tab" class="nav-link">যানবাহন সেবা</a>
                </li>
              <?php }?>
              <?php if ($ins) {?>
                <li class="nav-item">
                    <a href="" data-target="#ins" data-toggle="tab" class="nav-link">ইন্সপেকশন সেবা</a>
                </li>
              <?php }?>
              <?php if ($ins) {?>
                <li class="nav-item">
                    <a href="" data-target="#hotel_ins" data-toggle="tab" class="nav-link">হোটেল ইন্সপেকশন করুন</a>
                </li>
              <?php }?>
              <?php if ($ins) {?>
                <li class="nav-item">
                    <a href="" data-target="#hf_ins" data-toggle="tab" class="nav-link">ঘরোয়া খাবার ইন্সপেকশন করুন</a>
                </li>
              <?php }?>
              <?php if ($ins) {?>
                <li class="nav-item">
                    <a href="" data-target="#transport_ins" data-toggle="tab" class="nav-link">যানবাহন ইন্সপেকশন করুন</a>
                </li>
              <?php }?>
              <?php if ($ins) {?>
                <li class="nav-item">
                    <a href="" data-target="#guide_ins" data-toggle="tab" class="nav-link">গাইডকে ইন্সপেকশন করুন</a>
                </li>
              <?php }?>
            </ul>
            <div class="tab-content py-4">
                <?php if ($hotel) {
		?>
                <div class="tab-pane active" id="hotels">
                    <h5 class="mb-3">অ্যাকটিভ হোটেলসমূহ</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from hotels where user_id='{$_SESSION['user_id']}' AND inspection='done'";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td>নাম</td>
<td>ঠিকানা</td>
<td>সটার</td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
				?>
    <tr>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["address"]; ?></td>
      <td><?php echo $obj->en2bn($row["star"]); ?></td>
      <td>
        <a href="set_unavailable.php?name=hotels&pk=hotel_id&id=<?php echo row["hotel_id"]; ?>; ?>&confirm=0"><button type="button" class="btn btn-warning">বন্ধ রাখুন</button></a>
      </td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">দুঃখিত! আপনার মালিকানাধীন কোন হোটেল এই মূহুর্তে আমাদের সাথে যুক্ত নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                    <h5 class="mb-3">পেন্ডিং হোটেলসমূহ</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from hotels where user_id='{$_SESSION['user_id']}' AND ((inspection='pending') OR (inspection='ongoing'))";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td>নাম</td>
<td>ঠিকানা</td>
<td>সটার</td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
				?>
    <tr>
      <td></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["address"]; ?></td>
      <td><?php echo $obj->en2bn($row["star"]); ?></td>
      <td>
        <a href="admin/delete_record.php?name=hotels&pk=hotel_id&id=<?php echo $row["hotel_id"]; ?>&confirm=0"><button type="button" class="btn btn-danger">মুছে ফেলুন</button></a>
      </td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">আপনার মালিকানাধীন কোন হোটেল এই মূহুর্তে পেন্ডিং নেই</h6>
                      <?php }?>
                    </div>
                </div>
                <?php }?>
                <div class="tab-pane" id="hf">
                    <h5 class="mb-3">আপনার মালিকানাধীন নিম্নলিখিত ঠিকানাগুলো থেকে আমরা ঘরোয়া খাবার নিয়ে থাকি</h5>
                    <h5 class="mb-3">অ্যাকটিভ ঠিকানাসমূহ</h5>
                    <div class="row">
                      <?php $sql_2 = "SELECT * from homemade_foods where user_id='{$_SESSION['user_id']}' AND inspection='done'";
	$result_2 = mysqli_query($con, $sql_2);
	if (mysqli_num_rows($result_2) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  
                                  <th>
<td>ঠিকানা</td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result_2)) {
			?>
    <tr>
      <td><?php echo $row["address"]; ?></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">দুঃখিত! আপনার মালিকানাধীন কোন জায়গা থেকে এই মূকুর্তে আমরা ঘরোয়া খাবার গ্রহণ করছি না</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                    <h5 class="mb-3">পেন্ডিং ঠিকানাসমূহ</h5>
                    <div class="row">
                      <?php $sql_2 = "SELECT * from homemade_foods where user_id='{$_SESSION['user_id']}' AND ((inspection='pending') OR (inspection='ongoing'))";
	$result_2 = mysqli_query($con, $sql_2);
	if (mysqli_num_rows($result_2) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td>ঠিকানা</td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result_2)) {
			?>
    <tr>
      <td></td>
      <td><?php echo $row["address"]; ?></td>
      <td>
        <a href="admin/delete_record.php?name=homemade_foods&pk=sp_id&id=<?php echo $row["sp_id"]; ?>&confirm=0"><button type="button" class="btn btn-danger">মুছে ফেলুন</button></a>
      </td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">আপনার মালিকানাধীন কোন বাসা এই মূহুর্তে পেন্ডিং নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <h5 class="mb-3">খাবারের রিকোয়েস্ট</h5>
                    <div class="row">
                    <table class="table table-striped col-md-6">
                      <?php 
                        $sql_2 = "SELECT * from tour_services where service_type='food' AND status='pending'";
                        $result_2 = mysqli_query($con, $sql_2);
                        while ($row = mysqli_fetch_assoc($result_2)) {
                          $workbook = $reader->load($row["service_details"]);
                          $sp_id = $workbook->getActiveSheet()->getCell('B2')->getValue();
                          $sql_3 = "SELECT user_id from homemade_foods where sp_id='$sp_id'";
                          $result_3 = mysqli_query($con, $sql_3);
                          $row3 = mysqli_fetch_assoc($result_3);
                          if($_SESSION['user_id']==$row3["user_id"]){?>
                            <tr>
                              <td>খাবারের রিকোয়েস্ট আছে</td>
                              <td><a href="view_food_details.php?ts_id=<?php echo $row["ts_id"];?>" target="_blank"><button class="btn-info">মেন্যু দেখুন</button></a></td>
                            </tr>
                          <?php }
                        }?>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="guide">
                    <h5 class="mb-3">আপনার গাইড প্রোফাইল</h5>
                    <div class="row">
                        <div class="col-md-12">
                          <?php

	$row = mysqli_fetch_assoc($result_guide);
	if ($row["inspection"] == "pending") {
		?>
    <h6 class="mb-3">আপনার গাইড হিসেবে যুক্ত হবার রিকোয়েস্ট এই মূহুর্তে পেন্ডিং আছে</h6>
                            <?php } else {?>
                            <table class="table table-striped">
                                <tbody>

                                </tbody>
                            </table>
                          <?php }?>
                        </div>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                    <h5 class="mb-3">গাইডের রিকোয়েস্ট</h5>
                    <div class="row">
                      <?php 
                        $sql = "SELECT * from guides where user_id={$_SESSION['user_id']} AND inspection='done' AND status='available'";
  $result = mysqli_query($con, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $pc = $row['postal_code']; 
      $sql2 = "SELECT ds_id from postal_codes WHERE postal_code='$pc'";
      $result2 = mysqli_query($con, $sql2);
      $district = mysqli_fetch_assoc($result2);
      $ds_id = $district["ds_id"];
      echo $ds_id;
      $sql3 = "SELECT * from tour_services WHERE ds_id='$ds_id' AND service_type='guide' AND status='pending'";
      $result3 = mysqli_query($con, $sql3);
      
      ?>
<div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>গন্তব্যস্থল</b></td>
<td><b>অভিজ্ঞতা</b></td>
                                  </th>
      <?php 
      while($req = mysqli_fetch_assoc($result3)){
        $workbook = $reader->load($req["service_details"]);
        $place = $workbook->getActiveSheet()->getCell('B1')->getValue();
        $exp = $obj->en2bn($workbook->getActiveSheet()->getCell('B2')->getValue());
        
        $sql4 = "SELECT * from guides WHERE user_id='{$_SESSION['user_id']}' AND inspection='done' AND status='available' AND experience='$exp'";
      $result4 = mysqli_query($con, $sql4);                      
      ?>
                      <tr>
      <td></td>
      <td><?php echo $place;?></td>
      <td><a href="service_accept_action.php?ts_id=<?php echo $req["ts_id"];?>&verdict=accept"><button class="info">একসেপ্ট করুন</button></a></td>
    </tr>
                    <?php }?> 
                              </tbody>
                          </table>
                          </div>
                  <?php } ?>
                    <?php } ?>
                    </div>
                    <br>
                    <br>
                </div>

                <div class="tab-pane" id="transport">
                    <h5 class="mb-3">আপনার দেওয়া যানবাহানসমূহ</h5>
                    <h5 class="mb-3">অ্যাকটিভ যানবাহানসমূহ</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from transports where user_id='{$_SESSION['user_id']}' AND inspection='done'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>গাড়ির নম্বর</b></td>
<td><b>ক্যাটাগরী</b></td>
<td><b>ড্রাইভার লাইসেন্স</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td><?php echo $row["car_number"]; ?></td>
      <td><?php echo $row["category"]; ?></td>
      <td><?php echo $row["driver_license"]; ?></td>
    </tr>
<?php }?>
                                </tbody>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">এই মূহুর্তে  সাথে যুক্ত নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                    <h5 class="mb-3">যানবাহনের রিকোয়েস্ট</h5>
                    <div class="row">
                      <?php 
                        $sql = "SELECT * from transports where user_id='{$_SESSION['user_id']}' AND inspection='done'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $sql2 = "SELECT ds_id from postal_codes WHERE postal_code='{$row["postal_code"]}'";
      $result2 = mysqli_query($con, $sql2);
      $district = mysqli_fetch_assoc($result2);

      $sql3 = "SELECT * from tour_services WHERE ds_id='{$district["ds_id"]}' AND service_type='transport' AND status='pending'";
      $result3 = mysqli_query($con, $sql3);?>
<div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>গাড়ির ধরণ</b></td>
<td><b>সময়</b></td>
                                  </th>
      <?php 
      while($req = mysqli_fetch_assoc($result3)){
        $workbook = $reader->load($req["service_details"]);
        $car_type = $workbook->getActiveSheet()->getCell('B1')->getValue();
        $sql4 = "SELECT * from transports WHERE user_id='{$_SESSION['user_id']}' AND inspection='done' AND category='$car_type' AND status='available'";
      $result4 = mysqli_query($con, $sql4);
if (mysqli_num_rows($result) > 0) {
                      ?>
                      <tr>
      <td></td>
      <td><?php if($car_type=="micro") {?>
        মাইক্রো
        <?php }else {?>
          কার
        <?php }?>
      </td>
      <td><?php echo $obj->en2bn($workbook->getActiveSheet()->getCell('B2')->getValue())." "; ?>ঘণ্টা</td>
      <td><a href="service_request_processing.php?ts_id=<?php echo $req["ts_id"];?>"><button class="info">একসেপ্ট করুন</button></a></td>
    </tr>
                    <?php } }?> 
                              </tbody>
                          </table>
                          </div>
                  <?php } ?>
                    <?php } ?>
                    </div>
                    <br>
                    <br>
                    <h5 class="mb-3">পেন্ডিং যানবাহনসমূহ</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from transports where user_id='{$_SESSION['user_id']}' AND ((inspection='pending') OR (inspection='ongoing'))";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td>গাড়ির নম্বর</td>
<td>ক্যাটাগরী</td>
<td>ড্রাইভার লাইসেন্স</td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td><?php echo $row["car_number"]; ?></td>
      <td><?php echo $row["category"]; ?></td>
      <td><?php echo $row["driver_license"]; ?></td>
      <td>
        <a href="admin/delete_record.php?name=transports&pk=transport_id&id=<?php echo $row["transport_id"]; ?>&confirm=0"><button type="button" class="btn btn-danger">মুছে ফেলুন</button></a>
      </td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">আপনার মালিকানাধীন কোন যানবাহন এই মূহুর্তে পেন্ডিং নেই</h6>
                      <?php }?>
                    </div>
                </div>
                <div class="tab-pane" id="ins">
                    <h5 class="mb-3">আপনার করা ইন্সপেকশনসমূহ</h5>
                    <h5 class="mb-3">সম্পন্ন হয়েছে</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from inspections where inspector_id='{$_SESSION['user_id']}' AND status='done'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>ঠিকানা</b></td>
<td><b>তারিখ</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td><?php
if ($row["table_name"] == "hotels") {
				?>
      হোটেল
        <?php } else if ($row["table_name"] == "transports") {?>
        যানবাহন
        <?php } else if ($row["table_name"] == "guides") {?>
          গাইড
        <?php } else {?>
          ঘরোয়া খাবার
        <?php }?>

      </td>
      <td><?php
      if ($row["table_name"]=="guides"){
      $sql2 = "SELECT address from users where user_id={$row["id"]}";        
      }else{
$sql2 = "SELECT address from {$row["table_name"]} where {$row["primary_key"]}={$row["id"]}";
}
			$result2 = mysqli_query($con, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
			echo $row2["address"];
			?></td>
      <td><?php echo $obj->en2bn(date('d/m/Y', strtotime($row["done_date"]))); ?></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">দুঃখিত! আপনি এখনো কোন ইন্সপেকশন করেননি</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                    <h5 class="mb-3">চলমান আছে</h5>
                    <div class="row">
                      <?php $sql = "SELECT * from inspections where inspector_id='{$_SESSION['user_id']}' AND status='ongoing'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>ঠিকানা</b></td>
<td><b>যোগাযোগ</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td><?php
if ($row["table_name"] == "hotels") {
				?>
      হোটেল
        <?php } else if ($row["table_name"] == "transports") {?>
        যানবাহন
        <?php } else if ($row["table_name"] == "guides") {?>
          গাইড
        <?php } else {?>
          ঘরোয়া খাবার
        <?php }?>

      </td>
      <td><?php
if ($row["table_name"] == "guides") {
				$sql2 = "SELECT * from users where user_id={$row["id"]}";
			} else {
				$sql2 = "SELECT address from {$row["table_name"]} where {$row["primary_key"]}={$row["id"]}";
			}
			$result2 = mysqli_query($con, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			echo $row2["address"];
			?></td>
      <td><?php
if ($row["table_name"] == "guides") {
				echo $row2["mobile"];
			} else {
				$sql3 = "SELECT mobile from users where user_id in (SELECT user_id from {$row["table_name"]} where {$row["primary_key"]}={$row["id"]})";
				$result3 = mysqli_query($con, $sql3);
				$row3 = mysqli_fetch_assoc($result3);
				echo $row3["mobile"];
			}?>
      </td>
      <td><a href="inspection_complete.php?name=<?php echo $row["table_name"]; ?>&pk=<?php echo $row["primary_key"]; ?>&id=<?php echo $row["id"]; ?>&confirm=0"><button type="button" class="btn btn-success">ইন্সপেকশন সম্পুর্ণ করুন!</button></a></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">দুঃখিত! আপনি এখনো কোন ইন্সপেকশন করেননি</h6>
                      <?php }?>
                    </div>
                </div>

                <div class="tab-pane" id="hotel_ins">
                    <h5 class="mb-3">নিম্নোক্ত হোটেলগুলো ইন্সপেকশন করতে হবে</h5>
                    <div class="row">
                      <?php $sql = "SELECT ds_id from inspectors where user_id='{$_SESSION['user_id']}'";
	$result = mysqli_query($con, $sql);
	$ins = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM `hotels` WHERE postal_code in (SELECT postal_code FROM `districts` WHERE ds_id={$ins["ds_id"]})  AND inspection='pending'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>ঠিকানা</b></td>
<td><b>অ্যাপ্লাই করা হয়েছে</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td>
      হোটেল
      </td>
      <td><?php
echo $row["address"];
			?></td>
      <td>
        <?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?>
      </td>
      <td><a href="inspection_request.php?name=hotels&pk=hotel_id&id=<?php echo $row["hotel_id"]; ?>&confirm=0"><button type="button" class="btn btn-warning">ইন্সপেকশন করুন</button></a></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">এই মূহুর্তে কোন হোটেলের ইন্সপেকশন বাকি নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                </div>
                <div class="tab-pane" id="hf_ins">
                    <h5 class="mb-3">নিম্নোক্ত ঠিকানাগুলোতে ইন্সপেকশন করতে হবে</h5>
                    <div class="row">
                      <?php $sql = "SELECT ds_id from inspectors where user_id='{$_SESSION['user_id']}'";
	$result = mysqli_query($con, $sql);
	$ins = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM `homemade_foods` WHERE postal_code in (SELECT postal_code FROM `districts` WHERE ds_id={$ins["ds_id"]}) AND inspection='pending'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>ঠিকানা</b></td>
<td><b>অ্যাপ্লাই করা হয়েছে</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td>
      ঘরোয়া খাবার
      </td>
      <td><?php
echo $row["address"];
			?></td>
      <td>
        <?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?>
      </td>
      <td><a href="inspection_request.php?name=homemade_foods&pk=sp_id&id=<?php echo $row["sp_id"]; ?>&confirm=0"><button type="button" class="btn btn-warning">ইন্সপেকশন করুন</button></a></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">এই মূহুর্তে কোন ঘরোয়া খাবারের ইন্সপেকশন বাকি নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                </div>
                <div class="tab-pane" id="transport_ins">
                    <h5 class="mb-3">নিম্নোক্ত যানবাহনগুলো ইন্সপেকশন করতে হবে</h5>
                    <div class="row">
                      <?php $sql = "SELECT ds_id from inspectors where user_id='{$_SESSION['user_id']}'";
	$result = mysqli_query($con, $sql);
	$ins = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM `transports` WHERE postal_code in (SELECT postal_code FROM `districts` WHERE ds_id={$ins["ds_id"]})  AND inspection='pending'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>গাড়ির নম্বর</b></td>
<td><b>ক্যাটাগরী</b></td>
<td><b>ঠিকানা</b></td>
<td><b>অ্যাপ্লাই করা হয়েছে</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td>
      যানবাহন
      </td>
      <td><?php
echo $row["car_number"];
			?></td>
      <td><?php
echo $row["category"];
			?></td>
      <td><?php
echo $row["address"];
			?></td>
      <td>
        <?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?>
      </td>
      <td><a href="inspection_request.php?name=transports&pk=transport_id&id=<?php echo $row["transport_id"]; ?>&confirm=0"><button type="button" class="btn btn-warning">ইন্সপেকশন করুন</button></a></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">এই মূহুর্তে কোন যানবাহনের ইন্সপেকশন বাকি নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                </div>
                <div class="tab-pane" id="guide_ins">
                    <h5 class="mb-3">নিম্নোক্ত গাইডদের ইন্সপেকশন করতে হবে</h5>
                    <div class="row">
                      <?php $sql = "SELECT ds_id from inspectors where user_id='{$_SESSION['user_id']}'";
	$result = mysqli_query($con, $sql);
	$ins = mysqli_fetch_assoc($result);
	$sql = "SELECT * FROM `guides` WHERE postal_code in (SELECT postal_code FROM `districts` WHERE ds_id={$ins["ds_id"]}) AND inspection='pending'";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result) > 0) {
		?>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                  <th>
<td><b>ধরণ</b></td>
<td><b>ঠিকানা</b></td>
<td><b>অ্যাপ্লাই করা হয়েছে</b></td>
                                  </th>
                                  <?php
while ($row = mysqli_fetch_assoc($result)) {
			?>
    <tr>
      <td></td>
      <td>
      গাইড
      </td>
      <td><?php

			$sql2 = "SELECT address from users where user_id={$row["user_id"]}";
			$result2 = mysqli_query($con, $sql2);
			$add = mysqli_fetch_assoc($result2);
			echo $add["address"];
			?></td>
      <td>
        <?php echo $obj->en2bn(date('d/m/Y', strtotime($row["joining_date"]))); ?>
      </td>
      <td><a href="inspection_request.php?name=guides&pk=user_id&id=<?php echo $row["user_id"]; ?>&confirm=0"><button type="button" class="btn btn-warning">ইন্সপেকশন করুন</button></a></td>
    </tr>

                                </tbody>
                              <?php }?>
                            </table>
                        </div>
                      <?php } else {?>
                        <h6 class="mb-3">এই মূহুর্তে কোন গাইডের ইন্সপেকশন বাকি নেই</h6>
                      <?php }?>
                    </div>
                    <!--/row-->
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
}
</div>

<?php

	include 'footer.php';
}
?>