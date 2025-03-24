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
        <section class="content-header">
          <h1>
            SETUP
            <small>Data</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SETUP</li>
          </ol>
        </section>

        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
              <div class="col-xs-12">
              
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#DataPNS" aria-controls="home" role="tab" data-toggle="tab">Data PNS</a></li>
              <li role="presentation" class="nav-link active"> <a class="dropdown-item" href="#DataInstansi" aria-controls="profile" role="tab" data-toggle="tab">Data Instansi</a></li>
             <li role="presentation" class="nav-link active"> <a class="dropdown-item" href="#DataTelepon" aria-controls="profile" role="tab" data-toggle="tab">Data Telepon</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="DataPNS">
                <?php include "module/setup/data_pns.php"; ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="DataInstansi">
                <?php include "module/setup/data_instansi.php"; ?>
              </div>
               <div role="tabpanel" class="tab-pane" id="DataTelepon">
                <?php include "module/setup/data_nomor.php"; ?>
              </div>
            </div>
            <!-- End Tab panes -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
