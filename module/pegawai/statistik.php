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
                                <h3 class="text-primary">257</h3>
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
                                <h3 class="text-success">235</h3>
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
                                <h3 class="text-info">22</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="chart-container">
                        <h5 class="mb-4"><i class="fas fa-chart-bar me-2 text-primary"></i> Rekapitulasi Jumlah Pegawai Per Bidang</h5>
                        <div style="height: 350px;">
                            <canvas id="manualBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card dashboard-card p-4">
                        <h4 class="mb-4 border-bottom pb-2">REKAPITULASI BERDASARKAN USIA</h4>
                        <div class="row text-center">
                            <div class="col-md-3"><h5>Kategori</h5>
                              <p class="badge bg-primary fs-6">Umur 20-an</p><br>
                              <p class="badge bg-primary fs-6">Umur 30-an</p><br>
                              <p class="badge bg-primary fs-6">Umur 40-an</p><br>
                              <p class="badge bg-primary fs-6">Umur 50-an</p>
                            </div>
                            <div class="col-md-3"><h5>Semua Pegawai</h5>
                              <p class="badge bg-dark fs-6">32</p><br>
                              <p class="badge bg-dark fs-6">21</p><br>
                              <p class="badge bg-dark fs-6">55</p><br>
                              <p class="badge bg-dark fs-6">12</p>
                            </div>
                           <div class="col-md-3"><h5>Kanreg I BKN Yogyakarta</h5>
                              <p class="badge bg-dark fs-6">12</p><br>
                              <p class="badge bg-dark fs-6">26</p><br>
                              <p class="badge bg-dark fs-6">25</p><br>
                              <p class="badge bg-dark fs-6">12</p>
                            </div>
                            <div class="col-md-3"><h5>UPT BKN Semarang</h5>
                              <p class="badge bg-dark fs-6">12</p><br>
                              <p class="badge bg-dark fs-6">26</p><br>
                              <p class="badge bg-dark fs-6">33</p><br>
                              <p class="badge bg-dark fs-6">02</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
<?php } ?>