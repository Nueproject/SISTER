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
            Telepon
            <small>Data</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Telepon</li>
          </ol>
        </section>

        
        <!-- Main content -->
          <section class="content">
          
              
           <div class="container px-4 p-3 text-white">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        <br>
        
               
               <!-- BOX TOOLS CARI-->
        <div class="box-tools">
          <form role="search" method="POST" action="adminweb.php?module=cari_pegawai">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" style="display: all;" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
        <!-- END BOX TOOLS -->
              <br>
            
               
                  <!-- DATA PNS -->
           <!--  FORM TABLE -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box box-solid">
              <div class="box-body no-padding">
                <table class="table table-hover table-striped" style="overflow-x: auto!important;">
                  <tbody>
                       <tr class="table-dark">
                        <th style="width: 2%" class="text-center">No</th>
                        <th style="width: 25%" class="text-center">Nama Bidang</th>
                        <th style="width: 33%" class="text-center">Lokasi</th>                        
                        <th  style="width: 25%" class="text-center">Nomor</th>
                      </tr>
                      <?php        
                      $datatlp= mysqli_query($koneksi,"select * from telepon tp join data_bidang db on tp.id_bidang = db.id_bidang");  
     
                        $no=0;                     
                        while($usr=mysqli_fetch_array($datatlp)){  
                      $usr_id = $usr['id_telepon'];
                      $no+=1;
                      ?>
                      
                      <tr>             
                        <td class="text-center"><?php echo $no; ?></td>
                        <td class="text-center">
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['lokasi']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nomor']; ?>
                        </td>
                        
                      
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>              
            </div> <!-- end box solid -->
          </div>     
          <!-- END DATA PEGAWAI -->


          <?php
      $datapeg= mysqli_query($koneksi,"select * from telepon tp join data_bidang db on tp.id_bidang = db.id_bidang"); 
     
      while($pro=mysqli_fetch_array($datapeg)){
        ?>
         
                            <!-- Modal for Edit Tamu Baru -->
                <div class="modal fade" id="editnomor<?php echo $pro['id_telepon'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content modal-lg">
                      <form action="module/setup/aksi_setup.php" method="post">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Data #<?php echo $pro['lokasi'];?></h4>
                      </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">                    
                                <?php $tgl_skrg = date("dmY"); ?>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Nama Bidang</label>
                                  <input type="hidden" value="<?php echo $pro['id_telepon'];?>" name="id_telepon" placeholder="id Telepon">
                                  <select class="form-control" id="bidang" name="bidang">
                                  <?php $default = $pro['nama_bidang']; ?>
                                    <option value="<?php echo $pro['id_bidang']; ?>"> <?php echo $pro['nama_bidang']; ?></option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from data_bidang");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_bidang']; ?>"> <?php echo $p['nama_bidang']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Lokasi</label>
                                  <input type="text" class="form-control" id="lokasi" value="<?php echo $pro['lokasi'];?>" name="lokasi" placeholder="Lokasi">
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Nomor</label>
                                  <input type="text" class="form-control" id="nomor" value="<?php echo $pro['nomor'];?>" name="nomor" placeholder="Nomor Telepon">
                                </div>
                           
                              </div>
                              
                            </div>
                          </div> <!--end modal body -->
                            <div class="modal-footer">
                            <button type="submit" name="editDataNomor" class="btn btn-primary">Update</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End for edit tamu baru -->

                
            <?php }; ?>

       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->

            
           
            <!-- End Tab panes -->
          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php } ?>
