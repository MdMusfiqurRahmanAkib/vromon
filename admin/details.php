<?php
session_start();
ob_start();
include "../inc/db.php";
include "../number_converter.php";
require '../vendor/autoload.php';

mb_language('uni');
mb_internal_encoding('UTF-8');
$obj = new bangla_converter();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$dic = array("blog_post" => "All posts written by the users", "comment_replies" => "Replies on comments", "districts" => "All the districts in the country", "guides" => "Guides working with us", "homemade_foods" => "Users providing us hommande foods", "hotels" => "Hotels associated with us", "messages" => "Messages sent by the users", "places" => "Tourists spots", "post_comments" => "Comments on a particular post", "subscribers" => "all the subscribers", "team" => "Info about our Employees", "tours" => "All completed tours", "transports" => "All sort of transports", "users" => "Info about our users", "travel_stories" => "Story categorization");
$name = $_GET["name"];
$primary_key = $_GET["pk"];
$id = $_GET["id"];
$inspection_done = False;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Table</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $_SESSION['role']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../profile.php" class="d-block"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php include "menu.php";?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->

        <!-- /.row -->
        <!-- Main row -->
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
          <?php
?>

                <div class="card-header border-transparent">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <?php
$sql = "SHOW COLUMNS FROM $name";
$result = mysqli_query($con, $sql);
$arr = [];
$l = 0;
while ($row = mysqli_fetch_array($result)) {
	array_push($arr, $row['Field']);
	$l += 1;
}?>
                    <tbody>
                      <?php
$sql = "Select * FROM $name Where $primary_key=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$index = 0;
while ($index < $l) {
  if($arr[$index]!="inspection_report"){
	?>
                    <tr>
                      <td>
                        <?php
echo $arr[$index];
	?>
                      </td>
                      <td><?php
echo $row[$arr[$index]];
if($name=="inspections" and $arr[$index]=="status" and $row[$arr[$index]]=="done"){
$inspection_done = True;
}
	}$index += 1; ?></td>

                    </tr>
                    <?php }?>

                    <tr>
                    <?php if($inspection_done){
                      ?>

                      <td>
                        <a href="approval.php?id=<?php echo $row[$arr[0]]; ?>&confirm=1"><button type="button" class="btn btn-success">Approve</button></a>
                      </td>
                      <td>
                        <a href="approval.php?id=<?php echo $row[$arr[0]]; ?>&confirm=0"><button type="button" class="btn btn-danger">Decline</button></a>
                      </td>
                    <?php }else{?>
                      <?php if ($name=="blog_post"){?>
                      <td>
                        <?php echo $name;?>
                        <button type="button" class="btn btn-info view_post">View Post</button>
                      </td>
                    <?php } else if ($name=="tours"){?>
                      <td>
                        <?php echo $name."=>".$primary_key."=>".$id."<br>";?>
                        <button type="button" class="btn btn-info tour_details">View Details</button>
                      </td>
                    <?php } else{?>
                      <td>
                        <a href="inspection.php?name=<?php echo $name; ?>&pk=<?php echo $arr[0]; ?>&id=<?php echo $row[$arr[0]]; ?>&confirm=0"><button type="button" class="btn btn-info">Send data for Inspection</button></a>
                      </td>
                    <?php } }?>
                    </tr>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
                <div id="post_Modal" class="modal fade" tabindex="-1">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title"><?php echo $row["post_title"];?></h5>
                              <h6><b>তারিখঃ </b><?php
                              echo $obj->en2bn(date("j F, Y", strtotime($row["post_date"])));

                              ?></h6>
                          </div>
                          <div class="modal-body">
                              <p>
                                <?php

                                  if ($fh = fopen("../".$row["post_file"], 'r')) {
                                    while (!feof($fh)) {
                                      $line = fgets($fh);
                                      echo $line . "<br><br>";
                                    }
                                    fclose($fh);
                                  }

                                  /*
                                  include ('Doc2Txt.php');
                                  $docObj = new Doc2Txt('test.docx');
                                  $txt = $docObj->convertToText();
                                  echo $txt;
                                  */
                                ?>
                              </p>
                          </div>
                          <div class="modal-footer">
                              <a href="post_approval.php?verdict=declined&id=<?php echo $id;?>"><button type="button" class="btn btn-danger">প্রত্যাখ্যান করুন</button></a>
                              <a href="post_approval.php?verdict=approved&id=<?php echo $id;?>"><button type="button" class="btn btn-success">অ্যাপ্রুভ করুন</button></a>
                          </div>
                      </div>
                  </div>
              </div>
              <?php if ($name=="tours"){?>
              <div id="tour_Modal" class="modal fade" tabindex="-1">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-body">
                              <table class="table table-striped">
                                <?php
                                $workbook = $reader->load("../".$row["tour_file"]);
                                  $line = 1;
                                  while(1){
                                    $field = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                                    if($field!=""){
                                        $value = $workbook->getActiveSheet()->getCell('B'.$line)->getValue();
                                      ?>
                                    <tr>
                                      <td><?php echo $field;?></td>
                                      <td><?php
                                      if($field=="অবস্থান" or $field=="গন্তব্য"){
                                        $sql2 = "Select ds_name FROM districts Where ds_id=$value";
                                  $result2 = mysqli_query($con, $sql2);
                                  $row2 = mysqli_fetch_assoc($result2);
                                  echo $row2["ds_name"];
                                      }else{
                                      echo $value;
                                }
                                    ?></td>
                                    </tr>
                    <?php }else{break;}$line+=1; }
                                  /*
                                  include ('Doc2Txt.php');
                                  $docObj = new Doc2Txt('test.docx');
                                  $txt = $docObj->convertToText();
                                  echo $txt;
                                  */
                                ?>
                              </table>
                          </div>
                          <div class="modal-footer">
                              <a href="tour_approval.php?verdict=declined&id=<?php echo $id;?>"><button type="button" class="btn btn-danger">প্রত্যাখ্যান করুন</button></a>
                              <a href="tour_approval.php?verdict=approved&id=<?php echo $id;?>"><button type="button" class="btn btn-success">অ্যাপ্রুভ করুন</button></a>
                          </div>
                      </div>
                  </div>
              </div>
            <?php } ?>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
  $(document).ready(function(){
      $(".view_post").click(function(){
          $("#post_Modal").modal('show');
      });

      $(".tour_details").click(function(){
          $("#tour_Modal").modal('show');
      });
  });
</script>
</body>
</html>
