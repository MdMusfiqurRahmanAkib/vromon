<?php
include 'header.php';
require 'vendor/autoload.php';
if (!$flag) {
	header("Location: login.php?error=100");
} else {
$obj = new bangla_converter();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	?>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">প্রোফাইল</a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#tours" data-toggle="tab" class="nav-link">আপনার ট্যুরগুলো</a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#notifications" data-toggle="tab" class="nav-link">নোটিফিকেশন দেখুন </a>
                </li>

                <li class="nav-item">
                    <a href="" data-target="#settings" data-toggle="tab" class="nav-link">সেটিংস</a>
                </li>
            </ul>
            <div class="tab-content py-4">

                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">আপনার তথ্য</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                      <th scope="row">নাম</th>
                                      <td><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></td>
                                      <td><a href="edit_profile.php?id=1"><button type="button" class="btn btn-warning">এডিট</button></a></td>
                                    </tr>

                                    <tr>
                                      <th scope="row">ঠিকানা</th>
                                      <td><?php echo $_SESSION['address']; ?></td>
                                      <td><a href="edit_profile.php?id=2"><button type="button" class="btn btn-warning">এডিট</button></a></td>
                                    </tr>

                                    <tr>
                                      <th scope="row">মোবাইল</th>
                                      <td><?php echo $_SESSION['mobile']; ?></td>
                                      <td><a href="edit_profile.php?id=3"><button type="button" class="btn btn-warning">এডিট</button></a></td>
                                    </tr>

                                    <tr>
                                      <th scope="row">ই-মেইল</th>
                                      <td><?php echo $_SESSION['email']; ?></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>

                <div class="tab-pane" id="tours">
                    <h4>চলমান ট্যুর</h4>
                    <div class="row">
<?php 
$sql = "Select * FROM tours Where user_id={$_SESSION['user_id']} AND status='ongoing'";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount>0){
    $row = mysqli_fetch_assoc($result);
    $sql2 = "Select ds_name FROM districts Where ds_id={$row["started_from"]}";
    $result2 = mysqli_query($con, $sql2);
    $from = mysqli_fetch_assoc($result2);

    $sql2 = "Select ds_name FROM districts Where ds_id={$row["went_to"]}";
    $result2 = mysqli_query($con, $sql2);
    $to = mysqli_fetch_assoc($result2);
    $workbook = $reader->load($row["tour_file"]);
?>
                        <table class="table">
                          <tbody>
                            <?php $line = 1;
                                while(1){
                                    $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                    if($field!=""){
                                        $value = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                                        if ($field!="হোটেল" and $field!="পরিবহন"){
                                      ?>
                                    <tr>
                                      <td><?php echo $field;?></td>
                                      <td><?php 
                                        if($field=="অবস্থান" or $field=="গন্তব্য"){
                                          $sql2 = "Select ds_name FROM districts Where ds_id=$value";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    echo $row2["ds_name"];
                                        }else if($field=="যাত্রার তারিখ" or $field=="চেক ইন" or $field=="চেক আউট"){
                                            echo $obj->en2bn(date("j F, Y", strtotime($value)));
                                        }else{
                                          
                                            echo $value;
                                  }
                                      ?></td>
                                    </tr>
                                  <?php }?>
                            <?php }else{break;}$line+=1; }?>
                            <tr>
                              <td><h5>সার্ভিসের জন্য আবেদন করুন</h5></td>
                              <td></td>
                            </tr>
                            <tr>
                                <?php 
                                $sql3 = "Select * FROM tour_services Where tour_id={$row["tour_id"]} AND service_type='guide' AND status='pending'";
                                $result3 = mysqli_query($con, $sql3);
                                if (mysqli_num_rows($result3)>0){
                                ?>
                              <td>আপনি গাইডের জন্য অ্যাপ্লাই করেছেন</td>
                              <?php } else{ ?>  
                              <td>গাইড প্রয়োজন?</td>
                              <td><a href="tour_services.php?service=guide&id=<?php echo $row["tour_id"];?>" class="btn btn-info">আবেদন করুন</a></td>
                          <?php } ?>
                            </tr>
                            <tr>
                                <?php 
                                $sql3 = "Select * FROM tour_services Where tour_id={$row["tour_id"]} AND service_type='transport' AND status='pending'";
                                $result3 = mysqli_query($con, $sql3);
                                if (mysqli_num_rows($result3)>0){
                                ?>
                              <td>আপনি যানবাহনের জন্য অ্যাপ্লাই করেছেন</td>
                              <?php } else{ ?>
                              <td>যানবাহন প্রয়োজন?</td>
                              <td><a href="tour_services.php?service=transport&id=<?php echo $row["tour_id"];?>" class="btn btn-info">আবেদন করুন</a></td>
                          <?php } ?>
                            </tr>
                            <tr>
                                <?php 
                                $sql3 = "Select * FROM tour_services Where tour_id={$row["tour_id"]} AND service_type='food' AND status='pending'";
                                $result3 = mysqli_query($con, $sql3);
                                if (mysqli_num_rows($result3)>0){
                                ?>
                              <td>আপনি খাবারের জন্য অ্যাপ্লাই করেছেন</td>
                              <?php } else{ ?>
                              <td>ঘরোয়া খাবার প্রয়োজন?</td>
                              <td><a href="tour_services.php?service=food&id=<?php echo $row["tour_id"];?>" class="btn btn-info">আবেদন করুন</a></td>
                                <?php } ?>
                            </tr>

                            
                            <?php 
                              $sql3 = "Select * FROM tour_services Where tour_id={$row["tour_id"]} AND status='accepted'";
                              $result3 = mysqli_query($con, $sql3);
                              while($row3 = mysqli_fetch_assoc($result3)){
                            ?>
                            <tr>
                              <?php if($row3["service_type"]=="transport"){?>
                                <td>আপনার গাড়ির রিকোয়েস্ট চলমান আছে</td>
                              <?php }else if($row3["service_type"]=="guide"){?>
                                <td>আপনার গাইডের রিকোয়েস্ট চলমান আছে</td>
                              <?php }else{?>
                                <td>আপনার খাবারের রিকোয়েস্ট চলমান আছে</td>
                              <?php }?>
                              <td><a href="service_end.php?ts_id=<?php echo $row3["ts_id"];?>" class="btn btn-success">সমাপ্ত করুন</a></td>
                              <td><a href="cancel_service.php?ts_id=<?php echo $row3["ts_id"];?>" class="btn btn-danger">ক্যান্সেল করুন</a></td>
                            </tr>
                          <?php } ?>
                            <tr>
                              <td>ট্যুর সমাপ্ত করতে চান?</td>
                              <td><a href="tour_end.php?id=<?php echo $row["tour_id"];?>" class="btn btn-danger">হ্যাঁ</a></td>
                            </tr>
                          </tbody>
                        </table>
                        
<?php } else{?>
<?php }?>
                    </div>
