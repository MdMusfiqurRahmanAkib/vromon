<?php
include 'header.php';
$table = $_GET["name"];
$primary_key = $_GET["pk"];
$id = $_GET["id"];

if ($table == "hotels") {
	?>
<form action="inspection_process.php?table=<?php echo $table; ?>&primary_key=<?php echo $primary_key; ?>&id=<?php echo $id; ?>" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">তথ্যগুলো ঠিক আছে?</label>
        </div>
        <br>
        <?php
$sql = "SELECT * from $table where $primary_key=$id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	?>
	<div class="col-md-6 field-label-responsive">

		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>ধরণ</td>
					<td>হোটেল</td>
				</tr>
				<tr>
					<td>নাম</td>
					<td><?php echo $row["name"]; ?></td>
				</tr>
				<tr>
					<td>ঠিকানা</td>
					<td><?php echo $row["address"]; ?></td>
				</tr>
                <tr>
                    <td>Website</td>
                    <td><a href="https://<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></td>
                </tr>
				<tr>
					<td>মালিকের নাম</td>
					<td><?php
$sql2 = "SELECT fname, lname, nid from users where user_id='{$row["user_id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	echo $row2["fname"] . " " . $row2["lname"];?></td>
				</tr>
				<tr>
					<td>মালিকের এন.আই.ডি. নং</td>
					<td><?php echo $row2["nid"]; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
        <div class="col-md-3">
        	<div class="form-check">
				  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_yes" value="True" checked>
				  <label class="form-check-label" for="authenticity_yes">
				    হ্যাঁ
				  </label>
			</div>
            <div class="form-check">
				  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_no" value="False">
				  <label class="form-check-label" for="authenticity_no">
				    না
				  </label>
			</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">খাবারের মান ও পরিবেশ কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="environment" id="environment_yes" value="satisfactory" checked>
                  <label class="form-check-label" for="environment_yes">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="environment" id="environment_no" value="dissatisfactory">
                  <label class="form-check-label" for="environment_no">
                    অসন্তোষজনক
                  </label>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">অবস্থানরত ব্যক্তিদের অভিজ্ঞতা কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="experience" id="flexRadioDefault2" value="satisfactory" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="experience" id="flexRadioDefault1" value="dissatisfactory">
                  <label class="form-check-label" for="flexRadioDefault1">
                    অসন্তোষজনক
                  </label>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">সবচেয়ে কাছের হাসপাতাল কতটুকু দূরত্বে? </label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-hospital"></i></div>
                    <select class="form-control" name="hospital" id="hospital">
                        <option>-- দূরত্ব সিলেক্ট করুন --</option>
                        <option value="close">১০০ মিটারের মধ্যে</option>
                        <option value="moderate">২০০ মিটারের মধ্যে</option>
                        <option value="far">২০০ মিটারের বাইরে</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">সবচেয়ে কাছের গ্রোসারী স্টোর কতটুকু দূরত্বে? </label>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon" style="width: 2.6rem"><i class="far fa-hospital"></i></div>
                    <select class="form-control" name="grocery" id="grocery">
                        <option>-- দূরত্ব সিলেক্ট করুন --</option>
                        <option value="close">১০০ মিটারের মধ্যে</option>
                        <option value="moderate">২০০ মিটারের মধ্যে</option>
                        <option value="far">২০০ মিটারের বাইরে</option>
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
<?php } else if ($table == "guides") {
	?>
<form action="inspection_process.php?table=<?php echo $table; ?>&primary_key=<?php echo $primary_key; ?>&id=<?php echo $id; ?>" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">তথ্যগুলো ঠিক আছে?</label>
        </div>
        <br>
        <?php
$sql = "SELECT * from `users` where $primary_key=$id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	$sql = "SELECT experience from $table where $primary_key=$id";
	$result = mysqli_query($con, $sql);
	$row2 = mysqli_fetch_assoc($result);
	?>
    <div class="col-md-6 field-label-responsive">

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ধরণ</td>
                    <td>গাইড</td>
                </tr>
                <tr>
                    <td>নাম</td>
                    <td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
                </tr>
                <tr>
                    <td>ঠিকানা</td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
                <tr>
                    <td>এনআইডি</td>
                    <td><?php echo $row["nid"]; ?></td>
                </tr>
                <tr>
                    <td>অভিজ্ঞতা</td>
                    <td><?php
if ($row2["experience"] == "junior") {?>
জুনিয়র
                    <?php } else if ($row2["experience"] == "mid") {?>
মিড লেভেল
                    <?php } else if ($row2["experience"] == "senior") {?>
                        সিনিয়র
                    <?php }?></td>
                </tr>
            </tbody>
        </table>
    </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="flexRadioDefault2" value="True" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    হ্যাঁ
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="flexRadioDefault1" value="False">
                  <label class="form-check-label" for="flexRadioDefault1">
                    না
                  </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">পূর্বের কর্মস্থল থেকে প্রাপ্ত রিপোর্ট কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="previous_report" id="flexRadioDefault2" value="satisfactory" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="previous_report" id="flexRadioDefault1" value="dissatisfactory">
                  <label class="form-check-label" for="flexRadioDefault1">
                    অসন্তোষজনক
                  </label>
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
<?php } else if ($table == "homemade_foods") {
	?>
<form action="inspection_process.php?table=<?php echo $table; ?>&primary_key=<?php echo $primary_key; ?>&id=<?php echo $id; ?>" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">তথ্যগুলো ঠিক আছে?</label>
        </div>
        <br>
        <?php
$sql = "SELECT * from $table where $primary_key=$id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	?>
    <div class="col-md-6 field-label-responsive">

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ধরণ</td>
                    <td>ঘরোয়া খাবার</td>
                </tr>

                <tr>
                    <td>ঠিকানা</td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
                <tr>
                    <td>মালিকের নাম</td>
                    <td><?php
$sql2 = "SELECT fname, lname, nid from users where user_id='{$row["user_id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	echo $row2["fname"] . " " . $row2["lname"];?></td>
                </tr>
                <tr>
                    <td>মালিকের এন.আই.ডি. নং</td>
                    <td><?php echo $row2["nid"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_yes" value="True" checked>
                  <label class="form-check-label" for="authenticity_yes">
                    হ্যাঁ
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_no" value="False">
                  <label class="form-check-label" for="authenticity_no">
                    না
                  </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">খাবারের মান ও পরিবেশ কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="environment" id="environment_yes" value="satisfactory" checked>
                  <label class="form-check-label" for="environment_yes">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="environment" id="environment_no" value="dissatisfactory">
                  <label class="form-check-label" for="environment_no">
                    অসন্তোষজনক
                  </label>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">রন্ধন স্থানের পরিচ্ছন্নতা কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="cleanliness" id="flexRadioDefault2" value="satisfactory" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="cleanliness" id="flexRadioDefault1" value="dissatisfactory">
                  <label class="form-check-label" for="flexRadioDefault1">
                    অসন্তোষজনক
                  </label>
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
<?php } else {
	?>
<form action="inspection_process.php?table=<?php echo $table; ?>&primary_key=<?php echo $primary_key; ?>&id=<?php echo $id; ?>" method="post">
    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">তথ্যগুলো ঠিক আছে?</label>
        </div>
        <br>
        <?php
$sql = "SELECT * from $table where $primary_key=$id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	?>
    <div class="col-md-6 field-label-responsive">

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>ধরণ</td>
                    <td>যানবাহন</td>
                </tr>

                <tr>
                    <td>ঠিকানা</td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
                <tr>
                    <td>মালিকের নাম</td>
                    <td><?php
$sql2 = "SELECT fname, lname, nid from users where user_id='{$row["user_id"]}'";
	$result2 = mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_assoc($result2);
	echo $row2["fname"] . " " . $row2["lname"];?></td>
                </tr>
                <tr>
                    <td>মালিকের এন.আই.ডি. নং</td>
                    <td><?php echo $row2["nid"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_yes" value="True" checked>
                  <label class="form-check-label" for="authenticity_yes">
                    হ্যাঁ
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="authenticity" id="authenticity_no" value="False">
                  <label class="form-check-label" for="authenticity_no">
                    না
                  </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 field-label-responsive">
            <label for="name">গাড়ির ফিটনেস কেমন?</label>
        </div>
        <div class="col-md-3">
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="fitness" id="environment_yes" value="satisfactory" checked>
                  <label class="form-check-label" for="environment_yes">
                    সন্তোষজনক
                  </label>
            </div>
            <div class="form-check">
                  <input class="form-check-input" type="radio" name="fitness" id="environment_no" value="dissatisfactory">
                  <label class="form-check-label" for="environment_no">
                    অসন্তোষজনক
                  </label>
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
<?php }?>
<?php
include 'footer.php';
?>