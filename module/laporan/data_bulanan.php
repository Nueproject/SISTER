<?php
    include "lib/config.php";
    include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
      echo "<center>Untuk mengakses modul, Anda harus login <br>";
      echo "<a href=$base_url><b>LOGIN</b></a></center>";
} else { 

  ?>
  <!-- CSS Boostrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<!-- CSS Bootstrap Datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Javascript Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<!-- Javascript Bootstrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>



    <!-- Content Wrapper. Contains page content -->
    <div class="container-fluid">
        <div class="kotak">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">


      <?php     
      $dataLaporan = mysqli_query($koneksi,"select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai"); 
      ?>
             

        <form id="myform" method="post">
    <select name = 'bln' style = 'position: relative' class="pull-right" onchange="change()">
    <?php
    function  getBulan($bln){
      switch  ($bln){
          case  1:
          return  "Januari";
          break;
          case  2:
          return  "Februari";
          break;
          case  3:
          return  "Maret";
          break;
          case  4:
          return  "April";
          break;
          case  5:
          return  "Mei";
          break;
          case  6:
          return  "Juni";
          break;
          case  7:
          return  "Juli";
          break;
          case  8:
          return  "Agustus";
          break;
          case  9:
          return  "September";
          break;
          case  10:
          return  "Oktober";
          break;
          case  11:
          return  "November";
          break;
          case  12:
          return  "Desember";
          break;
      }
  }
 
  //echo "sekarang bulan ".$bulan;
    if (empty($_POST['bln'])){
      $angka=date('m'); 
    } else {
    $angka=$_POST['bln'];
    }  
    $bulan = getBulan($angka);?>
        <option value="<?php echo $angka?>"><?php echo $bulan?></option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    

     <!--  FORM TABLE -->
     <div class="box-body no-padding">
        <table class="table table-hover table-striped ">
        <br>
          <tr class="table-dark">
            <th width="2%"><center>NO</center></th>
            <th width="7%"><center>TANGGAL</center></th>
            <th width="11%"><center>NAMA</center></th>
            <th width="15%"><center>INSTANSI</center></th>
            <th width="15%"><center>WILAYAH</center></th>
            <th width= "6%"><center>BIDANG</center></th>
            <th width= "19%"><center>KEPERLUAN</center></th>
            <th width= "11%"><center>PENERIMA</center></th>
            <th width= "10%"><center>AKSI</center></th>
          </tr>
      <?php
        if (empty($_POST['bln'])){
          $bln=date('m'); 
        } else {
        $bln=$_POST['bln'];
        }
      $tahun = date('Y');

      $dataPel = mysqli_query($koneksi,"select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai where MONTH(tgl_datang) = '$bln' and YEAR(tgl_datang) = '$tahun' order by tgl_datang desc");  
      $no=0;
      while($pro=mysqli_fetch_array($dataPel)){
      $tgl =  $pro['tgl_datang'];
      $tgl_indo = date('d F Y', strtotime($tgl));
      $no+=1; 
      ?>
          <tr>
            <td><center><?php echo $no; ?></center></td>
            <td><center><?php echo $tgl_indo; ?></center></td>
            <td><center><?php echo $pro['nama_tamu']; ?></center></td>
            <td><center><?php echo $pro['ket_instansi']; ?></center></td>
            <td><center><?php echo $pro['nama_instansi']; ?></center></td>
            <td><center><?php echo $pro['nama_bidang']; ?></center></td>
           <td><center><?php echo $pro['keperluan']; ?></center></td>
           <td><center><?php echo $pro['nama_pegawai']; ?></center></td>
            <td><center>
                  <!-- Example split danger button -->
                          <div class="btn-group">
                            <a class="btn btn-sm btn-danger" href="module/setup/aksi_hapus_instansi.php?id_instansi=<?php echo $usr['id_instansi'];?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $usr['nama_instansi'];?>?')">CETAK</a> 
                           
                          </div>
                          <!-- END OPTION -->
              </center>
            </td>
          </tr>
    <?php } ?>
            
        </table>
      </div>
      <!--  END FORM TABLE -->
      </form>

      <script>
      function change(){
          document.getElementById("myform").submit();
      }
      </script>
     

              </div> <!-- End Box Header -->
            </div> <!-- End Box -->
          </div> <!-- End Col-md-12 -->
        </div> <!-- End row -->
      </div> <!-- End Container Fluid -->

    </div> <!-- END OF KOTAK -->
    </div> <!-- END OF CONTAINER -->
<?php } ?>