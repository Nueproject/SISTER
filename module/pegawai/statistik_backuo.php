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
             Statistik Data Pegawai
              <small>Kantor Regional I BKN Yogyakarta</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Pegawai</li>
            </ol>
        </section>

<?php
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 
?>

<div class="container px-4 p-3 text-center">
  <div class="row align-items-center">
        <div class="col">
          <div class="card">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title"><b>Total 164 Pegawai</b></h5>
              <p class="card-text">Jumlah Pegawai Kanreg dan UPT </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Laki-Laki</div>
                 <div class="col"><b>: 140 </b></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Perempuan</div>
                 <div class="col"><b>: 120 </b></div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title"><b>Total 164 Pegawai</b></h5>
              <p class="card-text">Jumlah Pegawai Kantor Regional I BKN Yogyakarta </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Laki-Laki</div>
                 <div class="col"><b>: 140 </b></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Perempuan</div>
                 <div class="col"><b>: 120 </b></div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title"><b>Total 164 Pegawai</b></h5>
              <p class="card-text">Jumlah Pegawai UPT BKN Semarang </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Laki-Laki</div>
                 <div class="col"><b>: 140 </b></div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                 <div class="col">Perempuan</div>
                 <div class="col"><b>: 120 </b></div>
                </div>
              </li>
            </ul>
          </div>
        </div>

          

    </div>
</div> <!-- end container -->
      <?php } ?>
        

      </div><!-- /.content-wrapper -->

<?php } ?>