<br>
                    <h4>পেণ্ডিং ট্যুরসমূহ</h4>
                    <div class="row">
<?php 
$sql = "Select * FROM tours Where user_id={$_SESSION['user_id']} AND status='pending'";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount>0){
    
    while ($row = mysqli_fetch_assoc($result)){
        $sql2 = "Select ds_name FROM districts Where ds_id={$row["started_from"]}";
    $result2 = mysqli_query($con, $sql2);
    $from = mysqli_fetch_assoc($result2);

    $sql2 = "Select ds_name FROM districts Where ds_id={$row["went_to"]}";
    $result2 = mysqli_query($con, $sql2);
    $to = mysqli_fetch_assoc($result2);
    $workbook = $reader->load($row["tour_file"]);
?>
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $from["ds_name"]." - ".$to["ds_name"]."<br>"?></h5>
                            <?php if($row["tour_type"]=="custom"){?>
                            <p class="card-text"><?php 
                              $line =1;
                              $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                              while($key!="যাত্রার তারিখ"){
                                  $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                  $line+=1;
                              }
                              echo $key." : ".$obj->en2bn($workbook->getActiveSheet()->getCell('B'.$line)->getValue());
                            ?></p>
                            <a href="tour_details.php?tour_id=<?php echo $row["tour_id"];?>" class="btn btn-primary">বিস্তারিত</a>
                            <a href = "tour_cancelling.php?id=<?php echo $row["tour_id"];?>" class = "btn btn-danger" role = "button">
                                       ক্যান্সেল করুন  
                                    </a>
                          <?php }else{ ?>
                            <div class = "blog_post">
                              <div class = "thumbnail">
                                 <img src = "images/travel_2.jpg">
                              </div>
                              
                              <div class = "caption">
                                <h4><?php 
                                $id = $row["package_id"];
                                $sql2 = "SELECT * from tour_packages where package_id='$id'";
                                $result2 = mysqli_query($con, $sql2);
                                $row2 = mysqli_fetch_assoc($result2);
                                echo $row2["title"];
                                $workbook = $reader->load("text/packages/sample.xlsx");
                                $line = 1;
                                while(1){
                                $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                if ($line==1){
                                  $duration = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                                }
                                else if ($workbook->getActiveSheet()->getCell('A'.($line+1))->getValue()==""){
                                  $cost = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                                  break;
                                }
                                $line+=1;
                              }
                                ?></h4>
                                <p>
                                  <b>সময়কালঃ</b> <?php echo $duration; ?>
                                  <br>
                                  <b>মূল্যঃ</b> <?php echo $cost; ?>
                                </p>

                                <p>
                                    <a href = "tour_package_details.php?id=<?php echo $row["package_id"];?>" class = "btn btn-dark" role = "button">
                                       বিস্তারিত  
                                    </a>
                                    <a href = "tour_cancelling.php?id=<?php echo $row["tour_id"];?>" class = "btn btn-danger" role = "button">
                                       ক্যান্সেল করুন  
                                    </a>
                                </p>
                                 
                              </div>
                            </div>
                          <?php }?>
                            <?php if($row["payment"]=='pending'){?>
                            <a href="payment.php?tour_id=<?php echo $row["tour_id"];?>" class="btn btn-warning">পেমেন্ট সম্পূর্ণ করুন</a>
                          <?php } ?>
                          </div>
                        </div>
<?php } } else{?>
  <h5>আপনার এই মূহুর্তে কোন ট্যুর রিকোয়েস্ট পেন্ডিং নেই</h4>
<?php }?>
                    </div>
                    <!--/row-->
