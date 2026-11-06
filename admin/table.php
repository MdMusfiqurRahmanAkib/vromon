<?php
session_start();
ob_start();

include "../inc/db.php";
include "table_description.php";
$name = $_GET["name"];

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
if ($name == "all") {

	?>
          <div class="card-header border-transparent">
                <h3 class="card-title">Tables in the Database</h3>
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
                      <th>Name</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
$sql = "SHOW TABLES";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		?>
                    <tr>
                      <td><?php echo $row["Tables_in_tourism_management"]; ?></td>
                      <td><?php echo $dic[$row["Tables_in_tourism_management"]]; ?></td>
                      <td>
                        <a href="table.php?name=<?php echo $row["Tables_in_tourism_management"]; ?>"><button type="button" class="btn btn-primary">View Details</button></a>
                      </td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
          <?php } else {
	?>

                <div class="card-header border-transparent">
                <h3 class="card-title"><?php echo $dic[$name]; ?></h3>
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
                      <?php
$sql = "SHOW COLUMNS FROM $name";
	$result = mysqli_query($con, $sql);
	$arr = [];
	$l = 0;
	while ($row = mysqli_fetch_array($result)) {
		array_push($arr, $row['Field']);
		$l += 1;
	}
	$index = 0;
	while ($index < $l) {
		?>
                      <th><?php echo $arr[$index];
		$index += 1; ?></th>
                    <?php }?>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
$sql = "Select * FROM $name";
	$result = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		?>
                    <tr>
                      <?php
$index = 0;
		$flag = False;
		while ($index < $l) {
			?>
                      <td><?php
if ($row[$arr[$index]] == "pending" or $row[$arr[$index]]=="done") {
				$flag = True;
			}
      if ($name=="tours" and $row["status"]=="approved")
        $flag = False;
			echo $row[$arr[$index]];
			$index += 1;?></td>
                    <?php }if ($flag == True) {?>
                      <td>
                        <a href="details.php?name=<?php echo $name; ?>&pk=<?php echo $arr[0]; ?>&id=<?php echo $row[$arr[0]]; ?>"><button type="button" class="btn btn-primary">View Details</button></a>
                      </td>
                    <?php }?>
                    <td>
                      <?php if ($_SESSION['role']=="admin"){?>
                        <a href="delete_record.php?name=<?php echo $name; ?>&pk=<?php echo $arr[0]; ?>&id=<?php echo $row[$arr[0]]; ?>&confirm=0"><button type="button" class="btn btn-danger">Delete</button></a>
                      </td>
                      <?php if($name=="post_incentives"){ ?>
                        <td><a href="details.php?name=blog_post&pk=bp_id&id=<?php echo $row["bp_id"]?>"><button class="btn btn-info">View Details</button></a></td>
                        <?php if($row["reward_status"]=="not_given"){ ?>
                        <td><a href="incentive_process.php?id=<?php echo $row["pi_id"]?>"><button class="btn btn-success">Incentives Given</button></a></td>
                      <?php } ?>
                      <?php } ?>
                      <?php if($name=="tour_packages"){ ?>
                        <td><a href="update_package.php?id=<?php echo $row["package_id"]?>"><button class="btn btn-info">Update Package</button></a></td>
                      <?php } ?>
                      <?php if($name=="users"){ ?>
                        <?php if($row["role"]!="admin"){?>
                        <td><a href="admin_moderator.php?id=<?php echo $row["user_id"]?>&role=<?php echo "admin";?>"><button class="btn btn-info">Make Admin</button></a></td>
                      <?php } ?>
                      <?php if($row["role"]!="moderator"){?>
                        <td><a href="admin_moderator.php?id=<?php echo $row["user_id"]?>&role=<?php echo "moderator";?>"><button class="btn btn-success">Make Moderator</button></a></td>
                      <?php } ?>
                      <?php
                        $sql8 = "SELECT * FROM `inspectors` where user_id='{$row["user_id"]}'";
                        $result8 = mysqli_query($con, $sql8);
                        if(mysqli_num_rows($result8)==0){
                      ?>
                      <td><a href="make_inspector.php?id=<?php echo $row["user_id"];?>"><button class="btn btn-primary">Make Inspector</button></a></td>
                      <?php } ?>
                      <?php } ?>
                    <?php } ?>
                    </tr>
                    <?php }}?>
                    </tbody>
                  </table>
                  <?php if ($name == "inspectors" or $name == "moderators") {?>
                  <a href="forms.php?name=<?php echo $name; ?>"><button type="button" class="btn btn-info">Add new Record</button></a>
                <?php }?>
                </div>
                <!-- /.table-responsive -->
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
</body>
</html>
