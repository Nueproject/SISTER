<?php
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { 
    include "lib/config.php";
    include "lib/koneksi.php";
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #2563eb;
            --success: #10b981;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: none;
            margin-bottom: 20px;
        }
        .stat-icon {
            width: 60px; height: 60px;
            border-radius: 15px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: white;
        }
        .chart-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            position: relative;
            margin-bottom: 20px;
        }
    </style>

    <div class="content-wrapper" style="background-color: white; padding: 20px;">
        <section class="content-header">
            <h1>Statistik Data Pegawai <small>Kantor Regional I BKN Yogyakarta</small></h1>
        </section>

        <div class="container-fluid mt-4">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <div class="card dashboard-card p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-primary me-3"><i class="fas fa-users"></i></div>

                            <div>
                                <h5 class="mb-0">Total Pegawai</h5>
                                <?php
                                $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result);                        
                             ?>
                                <h3 class="text-primary"><?php echo $row['total_pegawai']; 
                                ?></h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-success me-3"><i class="fas fa-building"></i></div>
                            <div>
                                <h5 class="mb-0">Kanreg I BKN</h5>
                                <?php
                                $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result);                        
                             ?>
                                <h3 class="text-primary"><?php echo $row['total_pegawai']; 
                                ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card dashboard-card p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon bg-info me-3"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h5 class="mb-0">UPT Semarang</h5>
                                 <?php
                                $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result);                        
                             ?>
                                <h3 class="text-primary"><?php echo $row['total_pegawai']; 
                                ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- PEGAWAI YANG AKAN PENSIUN -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="chart-container">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai yang akan pensiun!</h5>
                              <table class="table table-hover">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Lahir</th>                        
                        <th>Bidang</th>
                        <th>Masa Kerja</th>      
                        <th>TMT Pensiun</th>
                      </tr>
                      <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jenis_jabatan =  jj.id_jenis_jabatan order by nama_pegawai asc");   

                        $no=0;                     
                        while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_pegawai'];
                      $no+=1;

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

                        $tahun_lahir = substr($usr['nip_pegawai'], 0, 4);
                        $bln = substr($usr['nip_pegawai'], 4, 2);
                        $tanggal_lahir = substr($usr['nip_pegawai'], 6, 2);
                        $bulan_lahir = getBulan($bln);
                        $ttl="$tanggal_lahir $bulan_lahir $tahun_lahir";

                        $ttl_lengkap ="$tahun_lahir-$bln-$tanggal_lahir";
                        $newTTL = date("d-m-Y", strtotime($ttl_lengkap));
                        $bday = new DateTime($newTTL);
                        $today = new DateTime('today');
                        $diff = $bday->diff($today);
                        $umur = "$diff->y";
                        $thn_sekarang = date("Y");
                        $angkatanpppk = substr($usr['nip_pegawai'], 8, 4);
                        $jmlthun = $thn_sekarang-$angkatanpppk;
                        $status = $usr['status'];

                        if($usr['status']==1 or $usr['status']==5){
                          $tmt_diangkat = hitung_masa_kerja($usr['nip_pegawai']);
                        } else if($usr['status']==2 or $usr['status']==3){
                          $tmt_diangkat = "$jmlthun Tahun";
                        } else{
                          $tmt_diangkat = "Bukan ASN";        
                        };

                        if($bln<12){
                          $bln_p = $bln+1;
                          $masa = 58-$umur;
                        }else{
                          $bln_p = $bln-11;
                          $masa = 58-$umur+1;
                        };

                        $bln_pensiun = getBulan($bln_p);
                        $thn_pensiun = Date("Y")+$masa;
                        $tmt_pensiun = "1 $bln_pensiun $thn_pensiun";

                      ?>
                      
                      <tr>             
                        <td><?php echo $no; ?></td>
                        <td>
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td>
                          <?php echo $usr['nip_pegawai']; ?>
                        </td>
                        <td>
                          <?php echo tgl_lahir_nip($usr['nip_pegawai']); ?>
                        </td>
                        <td>
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td>
                          <?php echo $tmt_diangkat; ?>
                        </td>
                        <td>
                          <?php echo $tmt_pensiun; ?>
                        </td>
                      
                      </tr>
                      <?php } ?>
                </table>
                    </div>
                </div>
            </div>
            <!-- END PEGAWAI YANG AKAN PENSIUN -->
            <!-- REKAPITULASI BY kelamin -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Jenis Kelamin</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg I BKN Yogyakarta</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row"><i class="fas fa-male me-2 text-primary"></i>Laki-Laki</th>
                                  <td>
                                    <?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=1 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?>
                                  </td>
                                  <td>
                                    <?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=1 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?>
                                  </td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=1";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                                <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row"><i class="fas fa-female me-2 text-primary"></i>Perempuan</th>
                                   <td>
                                    <?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=2 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?>
                                  </td>
                                  <td>
                                    <?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=2 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                                <?php echo $row['total_pegawai']; 
                                ?>
                                  </td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jenis_kelamin=2";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI KELAMIN -->

            <!-- REKAPITULASI BY STATUS -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Status</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg Jogja</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">PNS</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=1 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=1 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=1";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=2 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=2 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=2";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">PENUGASAN</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=5 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=5 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where status=5";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI JABATAN -->


             <!-- REKAPITULASI BY USIA -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Usia</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg Jogja</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Umur 20-an</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang!=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 20 AND 30;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 20 AND 30;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 20 AND 30;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Umur 30-an</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang!=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 30 AND 40;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 30 AND 40;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 30 AND 40;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Umur 40-an</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang!=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 40 AND 50;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 40 AND 50;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 40 AND 50;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Umur 50-an</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang!=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 50 AND 60;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang=7 and TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 50 AND 60;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE TIMESTAMPDIFF(YEAR, STR_TO_DATE(SUBSTRING(nip_pegawai, 1, 8), '%Y%m%d'), CURDATE()) BETWEEN 50 AND 60;";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI USIA -->

            <!-- REKAPITULASI BY PENDIDIKAN -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Pendidikan</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg Jogja</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">SMP</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=7 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=7 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">SMA/SMK/SLTA</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=6 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=6 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=6";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">D III</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=5 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=5 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=5";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">DIV/S1</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=4 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=4 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=4";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">S2</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=3 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=3 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=3";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">S3</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=2 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=2 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where gelar=2";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI USIA -->



             <!-- REKAPITULASI BY JABATAN -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Jabatan</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg Jogja</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Jabatan Struktural</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=1 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=1 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=1";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Jabatan Fungsional</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=2 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=2 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=2";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Jabatan Pelaksana</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=3 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=3 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where jabatan=3";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI JABATAN -->
             <!-- REKAPITULASI BY GOLONGAN -->
            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i>
                        Data Pegawai Berdasarkan Golongan</h5>
                        <div class="row text-center">
                           <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th class="table-dark" scope="col">Kategori</th>
                                  <th class="table-dark" scope="col">Kanreg Jogja</th>
                                  <th class="table-dark" scope="col">UPT Semarang</th>
                                  <th class="table-dark" scope="col">Kanreg I BKN</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">Golongan V PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=22 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=22 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=22";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan VI PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=23 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=23 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=23";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan VII PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=24 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=24 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=24";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan VIII PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=25 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=25 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=25";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan IX PPPK</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=26 and bidang!=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=26 and bidang=7";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai where golongan=26";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan II PNS</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang != 7 AND (golongan = 5 OR golongan = 6 OR golongan = 7 OR golongan = 8)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang = 7 AND (golongan = 5 OR golongan = 6 OR golongan = 7 OR golongan = 8)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE (golongan = 5 OR golongan = 6 OR golongan = 7 OR golongan = 8)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan III PNS</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang != 7 AND (golongan = 9 OR golongan = 10 OR golongan = 11 OR golongan = 12)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang = 7 AND (golongan = 9 OR golongan = 10 OR golongan = 11 OR golongan = 12)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE (golongan = 9 OR golongan = 10 OR golongan = 11 OR golongan = 12)";
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Golongan IV PNS</th>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang != 7 AND (golongan = 13 OR golongan = 14 OR golongan = 15 OR golongan = 16 OR golongan = 17)";;
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE bidang = 7 AND (golongan = 13 OR golongan = 14 OR golongan = 15 OR golongan = 16 OR golongan = 17)";;
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                  <td><?php $sql = "SELECT COUNT(*) AS total_pegawai FROM data_pegawai WHERE (golongan = 13 OR golongan = 14 OR golongan = 15 OR golongan = 16 OR golongan = 17)";;
                                $result = mysqli_query($koneksi, $sql); 
                                $row = mysqli_fetch_assoc($result); ?>
                               <?php echo $row['total_pegawai']; 
                                ?></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END REKAPITULASI USIA -->
        </div>
    </div>

    
<?php } ?>