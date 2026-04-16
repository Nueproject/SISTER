<?php

//session_start();
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
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border: none;
            transition: all 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .chart-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: white;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
             Statistik Data Pegawai
              <small>Kantor Regional I BKN Yogyakarta</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Pegawai</li>
            </ol>
        </section>
        <br><br>

    <div class="container-fluid"  >  
        <!-- Statistik Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">Total Pegawai</h3>
                            <p class="mb-0 text-muted"><b>Total Users : 257</b></p>
                             <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">Kantor Regional I BKN</h3>
                            <p class="mb-0 text-muted">Total Users</p>
                             <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
  <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">UPT BKN Semarang</h3>
                            <p class="mb-0 text-muted">Total Pegawai : 22</p>
                            <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- akhir dari kontainer -->

        <!-- Charts -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="chart-container">
                    <h5 class="mb-4"><i class="fas fa-chart-line me-2 text-primary"></i>Pegawai Yang Akan Pensiun</h5>
                    <canvas id="ordersChart" height="100"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart-container h-100">
                    <h5 class="mb-4"><i class="fas fa-chart-pie me-2 text-success"></i>Pensiun Bulan Ini</h5>
                    <canvas id="statusChart" height="100"></canvas>
                </div>
            </div>
        </div>


    <br>        

    <!-- REKAPITULASI BERDASAR USIA -->
    <div class="container-fluid" style="background-color:white;">  
        <!-- Statistik Cards -->
        <div class="row align-items-center">
          <div class="col-12"><h2>REKAPITULASI BERDASARKAN USIA</h2></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                          <div clas="row align-items-center">
                            <div class="col-6">
                            <h3 class="text-primary mb-1">Semua Pegawai</h3>
                            <p class="mb-0 text-muted"><b>Total Pegawai : 257</b></p>
                             <small class="text-success fw-bold">
                                Umur 20-an  : 7
                            </small>
                            <br>
                            <small class="text-success fw-bold">
                                Umur 30-an : 14
                            </small>
                            <br>
                            <small class="text-success fw-bold">
                                Umur 40-an : 14
                            </small>
                            <br>
                            <small class="text-success fw-bold">
                                Umur 50-an : 14
                            </small>
                            </div>
                            <div class="col-6"> SAMPING KANAN</div>
                          </div> <!--  end row -->


                        </div>
                    </div>
                </div>
            </div>
             <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">Kantor Regional I BKN</h3>
                            <p class="mb-0 text-muted">Total Users</p>
                             <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
  <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">UPT BKN Semarang</h3>
                            <p class="mb-0 text-muted">Total Pegawai : 22</p>
                            <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
          </div> <!-- end ROW -->
          <br>
        </div> <!-- akhir dari kontainer -->
<br>
        <div class="container-fluid"  >  
        <!-- Statistik Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">Total Pegawai</h3>
                            <p class="mb-0 text-muted"><b>Total Users : 257</b></p>
                             <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">Kantor Regional I BKN</h3>
                            <p class="mb-0 text-muted">Total Users</p>
                             <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
  <!-- Statistik Cards -->
            <div class="col-lg-4 col-md-4">
                <div class="card dashboard-card p-4">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="stat-icon bg-primary">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col-9">
                            <h3 class="text-primary mb-1">UPT BKN Semarang</h3>
                            <p class="mb-0 text-muted">Total Pegawai : 22</p>
                            <small class="text-success fw-bold">
                                <i class="fas fa-male"></i> Laki-Laki : 7
                            </small>
                            <br><small class="text-success fw-bold">
                                <i class="fas fa-female"></i> Perempuan : 14
                            </small>
                        </div>
                    </div>
                </div>
            </div>
          </div> <!-- end ROW -->
        </div> <!-- akhir dari kontainer -->



      </div> <!-- Container fluid -->
 <br><br>
</div><!-- /.content-wrapper -->

<?php } ?>
