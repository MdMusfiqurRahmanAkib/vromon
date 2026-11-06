<div class="row" id="address">
    <div class="col-md-3 field-label-responsive">
      <label for="name">শহর ও বিভাগ সিলেক্ট করুন</label>
      <i class="fas fa-map"></i>
    </div>
    <div class="col-md-3">
      <select class="form-control" name="division" id="division">
      	<option>-- বিভাগ সিলেক্ট করুন --</option>
      	<option value="dhaka">ঢাকা</option>
      	<option value="chittagong">চট্টগ্রাম</option>
      	<option value="rajshahi">রাজশাহী</option>
      	<option value="rangpur">রংপুর</option>
      	<option value="barishal">বরিশাল</option>
      	<option value="khulna">খুলনা</option>
      	<option value="sylhet">সিলেট</option>
      	<option value="mymensingh">ময়মনসিংহ</option>
      </select>
    </div>

    <div class="col-md-3">
      <select class="form-control" name="district" id="district">
      	<option>--শহর সিলেক্ট করুন: </option>
        <?php
$district_info = new database_query("SELECT * FROM districts");
$result = $district_info->query();

foreach ($result as $district) {
	?>
			  <option class="<?php echo $district["division"] . " " . "district"; ?>" value="<?php echo $district["ds_name"]; ?>">

          <?php echo $district["ds_name"]; ?>

        </option>
        <?php }?>

      	</select>
    </div>
</div>