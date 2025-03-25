 
<?php
include "lib/config.php";
include "lib/koneksi.php";

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 

 $nama=$_POST['search'];
      $saiki = date('Y-m-d');
      $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);
  $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan where nama_pegawai like '%$nama%' or nip_pegawai like '%$nama%' or nama_bidang like '%$nama%' order by nama_pegawai asc");   
  

?>

 


      <div class="content-wrapper">
        <section class="content-header">
          <h1>
           Hasil Pencarian
            <small>Data Pegawai</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pencarian</li>
          </ol>
        </section>

        <section class="content">
            <div class="row">


              
              <div class="row box box-solid">
                <br>


                <!-- BOX TOOLS -->
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

                  <!-- DATA PNS -->
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
                        $no=0;                     
                        while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_pegawai'];
                      $no+=1;
                      ?>
                      
                      <tr>             
                        <td class="text-center"><?php echo $no; ?></td>
                        <td>
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_pegawai']; ?>
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
                        <td class="text-center">
                           <!-- Example split danger button -->
                <div class="btn-group">
                  <a class="btn btn-sm btn-danger" href="module/pegawai/aksi_hapus.php?id_pegawai=<?php echo $usr['id_pegawai'];?>" onClick="return confirm('Anda yakin ingin <?php echo $usr['nama_pegawai'];?>?')">Delete</a> 
                  <a class="btn btn-sm btn-primary" href="javascript::void(0)" data-toggle="modal" data-target="#editpegawai<?php echo $usr['id_pegawai'];?>" >Edit</a>
                </div>

                        </td>
                      
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>              
            </div> <!-- end box solid -->
          </div>
          <!-- END ABSEN HARI INI -->
         

           <?php
      $datapeg= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan"); 
     
      while($pro=mysqli_fetch_array($datapeg)){
        ?>

           <!-- Modal for Edit Tamu Baru -->
<div class="modal fade" id="editpegawai<?php echo $pro['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <form action="module/pegawai/aksi_pegawai.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit Data #<?php echo $pro['nama_pegawai'];?></h4>
      </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">                    
                <?php $tgl_skrg = date("dmY"); ?>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="idTamuInstansi" value="<?php echo $pro['nama_pegawai'];?>" name="nama" placeholder="Nama">
                  <input type="hidden" value="<?php echo $pro['id_pegawai'];?>" name="idPegawai" placeholder="Id Pegawai">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">NIP</label>
                  <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['nip_pegawai'];?>" name="nip" placeholder="NIP Pegawai">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jabatan</label>
                  <select class="form-control" id="jabatan" name="jabatan">
                  <?php $default = $pro['nama_jabatan']; ?>
                    <option value="<?php echo $pro['id_jabatan']; ?>"> <?php echo $pro['nama_jabatan']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_jabatan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_jabatan']; ?>"> <?php echo $p['nama_jabatan']; ?></option>
                            <?php } ?>
                  </select>

                </div>
                 
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Bidang</label>
                  <select class="form-control" id="bidang" name="bidangUpdate">
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
                  <label for="inputEmail3" class="control-label">Nomor HP</label>
                  <input type="text" class="form-control" id="keperluan" value="<?php echo $pro['nomor_hp']?>" name="NoHP" placeholder="Nomor HP">
                </div>                
              </div>
              
            </div>
          </div> <!--end modal body -->
            <div class="modal-footer">
            <button type="submit" name="editDataPegawai" class="btn btn-primary">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End for edit tamu baru -->

<?php }; ?>          



              </div> <!-- end of ROW BOX SOLID -->
            </div>
                 
          </div>
         </section>
      </div> <!-- CONTENT WRAPER -->




      <?php } ?>
