<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idTamu = $_GET['id_tamu'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM data_pelayanan WHERE id_pelayanan='$idTamu'");
    if ($queryHapus) {
        echo "<script> alert('Data Tamu Berhasil Dihapus'); window.location = '../../adminweb.php?module=resepsionis';</script>";
    } else {
        echo "<script> alert('Data Tamu Gagal Dihapus'); window.location = '../../adminweb.php?module=resepsionis';</script>";

    }
}
?>
