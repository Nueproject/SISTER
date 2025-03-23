 
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
        <div class="box-body no-padding">
                <table class="table table-hover">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>                        
                        <th>Bidang</th>
                        <th>Nomor HP</th>      
                        <th>Aksi</th>
                      </tr>
                      <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan order by nama_pegawai asc");   
     
                        $no=0;                     
                        while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_pegawai'];
                      $no+=1;
                      ?>
                      
                      <tr>             
                        <td><?php echo $no; ?></td>
                        <td>
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td>
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td>
                          <?php echo $usr['nama_jabatan']; ?>
                        </td>
                        <td>
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td>
                         <a href="https://wa.me/<?php echo $usr['nomor_hp']; ?>"> <?php echo $usr['nomor_hp']; ?> </a>
                        </td>
                        <td>
                          
                        </td>
                      
                      </tr>
                      <?php } ?>
                </table>
              </div>              
          <!-- END DATA PEGAWAI -->
         

          

       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->
      <?php } ?>