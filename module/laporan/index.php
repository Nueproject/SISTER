<?php

//session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {

      echo "<center>Untuk mengakses modul, Anda harus login <br>";
      echo "<a href=../../index.php><b>LOGIN</b></a></center>";

} else { 

    include "lib/config.php";
    include "lib/koneksi.php";

  ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
              <div class="col-xl-12">
              
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#DataBulanan" aria-controls="home" role="tab" data-toggle="tab">Data Bulanan</a></li>
              <li role="presentation" class="nav-link active"> <a class="dropdown-item" href="#CetakLaporan" aria-controls="profile" role="tab" data-toggle="tab">CETAK LAPORAN</a></li>
             <li role="presentation" class="nav-link active"> <a class="dropdown-item" href="#DataTelepon" aria-controls="profile" role="tab" data-toggle="tab">Data Telepon</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="DataBulanan">
                <?php include "module/laporan/data_bulanan.php"; ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="CetakLaporan">
                <?php include "module/laporan/cetak_laporan.php"; ?>
              </div>
               <div role="tabpanel" class="tab-pane" id="DataTelepon">
                <?php include "module/laporan/data_nomor.php"; ?>
              </div>
            </div>
            <!-- End Tab panes -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