<br>
                    <h4>অনুমোদিত ট্যুরসমূহ</h4>
                    <div class="row">
<?php 
$sql = "Select * FROM tours Where user_id={$_SESSION['user_id']} AND status='approved'";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount>0){
    
    while ($row = mysqli_fetch_assoc($result)){
        $sql2 = "Select ds_name FROM districts Where ds_id={$row["started_from"]}";
    $result2 = mysqli_query($con, $sql2);
    $from = mysqli_fetch_assoc($result2);

    $sql2 = "Select ds_name FROM districts Where ds_id={$row["went_to"]}";
    $result2 = mysqli_query($con, $sql2);
    $to = mysqli_fetch_assoc($result2);
    $workbook = $reader->load($row["tour_file"]);
?>
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $from["ds_name"]." - ".$to["ds_name"]."<br>"?></h5>
                            <p class="card-text"><?php 
                              $line =1;
                              $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                              while($key!="যাত্রার তারিখ"){
                                  $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                  $line+=1;
                              }
                              echo $key." : ".$obj->en2bn($workbook->getActiveSheet()->getCell('B'.$line)->getValue());
                            ?></p>
                            <a href="tour_details.php?tour_id=<?php echo $row["tour_id"];?>" class="btn btn-primary">বিস্তারিত</a>
                            <a href="start_or_cancel_tour.php?tour_id=<?php echo $row["tour_id"];?>&verdict=start" class="btn btn-success">শুরু করুন</a>
                            <a href="start_or_cancel_tour.php?tour_id=<?php echo $row["tour_id"];?>&verdict=cancel" class="btn btn-danger">ক্যান্সেল করুন</a>
                          </div>
                        </div>
<?php } } else{?>
  <h5>আপনার এই মূহুর্তে কোন ট্যুর রিকোয়েস্ট পেন্ডিং নেই</h4>
<?php }?>
                    </div>
                    <!--/row-->
<br>
                    <h4>অতীতের ট্যুরসমূহ</h4>
                    <div class="row">
