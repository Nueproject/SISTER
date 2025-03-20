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

                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Quotation" aria-controls="home" role="tab" data-toggle="tab">Tamu Baru</a></li>
                    <li role="presentation"><a href="#po" aria-controls="profile" role="tab" data-toggle="tab">Purchase Order</a></li>
                    <li role="presentation"><a href="#Invoice" aria-controls="messages" role="tab" data-toggle="tab">Invoice</a></li>
                    <li role="presentation"><a href="#Kwitansi" aria-controls="settings" role="tab" data-toggle="tab">Kwitansi</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tamubaru">
                      
                      <?php
                        include "module/resepsionis/tamu_baru2.php";
                      ?>

                    </div>
                    

                    </div>
                  </div>

                </div>

              </div>
            </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
