<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    $idTamu = $_GET['id_telepon'];
    $queryHapus = mysqli_query($koneksi,"DELETE FROM telepon WHERE id_telepon='$idTamu'");
    if ($queryHapus) {
        echo "<script> alert('Data Telepon Berhasil Dihapus'); window.location = '../../adminweb.php?module=setup';</script>";
    } else {
        echo "<script> alert('Data Telepon Gagal Dihapus'); window.location = '../../adminweb.php?module=setup';</script>";

    }
}
?>
