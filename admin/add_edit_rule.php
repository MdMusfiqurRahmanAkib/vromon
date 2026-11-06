<?php
session_start();
ob_start();

include "../inc/db.php";
include "table_description.php";
include "../number_converter.php";
require '../vendor/autoload.php';

$obj = new bangla_converter();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$id = $_GET["id"];

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
if ($id == 0) {

  ?>
          <div class="card-header border-transparent">
                <h3 class="card-title">Create new Set of Rules</h3>
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
                    <thead>
                    <tr>
                      <th>Rule</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>
                        <form action="rule_process.php?id=0" method="post">
                          <label for="title">রুলের টাইটেল দিনঃ</label>
                          <input class="form-control col-md-6" type="text" id="title" name="title" placeholder="টাইটেল লিখুন">

                          <label for="category">ক্যাটাগরী দিনঃ</label>
                          <input class="form-control col-md-6" type="text" id="category" name="category" placeholder="ক্যাটাগরী লিখুন">

                          <div id="new_chq"></div>
                          <button class="btn-success" type="button" onclick="add()">রুল যুক্ত করুন</button>
                          <button class="btn-danger" type="button" onclick="remove()">রুল মুছে ফেলুন</button>

                          <input type="hidden" value="1" id="total_chq">
                          <br>
                          <input type="submit" class="btn btn-primary" value="জমা দিন">
                        </form>
                      </td>
                    </tr>

                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
          <?php } else {
  ?>

                <div class="card-header border-transparent">
                <h3 class="card-title"><?php
                  $sql2 = "SELECT * FROM rules WHERE `rule_id`='$id'";
                  $result2 = mysqli_query($con, $sql2);
                  $row2 = mysqli_fetch_array($result2);
                  echo $row2["rule_title"];
                  $workbook = $reader->load("../".$row2["rule_file"]);
                  ?>
                </h3>
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
                    <tbody>
                      <tr>
                        <td>
                          <form action="rule_process.php?id=1" method="post">
                          <label for="title">রুলের টাইটেল এডিট করুনঃ</label>
                          <input class="form-control col-md-6" type="text" id="title" name="title" value="<?php echo $row2["rule_title"];?>">

                          <label for="category">ক্যাটাগরী এডিট করুনঃ</label>
                          <input class="form-control col-md-6" type="text" id="category" name="category" value="<?php echo $row2["category"];?>">

                          <button class="btn-success" type="button" onclick="add()">রুল যুক্ত করুন</button>
                          <button class="btn-danger" type="button" onclick="remove()">রুল মুছে ফেলুন</button>
                          <br>
                      <?php
                        $line = 1;
                        while(1){
                          $rule = $workbook->getActiveSheet()->getCell('A'.$line)->getValue();
                          if($rule!=""){
                      ?>
                        <textarea id='<?php echo "new_".$line;?>' name='<?php echo "rule_".$line;?>' rows="2" cols="60"><?php echo $rule; ?></textarea>

                    <?php }else{break;}$line+=1; } ?>
                    <input type="hidden" value="<?php echo $line;?>" id="total_chq">
                    <div id="new_chq"></div>
                    <input type="submit" class="btn btn-primary" value="জমা দিন">
                      </td>
                    </tr>
                    </tbody>
                  </table>

                </div>
                <!-- /.table-responsive -->
              </div>
              <?php }?>
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
<script type="text/javascript">
  function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<textarea id='new_"+new_chq_no+"' name='rule_"+new_chq_no+"' rows='2' cols='60'></textarea>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }
</script>
</body>
</html>
