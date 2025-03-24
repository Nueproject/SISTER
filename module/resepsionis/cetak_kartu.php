
<?php
include "../../lib/config.php";                 
include "../../lib/koneksi.php";
require_once __DIR__ . '/../../vendor/autoload.php';

ob_start();
session_start();


setlocale(LC_TIME, 'id_ID.utf8');

if (empty($_SESSION['username']) AND empty($_SESSION['pass'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { 

//require_once __DIR__ . '../../vendor/autoload.php';
$kode=$_GET['idtamu'];


    $user = $_SESSION['username'];
    $sqlUser = "select * from user where username='".$_SESSION['username']."'";

    $kuerisqluser= mysqli_query($koneksi,"select * from user where username='".$_SESSION['username']."'");
 
    $user = $_SESSION['username'];
    ?>



<html lang="en">
    <head>
        <title> Printing dokumen</title>
        <style>
div.b128{
 border-left: 1px black solid;
 height: 30px;
} 

.table {
            width: 100%;
            margin-bottom: 20px;
        }   
        
        .table-striped tbody > tr:nth-child(odd) > td,
        .table-striped tbody > tr:nth-child(odd) > th {
            background-color: #f9f9f9;
        }

@media print{
            #print {
                display:none;
            }
        }
        @media print {
            #PrintButton {
                display: none;
            }
        }

@page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }

 table {
            border-collapse: collapse;
        }
      
    
        th {
            background-color: #4CAF50;
            color: white;
        }

        
    </style>
    </head>
<body>
<table border="0" width="80%" align="center">
<tr>
    
    <td class="center">&emsp; <img src="../../img/assets/logobkn.png" width="70" height="80"></td>
    &emsp; <td></td>
    <td> 
        &emsp; <font size="4"><b>BADAN KEPEGAWAIAN NEGARA</b></font> <br>
        &emsp; <font size="4"><b>KANTOR REGIONAL I YOGYAKARTA</b></font> <br>
        &emsp; <font size="3">Jl. Magelang Km.7,5 Telp. (0274) 868 234</font> <br>
        &emsp; <font size="3"> WA 082170066601  ||  www.yogyakarta.bkn.go.id</font>
    </td>
</tr>

    </table>
    <!--<b><hr size="5px" width="90%" align="center"></b> -->
    <center><b size="5px" width="90%" align="center">______________________________________________________________________________</b></center>


<?php
//$kode = 4;
$dataTamu = "select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai where id_pelayanan =$kode";
$kueriQuo= mysqli_query($koneksi, $dataTamu);
    while($pro=mysqli_fetch_array($kueriQuo)){ 

?>      
    <div style="margin-left: 5%">
        <?php

        include '../../asset/barcode128.php';
        // $product = $_POST['product'];
        // $product_id = $_POST['product_id'];
        // $rate = $_POST['rate'];
        $angka = $pro['kode_pelayanan'];
       

        ?>
        <table border="0" width="80%" align="center">
<tr>
<td width="70%"></td>
<td width="30%">'<?php echo " <p class='inline'>".bar128(stripcslashes($angka))."</p>&nbsp&nbsp&nbsp&nbsp"?> </td>
</tr>
</table>
    </div>

  
<?php
echo'




<table border="1" width="80%" align="center">
    <tr>
        <td width="30%" style="padding-left: 10px;">Nama &emsp; </td>
        
        <td width="70%" style="padding-left: 10px;">'.$pro['nama_tamu'].'</td>
    </tr>
    <tr><td width="30%" style="padding-left: 10px;">NIP</td>
       
        <td width="70%"style="padding-left: 10px;">'.$pro['nip_tamu'].'</td>
    </tr>    
    <tr><td width="30%" style="padding-left: 10px;">Instansi</td>
        
        <td width="70%"  style="padding-left: 10px;">'.$pro['nama_instansi'].' || '.$pro['ket_instansi'].'</td>
    </tr>    
    <tr><td width="30%" style="padding-left: 10px;">Bidang</td>
        
        <td width="70%" style="padding-left: 10px;">'.$pro['nama_bidang'].'</td>
    </tr>
    <tr><td width="30%" style="padding-left: 10px;">Keperluan</td>
        
        <td width="70%" style="padding-left: 10px;">'.$pro['keperluan'].'</td>
    </tr>    
    
    ';
 }; ?>
</table>
<br>

<table border='0' width="80%" align="center">
    <?php
    $dataTamu = "select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai where id_pelayanan =$kode";
    $kueriQuo= mysqli_query($koneksi, $dataTamu);
        while($pro=mysqli_fetch_array($kueriQuo)){ 

   
    $hariIni = new DateTime();
    $tgl = new DateTime($pro['tgl_datang']);
    $sekarang = strftime('%d %B %Y', $tgl->getTimestamp()) . '<br>';
    echo'
    <tr>
        <td width="35%">  </td>
        <td width="20%"> </td>
        <td width="45%">Yogyakarta, '.$sekarang.' </td>
    </tr>
    '; 
        };?>
</table>
<table border="0" align="center" width="80%">
    <tr>
        <td width="5%"> </td>
        <td width="30%"><center><b>Tamu</b></center></td>
        <td width="30%"></td>
        <td width="35%"><center><b>Resepsionis</b></center></td>
    </tr>   
</table>
<br><br><br>
<?php
$dataTamu = "select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai where id_pelayanan =$kode";
$kueriQuo= mysqli_query($koneksi, $dataTamu);
    while($pro=mysqli_fetch_array($kueriQuo)){ 

echo'
<table width="80%" align="center">
<tr>
        <td width="5%""> </td>
        <td width="30%"><center><b>( '.$pro['nama_tamu'].' )</b></center></td>
        <td width="30%""></td>
        <td width="35%"><center><b>( '.$user.' )</b></center></td>
    </tr>
</table>';
    }; ?>

<br>
<table width="80%" align="center">
    <tr>
        <td width="30%"> </td>
        <td width="40%"><center><b> Petugas </b></center></td>
        <td width="30%"></td>
        
    </tr>
</table>
<br>
<br>
<br>
<table width="80%" align="center">
    <tr>
        <td width="30%"> </td>
        <td width="40%"><center><b> (............................................) </center></b></td>
        <td width="30%"></td>
        
    </tr>
</table>
<br><br>
<table align="center" width="80%">
    <tr><center> _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _  </center></tr>
</table>
<br>
<?php


$dataTamu = "select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai where id_pelayanan =$kode";
$kueriQuo= mysqli_query($koneksi, $dataTamu);
    while($pro=mysqli_fetch_array($kueriQuo)){ 
       
$tgl = new DateTime($pro['tgl_datang']);
//$teko = $tgl->format('d-m-Y');
$teko = strftime('%d %B %Y', $tgl->getTimestamp()) . '<br>';
echo'

<table border="0" width="80%" align="left" >

    <tr>
        <td width="8%"></td>
        <td width="20%">Nama</td>
        <td width="2%"> : </td>
        <td width="70%">'.$pro['nama_tamu'].'</td>
    </tr>
   
    <tr>
        
        <td width="8%"></td>
        <td width="20%">Instansi</td>
        <td width="2%""> : </td>
        <td width="70%"">'.$pro['nama_instansi'].'</td>
    </tr>    
    <tr>
        
        <td width="8%"></td>
        <td width="20%">Kedatangan</td>
        <td width="2%"> : </td>
        <td width="70%">'.$pro['tgl_datang'].'/'.$pro['jam_datang'].'</td>
    </tr> 
    </td>
    </tr>
    
    ';
   
 }; ?>

</body>
<!-- PRINTING 
<script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    document.loaded = function(){
        
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function(){ window.close() },750)
    });


    setInterval( () => {
   window.location.href = '../../adminweb.php?module=resepsionis';
}, 1000);
</script>

-->


<script src="../../asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../asset/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../asset/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../../asset/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../asset/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../asset/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../asset/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../asset/dist/js/demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<script type="text/javascript">

$(document).ready(function () {
    window.print();
    window.location = "../../adminweb.php?module=resepsionis";
});
</script>



</html>

<?php };
 

?>


