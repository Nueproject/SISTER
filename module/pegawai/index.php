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
            Data Pegawai
            <small>Kantor Regional I BKN Yogyakarta</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pegawai</li>
          </ol>
        </section>



<?php
include "lib/config.php";
include "lib/koneksi.php";

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 

?>

 

<div class="container px-4 p-3 text-white">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        <br>
              <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataPegawai"><button type="button" class="btn btn-sm btn-primary">Tambah Pegawai</button></a>
              </div>

<div class="modal fade bd-example-modal-lg" id="tambahDataPegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="module/resepsionis/aksi_resepsionis.php" method="post">
      <div class="modal-body">
        <div class="row">       
          <div class="col-md-6">
         
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Lengkap :</label>
              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahBaru']['namaLengkap']; ?>" name="namaLengkap" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">NIP :</label>
              <input type="text" class="form-control" id="nip"  value="<?php echo @$_SESSION['formTambahBaru']['nip_tamu']; ?>" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nomor HP :</label>
              <input type="text" class="form-control" id="noHp" value="<?php echo @$_SESSION['formTambahBaru']['noHp']; ?>" name="noHp" placeholder="Nomor HP">
            </div> 
            
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Wilayah :</label>
            <select class="form-control" id="namaInstansi" name="namaInstansi" required>
                  <option selected>Pilih Instansi</option>
                      <?php 
                            $instansi = "select * from data_instansi";
                            $kueriQuo= mysqli_query($koneksi, $instansi);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_instansi']?>"><?=$pro['nama_instansi']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

            <div class="form-group">
              <label for="recipient-name" class="control-label">Instansi :</label>
              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahBaru']['ketInstansi']; ?>" name="ketInstansi" placeholder="Nama Instansi">
            </div>
     
       
          </div> <!-- end col-md6 -->

          <div class="col-md-6"> <!-- col-md6 -->
       

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Bidang :</label>
          <select class="form-control" id="bidang" name="bidang" required>
                <option selected>Pilih Bidang</option>
                    <?php 
                          $bidang = "select * from data_bidang";
                          $kueriBid= mysqli_query($koneksi, $bidang);
                          while($pro=mysqli_fetch_array($kueriBid)){
                        ?>
                      <option value="<?=$pro['id_bidang']?>"><?=$pro['nama_bidang']?></option> 
                    <?php
                      }
                    ?>
              </select>
              <div class="invalid-feedback">Example invalid custom select feedback</div>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Keperluan :</label>
            <input type="text" class="form-control" id="keperluan" value="<?php echo @$_SESSION['formTambahBaru']['keperluan']; ?>" name="keperluan" placeholder="Keperluan">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" value="<?php echo @$_SESSION['formTambahBaru']['keterangan']; ?>" name="keterangan" placeholder="Keterangan"></textarea>
          </div>

          </div> <!-- end col-md6 -->
        </div>  <!-- end row -->      
      </div> <!-- End Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveTamuBaru" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- end modal for tambah -->






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
                        <th style="width: 10px" class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>                        
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Bidang</th>                        
                        <th class="text-center">Nomor HP</th>
                        <th class="text-right">Aksi</th>
                      </tr>
                      <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan order by nama_pegawai asc");   
     
                        $no=0;                     
                        while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_pegawai'];
                      $no+=1;
                      ?>
                      
                      <tr>             
                        <td class="text-center"><?php echo $no; ?></td>
                        <td class="text-center">
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nip_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_jabatan']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td class="text-center">
                         <a href="https://wa.me/<?php echo $usr['nomor_hp']; ?>"> <?php echo $usr['nomor_hp']; ?> </a>
                        </td>
                        <td>
                          <!-- Single button -->                
                
                  <!-- Example split danger button -->
                <div class="btn-group">
                  <a href="sudimin.php?module=detail_absen&id=<?php echo $usr_id;?>"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a> 
                  <a href="sudimin.php?module=detail_absen&id=<?php echo $usr_id;?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                </div>

                <!-- END OPTION -->
                        </td>
                      
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>              
            </div> <!-- end box solid -->
          </div>     
          <!-- END DATA PEGAWAI -->
         

          

       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->
      <?php } ?>
        

      </div><!-- /.content-wrapper -->

<?php } ?>
