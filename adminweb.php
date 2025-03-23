<?php
include "lib/config.php";     			
include "lib/koneksi.php";

require_once __DIR__ . '/vendor/autoload.php';

ob_start();
session_start();

//unset($_SESSION['productListUpdatePO']);

if (empty($_SESSION['username']) AND empty($_SESSION['pass'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 
	$user = $_SESSION['username'];
    $sqlUser = "select * from user where username='".$_SESSION['username']."'";

 	$kuerisqluser= mysqli_query($koneksi,"select * from user where username='".$_SESSION['username']."'");
 
 	$user = $_SESSION['username'];

 	  


	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>SISTEM TERPADU</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">


	
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">

			<header class="main-header">

				<!-- Logo -->
				<a href="adminweb.php?module=home" class="logo nav-link"> <!-- mini logo for sidebar mini 50x50 pixels --> 
				<span class="logo-mini"><b>BKN</b></span> <!-- logo for regular state and mobile devices --> 
				<span class="logo-lg"><b>Sistem </b>Terpadu</span> </a>

				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top px-8" role="navigation">
					<!-- Sidebar toggle button-->					
					<a href="#" class="sidebar" data-toggle="offcanvas" role="button"> 
						<!-- <span class="sr-only">MENU</span>  -->
						<img src="img/assets/button/menu.png" class="image">
					</a>
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Messages: style can be found in dropdown.less-->

							<!-- Notifications: style can be found in dropdown.less -->

							<!-- Tasks: style can be found in dropdown.less -->
							
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu">
								
								<a href="#" class="dropdown-togglenav" data-toggle="dropdown"> <img src="img/assets/cera.png" class="user-image" alt="User Image"> <span class="hidden-xs"><?php 	  echo "<text class='text-uppercase'> $user </text>"; ?></span> </a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="img/assets/logobkn.png" class="img-circle" alt="User Image">
										<p>
											My Sistem Terpadu
											<small>Kanreg I BKN Yogyakarta</small>
										</p>
									</li>
									<!-- Menu Body -->
									<li class="user-body">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="#" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="admin/logout.php" class="btn btn-default btn-flat">Sign out</a>
										</div>
									</li>
								</ul>
							</li>
							<!-- Control Sidebar Toggle Button -->

						</ul>
					</div>

				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="img/assets/logobkn.png" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>
								<?php 	  echo "<text class='text-uppercase'> $user </text>"; ?>
							</p>
							<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
						</div>
					</div>
					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
						<div class="input-group">
							<input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat">
									<i class="fa fa-search"></i>
								</button> </span>
						</div>
					</form>
					<!-- /.search form -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">
							MAIN NAVIGATION
						</li>

						<li>
							<a class="dropdown-item" href="adminweb.php?module=home"> <i class="fa fa-home"></i> <span>Home</span> </a>
						</li>
					
						
						<li>
							<a class="dropdown-item" href="adminweb.php?module=resepsionis"> <i class="fa fa-shopping-cart"></i> <span>Resepsionis</span> </a>
						</li>

						<li>
							<a class="dropdown-item" href="adminweb.php?module=setup"> <i class="fa fa-shopping-cart"></i> <span>Setup</span> </a>
						</li>

						<li>
							<a class="dropdown-item" href="adminweb.php?module=pegawai"> <i class="fa fa-shopping-cart"></i> <span>Data PNS</span> </a>
						</li>
						
         	 			<li>
							<a class="dropdown-item" href="adminweb.php?module=barcode"> <i class="fa fa-male"></i> <span>Admin</span> </a>
						</li>
						<li>
							<a class="dropdown-item" href="logout.php"> <i class="fa fa-power-off"></i> <span>Logout</span> </a>
						</li>



					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
			<?php

            if ($_GET['module'] == 'home') {
                include "module/home/index.php";

			} elseif ($_GET['module'] == 'resepsionis') {
                include "module/resepsionis/index.php";
            } elseif ($_GET['module'] == 'search') {
                include "module/resepsionis/form_cari.php";
            } elseif ($_GET['module'] == 'cari_pegawai') {
                include "module/pegawai/form_cari.php";
            } elseif ($_GET['module'] == 'setup') {
                include "odule/setup/index.php";
            } elseif ($_GET['module'] == 'pegawai') {
                include "module/pegawai/index.php";
            } elseif ($_GET['module'] == 'barcode') {
                include "module/resepsionis/barcode.php";				
			} elseif ($_GET['module'] == 'hapus_user') {
                include "module/marketing_sales/aksi_hapus.php";				
			} 

            else {
            	 include "module/home/index.php";
            }
			?>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>SISTER</b> 1.0
				</div>
				<strong>Copyright &copy; 2023 <a href="yogyakarta.bkn.go.id.com">Kanreg I BKN Yogyakarta</a>.</strong> All rights reserved.
			</footer>

			<!-- Control Sidebar -->

			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>

		</div><!-- ./wrapper -->

		

	      <script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	 


<!-- jQuery 2.1.4 -->
<script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- jQuery 2.1.4 -->
		<script src="asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="asset/bootstrap/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="asset/plugins/fastclick/fastclick.min.js"></script>
		<!-- AdminLTE App -->
		<script src="asset/dist/js/app.min.js"></script>
		<!-- Sparkline -->
		<script src="asset/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- SlimScroll 1.3.0 -->
		<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- ChartJS 1.0.1 -->
		<script src="asset/plugins/chartjs/Chart.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="asset/dist/js/pages/dashboard2.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="asset/dist/js/demo.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		
	</body>
</html>
<?php } ?>
