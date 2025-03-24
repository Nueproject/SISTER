 
<?php
include "lib/config.php";
include "lib/koneksi.php";

// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 

 
  $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan order by nama_pegawai asc");   
  
  
          

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
                          <a href="sudimin.php?module=detail_absen&id=<?php echo $usr_id;?>"><button type="button" class="btn btn-sm btn-warning">DETAIL</button></a>
                        </td>
                      
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>              
            </div> <!-- end box solid -->
          </div>
          <!-- END ABSEN HARI INI -->
         




              </div> <!-- end of ROW BOX SOLID -->
            </div>
                 
          </div>
         </section>
      </div> <!-- CONTENT WRAPER -->




      <?php } ?>
