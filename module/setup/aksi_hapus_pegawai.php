<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idTamu = $_GET['id_pegawai'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM data_pegawai WHERE id_pegawai='$idTamu'");
    if ($queryHapus) {
        echo "<script> alert('Data Pegawai Berhasil Dihapus'); window.location = '../../adminweb.php?module=pegawai';</script>";
    } else {
        echo "<script> alert('Data Pegawai Gagal Dihapus'); window.location = '../../adminweb.php?module=[pegawai]';</script>";

    }
}
?>