<?php 
$sql = "Select * FROM tours Where user_id={$_SESSION['user_id']} AND status='finished' ORDER BY tour_id DESC";
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount>0){
    
    while ($row = mysqli_fetch_assoc($result)){
        $sql2 = "Select ds_name FROM districts Where ds_id={$row["started_from"]}";
    $result2 = mysqli_query($con, $sql2);
    $from = mysqli_fetch_assoc($result2);

    $sql2 = "Select ds_name FROM districts Where ds_id={$row["went_to"]}";
    $result2 = mysqli_query($con, $sql2);
    $to = mysqli_fetch_assoc($result2);
    $workbook = $reader->load($row["tour_file"]);
?>
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $from["ds_name"]." - ".$to["ds_name"]."<br>"?></h5>
                            <p class="card-text"><?php 
                              $line =1;
                              $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                              while($key!="যাত্রার তারিখ"){
                                  $key = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                  $line+=1;
                              }
                              echo $key." : ".$obj->en2bn($workbook->getActiveSheet()->getCell('B'.$line)->getValue());
                            ?></p>
                            <a href="tour_details.php?tour_id=<?php echo $row["tour_id"];?>" class="btn btn-primary">বিস্তারিত</a>
                          </div>
                        </div>
<?php } } else{?>
<?php }?>
                    </div>
                    <!--/row-->
                </div>

                <div class="tab-pane" id="notifications">
                    <h4>নতুন নোটিফিকেশন</h4>
                    <?php 
                      $sql = "SELECT * from notification where user_id='{$_SESSION['user_id']}' AND status='unseen' ORDER BY notification_time DESC";
                      $result = mysqli_query($con, $sql);?>
                      <table class="table table-striped col-md-6">
                      <?php while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                        <td>                       
                        <?php if ($row["notification_type"]=="transport"){?>
                            <h5>আপনার গাড়ির রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } else if ($row["notification_type"]=="guide"){?>
                            <h5>আপনার গাইড রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } else if ($row["notification_type"]=="food"){?>
                            <h5>আপনার খাবারের রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } else if ($row["notification_type"]=="post_decision"){?>
                            <h5>আপনার জমাকৃত পোস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } 

                        ?>
                          </td>
                          <td><a href="notification_details.php?notification=<?php echo $row["notification_id"];?>"><button class="btn-info">দেখুন</button></a></td>
                        
                        </tr>
                      <?php } ?>
                        </table>
                      <h4>পুরাতন নোটিফিকেশন</h4>
                    <?php 
                      $sql = "SELECT * from notification where user_id='{$_SESSION['user_id']}' AND status='seen' ORDER BY notification_time DESC";
                      $result = mysqli_query($con, $sql);?>
                      <table class="table table-striped col-md-6">
                      <?php while($row = mysqli_fetch_assoc($result)){?>
                        <tr>
                        <td>                       
                        <?php if ($row["notification_type"]=="transport"){?>
                            <h5>আপনার গাড়ির রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } else if ($row["notification_type"]=="guide"){?>
                            <h5>আপনার গাইড রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } else if ($row["notification_type"]=="food"){?>
                            <h5>আপনার খাবারের রিকোয়েস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php }  else if ($row["notification_type"]=="post_decision"){?>
                            <h5>আপনার জমাকৃত পোস্ট সংক্রান্ত নোটিফিকেশন দেখুন</h5>
                        <?php } 

                        ?>
                          </td>
                          <td><a href="notification_details.php?notification=<?php echo $row["notification_id"];?>"><button class="btn-info">দেখুন</button></a></td>
                        
                        </tr>
                      <?php } ?>
                        </table>
                </div>

                <div class="tab-pane" id="settings">
                    <div class="col-md-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                      <td>পাসওয়ার্ড পরিবর্তন করুন</td>
                                      <td><a href="change.php?id=1"><button type="button" class="btn btn-warning">Go</button></a></td>
                                    </tr>

                                    <tr>
                                      <td>প্রোফাইল পিকচার পরিবর্তন করুন </td>
                                      <td><a href="change.php?id=2"><button type="button" class="btn btn-warning">Go</button></a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 order-lg-1 text-center">
            <img src="<?php echo $_SESSION['profile_pic']; ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">

        </div>
    </div>
</div>

<?php
}
include 'footer.php';
?>