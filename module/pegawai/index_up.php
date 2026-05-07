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

<!-- MODAL TAMBAH PEGAWAI -->
<div class="modal fade bd-example-modal-md" id="tambahDataPegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="module/pegawai/aksi_pegawai.php" method="post">
      <div class="modal-body">
        <div class="row">       
          <div class="col-md-12">
         
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Lengkap :</label>
              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahPegawai']['namaLengkap']; ?>" name="namaLengkap" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">NIP :</label>
              <input type="text" class="form-control" id="nip"  value="<?php echo @$_SESSION['formTambahPegawai']['nip_pegawai']; ?>" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
            <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jenis Kelamin</label>
                  <select class="form-control" id="kelamin" name="kelamin">
                    <option> Pilih Jenis Kelamin</option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_kelamin");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_kelamin']; ?>"> <?php echo $p['nama_kelamin']; ?></option>
                            <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Golongan</label>
                  <select class="form-control" id="golongan" name="golongan">
                    <option>Pilih Golongan</option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_golongan order by nama_golongan asc");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_golongan']; ?>"> <?php echo $p['nama_golongan']; ?></option>
                            <?php } ?>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Status</label>
                  <select class="form-control" id="status" name="status">
                    <option>Pilih Status</option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_status order by nama_status asc");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_status']; ?>"> <?php echo $p['nama_status']; ?></option>
                            <?php } ?>
                   
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Gelar</label>
                  <select class="form-control" id="gelar" name="gelar">
                    <option>Pilih Gelar</option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from gelar order by nama_gelar asc");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_gelar']; ?>"> <?php echo $p['nama_gelar']; ?></option>
                            <?php } ?>
                   
                  </select>
                </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nomor HP :</label>
              <input type="text" class="form-control" id="noHp" value="<?php echo @$_SESSION['formTambahPegawai']['noHp']; ?>" name="noHp" placeholder="Nomor HP">
            </div> 
            
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bidang :</label>
            <select class="form-control" id="namaBidang" name="namaBidang" required>
                  <option selected>Pilih Bidang</option>
                      <?php 
                            $instansi = "select * from data_bidang order by nama_bidang asc";
                            $kueriQuo= mysqli_query($koneksi, $instansi);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_bidang']?>"><?=$pro['nama_bidang']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

           <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jabatan</label>
                  <select class="form-control" id="namaJabatan" name="namaJabatan">
                  <option selected>Pilih Jabatan</option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jabatan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_jabatan']; ?>"> <?php echo $p['nama_jabatan']; ?></option>
                            <?php } ?>
                  </select>
                </div>

              <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jenis Jabatan :</label>
            <select class="form-control" id="namaJenisJabatan" name="namaJenisJabatan" required><?php $default = $pro['nama_jenis_jabatan']; ?>
                  <option selected>Pilih Jenis Jabatan</option>
                      <?php 
                            $jenis_jabatan = "select * from jenis_jabatan order by nama_jenis_jabatan asc";
                            $kueriQuo= mysqli_query($koneksi, $jenis_jabatan);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_jenis_jabatan']?>"><?=$pro['nama_jenis_jabatan']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>


       
          </div> <!-- end col-md6 -->

        </div>  <!-- end row -->      
      </div> <!-- End Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveTambahPegawai" class="btn btn-primary">SIMPAN</button>
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
                        <th class="text-center">Aksi</th>
                       <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jenis_jabatan =  jj.id_jenis_jabatan order by nama_pegawai asc");   
     
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
                          <?php echo $usr['nip_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_jenis_jabatan']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td>
                          <!-- Single button -->                
                
                  <!-- Example split danger button -->
                <div class="btn-group">
                  <a class="btn btn-sm btn-dark" href="javascript::void(0)" data-toggle="modal" data-target="#detailpegawai<?php echo $usr['id_pegawai'];?>" >Detail</a>
                  <a class="btn btn-sm btn-primary" href="javascript::void(0)" data-toggle="modal" data-target="#editpegawai<?php echo $usr['id_pegawai'];?>" >Edit</a>
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
         

          <?php
      $datapeg= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jenis_jabatan =  jj.id_jenis_jabatan join jabatan jb on dp.jabatan =  jb.id_jabatan join jenis_golongan jg on dp.golongan =  jg.id_golongan join jenis_kelamin jk on dp.jenis_kelamin =  jk.id_kelamin join gelar jgg on dp.gelar =  jgg.id_gelar join jenis_status js on dp.status =  js.id_status");  

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

      while($pro=mysqli_fetch_array($datapeg)){
         if (!function_exists('tgl_lahir_nip')) {
                            function tgl_lahir_nip($nip) {
                                $tahun   = substr($nip, 0, 4);
                                $bulan   = substr($nip, 4, 2);
                                $tanggal = substr($nip, 6, 2);

                                $nama_bulan = [
                                    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
                                    '04' => 'April',   '05' => 'Mei',      '06' => 'Juni',
                                    '07' => 'Juli',    '08' => 'Agustus',  '09' => 'September',
                                    '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                                ];

                                return (int)$tanggal . " " . $nama_bulan[$bulan] . " " . $tahun;
                            }
                        }

                    // MENGHITUNG TMT
                        if (!function_exists('getBulan')) {
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
     } 
     // END FUNCTION BULAN
                       if (!function_exists('hitung_masa_kerja')) {
    function hitung_masa_kerja($nip) {
        // 1. Ambil Tahun dan Bulan pengangkatan dari NIP (digit ke-9 sampai 14)
        $tahun_sk = substr($nip, 8, 4);
        $bulan_sk = substr($nip, 12, 2);

        // 2. Buat objek tanggal berdasarkan info NIP (set ke tanggal 1 bulan tersebut)
        $tgl_mulai = new DateTime($tahun_sk . "-" . $bulan_sk . "-01");
        $tgl_sekarang = new DateTime(); // Tanggal hari ini

        // 3. Hitung selisih
        $diff = $tgl_sekarang->diff($tgl_mulai);

        // 4. Kembalikan hasil dalam format Tahun dan Bulan
        return $diff->y . " Tahun, " . $diff->m . " Bulan";
    }
}

                        $tahun_lahir = substr($pro['nip_pegawai'], 0, 4);
                        $bln = substr($pro['nip_pegawai'], 4, 2);
                        $tanggal_lahir = substr($pro['nip_pegawai'], 6, 2);
                        $bulan_lahir = getBulan($bln);
                        $ttl="$tanggal_lahir $bulan_lahir $tahun_lahir";

                        $ttl_lengkap ="$tahun_lahir-$bln-$tanggal_lahir";
                        $newTTL = date("d-m-Y", strtotime($ttl_lengkap));
                        $bday = new DateTime($newTTL);
                        $today = new DateTime('today');
                        $diff = $bday->diff($today);
                        $umur = "$diff->y";
                        $thn_sekarang = date("Y");
                        $angkatanpppk = substr($pro['nip_pegawai'], 8, 4);
                        $jmlthun = $thn_sekarang-$angkatanpppk;
                        $status = $pro['status'];

                        $tahun_angkat = substr($pro['nip_pegawai'], 8, 4);
                        $bulan_angka = substr($pro['nip_pegawai'], 12, 2);
                        $bulan_angkatan = getBulan($bulan_angka);
                        $pengangkatan= "1 $bulan_angkatan $tahun_angkat";



                        if($pro['status']==1 or $pro['status']==5){
                          $tmt_diangkat = "$pengangkatan";
                        } else if($pro['status']==2 or $pro['status']==3){
                          $tmt_diangkat = "$jmlthun Tahun";
                        } else{
                          $tmt_diangkat = "Bukan ASN";        
                        };

                       if($pro['jenis_jabatan']==13 or $pro['jenis_jabatan']==30 or $pro['jenis_jabatan']==41 or $pro['jenis_jabatan']==45 or $pro['jenis_jabatan']==46 or $pro['jenis_jabatan']==1 or $pro['jenis_jabatan']==2){
                        if($bln<12){
                          $bln_p = $bln+1;
                          $masa = 59-$umur;
                        }else{
                          $bln_p = $bln-11;
                          $masa = 59-$umur+1;
                        };

                       } else {
                        if($bln<12){
                          $bln_p = $bln+1;
                          $masa = 57-$umur;
                        }else{
                          $bln_p = $bln-11;
                          $masa = 57-$umur+1;
                        };

                       };

                       

                        $bln_pensiun = getBulan($bln_p);
                        $thn_pensiun = Date("Y")+$masa;
                        $tmt_pensiun = "1 $bln_pensiun $thn_pensiun";

        ?>

<!-- Modal for Detail Pegawai -->
<div class="modal fade" id="detailpegawai<?php echo $pro['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="dialog">
    <div class="modal-content modal-lg">
      <form action="module/pegawai/aksi_pegawai.php" method="post">
      <div class="modal-header">
        <h4 class="modal-title"> Detail Data </h4>
      </div>

          <div class="modal-body">
            <div class="row">

              <div class="col-md-3">                
        <h4 class="modal-title"> INI UNTUK FOTO PROFILE </h4>
              </div>

              <div class="col-md-4">                    
                <?php $tgl_skrg = date("dmY"); ?>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="idTamuInstansi" value="<?php echo $pro['nama_pegawai'];?>" name="nama" placeholder="Nama" readonly>
                  <input type="hidden" value="<?php echo $pro['id_pegawai'];?>" name="idPegawai" placeholder="Id Pegawai">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">NIP</label>
                  <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['nip_pegawai'];?>" name="nip" placeholder="NIP Pegawai" readonly>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['nama_kelamin'];?>" name="nip" placeholder="NIP Pegawai" readonly>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jabatan</label>
                   <input type="text" class="form-control" id="jenisjabatan" name="jenisjabatan" value="<?php echo $pro['nama_jabatan'];?>"  placeholder="NIP Pegawai" readonly>
                </div>
                 
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Golongan</label>
                   <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $pro['nama_golongan'];?>"  placeholder="NIP Pegawai" readonly>
                </div>  

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Bidang</label>
                   <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $pro['nama_bidang'];?>"  placeholder="NIP Pegawai" readonly>
                </div>               
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Status</label>
                   <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $pro['nama_status']; ?>"  placeholder="NIP Pegawai" readonly>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Gelar</label>
                   <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $pro['nama_gelar'];?>"  placeholder="NIP Pegawai" readonly>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Tanggal Lahir</label>
                   <input type="text" class="form-control" value=" <?php echo tgl_lahir_nip($pro['nip_pegawai']); ?>"  placeholder="NIP Pegawai" readonly>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">TMT Pengangkatan</label>
                   <input type="text" class="form-control" value="<?php echo $tmt_diangkat;?>"  placeholder="NIP Pegawai" readonly>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">TMT Pensiun</label>
                   <input type="text" class="form-control" value="<?php echo $tmt_pensiun;?>"  placeholder="NIP Pegawai" readonly>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nomor HP</label>
                  <input type="text" class="form-control" id="keperluan" value="<?php echo $pro['nomor_hp'];?>" name="NoHP" placeholder="Nomor HP" readonly>
                </div> 
              </div>
              
            </div>
          </div> <!--end modal body -->
            <div class="modal-footer">
            <button class="close btn-sm btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End for Detail Pegawai -->





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
                  <label for="inputEmail3" class="control-label">Jenis Kelamin</label>
                  <select class="form-control" id="kelamin" name="kelamin">
                  <?php $default = $pro['nama_kelamin']; ?>
                    <option value="<?php echo $pro['id_kelamin']; ?>"> <?php echo $pro['nama_kelamin']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_kelamin");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_kelamin']; ?>"> <?php echo $p['nama_kelamin']; ?></option>
                            <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Golongan</label>
                  <select class="form-control" id="golongan" name="golongan">
                  <?php $default = $pro['nama_golongan']; ?>
                    <option value="<?php echo $pro['id_golongan']; ?>"> <?php echo $pro['nama_golongan']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_golongan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_golongan']; ?>"> <?php echo $p['nama_golongan']; ?></option>
                            <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jabatan</label>
                  <select class="form-control" id="jabatan" name="jabatan">
                  <?php $default = $pro['nama_jabatan']; ?>
                    <option value="<?php echo $pro['id_jabatan']; ?>"> <?php echo $pro['nama_jabatan']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jabatan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_jabatan']; ?>"> <?php echo $p['nama_jabatan']; ?></option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jenis Jabatann</label>
                  <select class="form-control" id="jenisjabatan" name="jenisjabatan">
                  <?php $default = $pro['nama_jenis_jabatan']; ?>
                    <option value="<?php echo $pro['id_jenis_jabatan']; ?>"> <?php echo $pro['nama_jenis_jabatan']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_jabatan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_jenis_jabatan']; ?>"> <?php echo $p['nama_jenis_jabatan']; ?></option>
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
                  <label for="inputEmail3" class="control-label">Status</label>
                  <select class="form-control" id="status" name="status">
                  <?php $default = $pro['nama_status']; ?>
                    <option value="<?php echo $pro['id_status']; ?>"> <?php echo $pro['nama_status']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_status");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_status']; ?>"> <?php echo $p['nama_status']; ?></option>
                            <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Gelar</label>
                  <select class="form-control" id="gelar" name="gelar">
                  <?php $default = $pro['nama_gelar']; ?>
                    <option value="<?php echo $pro['id_gelar']; ?>"> <?php echo $pro['nama_gelar']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from gelar");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_gelar']; ?>"> <?php echo $p['nama_gelar']; ?></option>
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

       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->
      <?php } ?>
        

      </div><!-- /.content-wrapper -->

<?php } ?>
