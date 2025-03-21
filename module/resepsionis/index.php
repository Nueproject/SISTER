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
            RESEPSIONIS
            <small>Buku Tamu</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Resepsionis</li>
          </ol>
        </section>

        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
              <div class="col-xs-12">
              
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#TamuBaru" aria-controls="home" role="tab" data-toggle="tab">Daftar Tamu</a></li>
              <li role="presentation" class="nav-link active"> <a class="dropdown-item" href="#TamuKonsultasi" aria-controls="profile" role="tab" data-toggle="tab">Konsultasi</a></li>
                <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#MenungguBerkas" aria-controls="messages" role="tab" data-toggle="tab">Menunggu Berkas</a></li>
                <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#TamuSelesai" aria-controls="messages" role="tab" data-toggle="tab">Selesai</a></li>
                <li role="presentation" class="nav-link active"><a class="dropdown-item" href="#HistoryTamu" aria-controls="messages" role="tab" data-toggle="tab">History Tamu</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="TamuBaru">
                <?php include "module/resepsionis/tamu_baru.php"; ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="TamuKonsultasi">
                <?php include "module/resepsionis/tamu_konsultasi.php";  ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="MenungguBerkas">
                <?php include "module/resepsionis/tamu_menunggu.php";  ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="TamuSelesai">
                <?php include "module/resepsionis/tamu_selesai.php";  ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="HistoryTamu">
                <?php include "module/resepsionis/tamu_all.php";  ?>
              </div>
            </div>
            <!-- End Tab panes -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
