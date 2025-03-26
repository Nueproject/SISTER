<?php
include "lib/config.php";
include "lib/koneksi.php";

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { ?>
	 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           SELAMAT DATANG
            <small>di Sistem Terpadu Kanreg1BKN</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
       
        <!-- MENU DASHBOARD -->
          <div class="container"> 
            <div class="row">
              <div class="col-md-12">
                <hr>
              <h1 class="fw-bolder text-center">MENU DASHBOARD</h1>
              </div>
            </div>
              <div class="row container-md text-center">
               <div class="col-md text-center" >
                  <div class="row"> 
                    <div class="col container form-control">
                          <a href="adminweb.php?module=home"> <img src="img/assets/button/home.png" class="image"></a> 
                          <br> 
                          <button type="button" class="btn btn-outline-success">HOME</button>
                    </div>
                    <div class="col container form-control">
                          <a href="adminweb.php?module=resepsionis"> <img src="img/assets/button/resepsionis.png" class="image"></a> 
                          <br> 
                          <a href="adminweb.php?module=resepsionis"><button type="button" class="btn btn-outline-success">BUKU TAMU</button></a>
                    </div>
                    <div class="col container form-control">
                       <a href="adminweb.php?module=setup"> <img src="img/assets/button/setup.png" class="image"></a> 
                          <br> 
                       <button type="button" class="btn btn-outline-success">SETUP</button>
                    </div>
                  </div>
                  <!-- BARIS 2 -->
                  <div class="row"> 
                    <div class="col container form-control">
                          <a href="adminweb.php?module=pegawai"> <img src="img/assets/button/pns.png" class="image"></a> 
                          <br> 
                          <button type="button" class="btn btn-outline-success">DATA PEGAWAI</button>
                    </div>
                    <div class="col container form-control">
                          <a href="adminweb.php?module=telepon"> <img src="img/assets/button/telpon.png" class="image"></a> 
                          <br> 
                          <button type="button" class="btn btn-outline-success">NO TELPON RUANGAN</button>
                    </div>
                    <div class="col container form-control">
                       <a href="adminweb.php?module=laporan"> <img src="img/assets/button/report.png" class="image"></a> 
                          <br> 
                       <button type="button" class="btn btn-outline-success">LAPORAN</button>
                    </div>
                  </div>

                </div>
              </div>
          </div>




   

              
             
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <?php } ?>
