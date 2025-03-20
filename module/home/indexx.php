<?php
include "/lib/config.php";
include "/lib/koneksi.php";

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
            Dashboard
            <small>Version 1.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
                  <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <!-- Main row -->
              <div class="row">
              <!-- disini -->
                <div class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Top 5 Product</h3>
                      
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                  

                    <div class="box-body no-padding">
                    
                      <ul class="users-list clearfix">
                      <?php
                $kueriPel= mysqli_query($koneksi, "select * from pelanggan order by id_pelanggan limit 5");
                while($kat=mysqli_fetch_array($kueriPel)){
                ?> 
                        <li> 
                        <small>                      
                          <img src="asset/dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#"><?php echo $kat['nama']; ?></a>
                          <span class="users-list-date"><?php echo $kat['no_hp']; ?></span>
                        </small>
                        </li>

                    

                        <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="adminweb.php?module=pelanggan" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->

    
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Recap Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>
                      <div class="progress-group">
                        <span class="progress-text">Pembelian</span>
                        <?php
                  $kueriPembelian= mysqli_query($koneksi, "select count(*) as jumlah FROM beli");
                  while($kat=mysqli_fetch_array($kueriPembelian)){
                  ?>
                        <span class="progress-number"><b><?php echo $kat['jumlah']; ?></b></span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-aqua" style="width: <?php echo $kat['jumlah']; ?>%"></div>
                        </div>
                        <?php
                      }
                      ?>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Pemesanan</span>
                        <?php
                  $kueriPemesanan= mysqli_query($koneksi, "select count(*) as jumlah FROM pesan");
                  while($kat=mysqli_fetch_array($kueriPemesanan)){
                  ?>
                        <span class="progress-number"><b><?php echo $kat['jumlah']; ?></b></span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-red" style="width: <?php echo $kat['jumlah']; ?>%"></div>
                        </div>
                        <?php
                        }
                        ?>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Penjualan</span>
                        <?php
                  $kueriPenjualan= mysqli_query($koneksi, "select count(*) as jumlah FROM jual");
                  while($kat=mysqli_fetch_array($kueriPenjualan)){
                  ?>
                        <span class="progress-number"><b><?php echo $kat['jumlah']; ?></b></span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-green" style="width: <?php echo $kat['jumlah']; ?>%"></div>
                          <?php
                      }
                      ?>
                        </div>
                      </div><!-- /.progress-group -->
                      <div class="progress-group">
                        <span class="progress-text">Pelanggan</span>
                        <?php
                  $kueriPelanggan= mysqli_query($koneksi, "select count(*) as jumlah FROM pelanggan");
                  while($kat=mysqli_fetch_array($kueriPelanggan)){
                  ?>
                        <span class="progress-number"><b><?php echo $kat['jumlah']; ?></b></span>
                        <div class="progress sm">
                          <div class="progress-bar progress-bar-yellow" style="width: <?php echo $kat['jumlah']; ?>%"></div>
                          <?php
                      }
                      ?>
                        </div>
                      </div><!-- /.progress-group -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">

                    <div class="col-sm-3 col-xs-6">
                    <?php
                  $kueriPenjualan= mysqli_query($koneksi, "select sum(harga) as total FROM detail_jual");
                  while($kat=mysqli_fetch_array($kueriPenjualan)){
                  ?>
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">Rp <?php echo $kat['total']; ?></h5><?php } ?>
                        <span class="description-text">TOTAL REVENUE</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                    <?php
                  $kueriPembelian= mysqli_query($koneksi, "select sum(subtotal) as total FROM detail_beli");
                  while($kat=mysqli_fetch_array($kueriPembelian)){
                  ?>
                      <div class="description-block border-right">
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">Rp <?php echo $kat['total']; ?></h5> <?php } ?>
                        <span class="description-text">TOTAL COST</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
              <div class="row">
              <!-- disini -->
                <div class="col-md-12">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                      <?php
                $kueriPel= mysqli_query($koneksi, "select * from pelanggan");
                while($kat=mysqli_fetch_array($kueriPel)){
                ?>
                        <li>
                          <img src="asset/dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="#"><?php echo $kat['nama']; ?></a>
                          <span class="users-list-date"><?php echo $kat['no_hp']; ?></span>
                        </li>
                        <?php } ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="adminweb.php?module=pelanggan" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>ID Jual</th>
                          <th>Item</th>
                          <th>Status</th>
                          <th>Alamat</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                include "../lib/config.php";
                include "../lib/koneksi.php";
                $kueriJual= mysqli_query($koneksi,"select jual.id_jual, nama_kopi, status, alamat from jual join detail_jual on detail_jual.id_jual = jual.id_jual 
join kopi on detail_jual.id_kopi = kopi.id_kopi");
                while($pro=mysqli_fetch_array($kueriJual)){
                ?>
                        <tr>
                          <td><a href="pages/examples/invoice.html"><?php echo $pro['id_jual']; ?></a></td>
                          <td><?php echo $pro['nama_kopi']; ?></td>
                          <td><span class="label label-success"><?php echo $pro['status']; ?></span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $pro['alamat']; ?></div></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="adminweb.php?module=penjualan" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
              <!-- PRODUCT LIST -->
              <div class="row">
              <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Products</h3>
                  
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  <?php
                  $kueriKopi= mysqli_query($koneksi,"select * FROM kopi");
                  while($kat=mysqli_fetch_array($kueriKopi)){
                  ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title"><?php echo $kat['nama_kopi']; ?> <span class="label label-warning pull-right"><?php echo $kat['harga']; ?></span></a>
                        <span class="product-description">
                          <?php echo $kat['deskripsi']; ?>
                        </span>
                      </div>
                    </li>
                    <?php } ?>
                    <!-- /.item -->

                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  <?php } ?>
