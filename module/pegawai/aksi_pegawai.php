<?php
 
	session_start();

    include "../../lib/config.php";
    include "../../lib/koneksi.php";


	if(isset($_POST['saveTambahPegawai'])){
		date_default_timezone_set('Asia/Jakarta');
		$_SESSION['formTambahPegawai']= $_POST;
		$nama = $_SESSION['formTambahPegawai']['namaLengkap'];
		$nip = $_SESSION['formTambahPegawai']['nip'];
		$nohp = $_SESSION['formTambahPegawai']['noHp'];
		$bidang = $_SESSION['formTambahPegawai']['namaBidang'];
		$jabatan = $_SESSION['formTambahPegawai']['namaJabatan'];
		$tgl_datang = date('Y-m-d');
		$idtgl = date('Ydm');
		
		$maxid = "select max(id_pegawai) AS idpegawai from data_pegawai";
		$querymax = mysqli_query($koneksi, $maxid);
		$count = $querymax->fetch_assoc();
		$newid = $count['idpegawai'] + 1;
		
		
			$simpantamu = mysqli_query($koneksi, "insert into data_pegawai (id_pegawai, nip_pegawai, nama_pegawai, nomor_hp, bidang, jabatan) values ('$newid', '$nip', '$nama', '$nohp', '$bidang', '$jabatan')") or die(mysqli_error($koneksi));
			
		

        unset($_SESSION['formTambahPegawai']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//AKSI_EDIT_TAMU	
	if(isset($_POST['editDataPegawai'])){

		
		$_SESSION['formDataUpdate'] = $_POST;
		$id_tamu = $_POST['idPegawai'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$jabatan =$_POST['jabatan'];
		$bidang = $_POST['bidangUpdate'];
		$noHP = $_POST['NoHP'];
		
		date_default_timezone_set('Asia/Jakarta');		

		

		$updatePegawai = mysqli_query($koneksi, "update data_pegawai SET
				nip_pegawai='".$nip."',
				nama_pegawai='".$nama."',
				jabatan='".$jabatan."',
				bidang='".$bidang."',
				nomor_hp='".$noHP."'
				where id_pegawai =".$id_tamu) or die(mysqli_error($koneksi));

		 unset($_SESSION['formDataCopy']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

	//AKSI_SETAS_TAMU	
	if(isset($_POST['setasDataTamu'])){

		
		$_SESSION['formDataSet'] = $_POST;
		$id_tamu = $_POST['idTamu'];
		$kode_tamu = $_POST['kodeTamu'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$instansi =$_POST['instansiUpdate'];
		$bidang = $_POST['bidangUpdate'];
		$keperluan = $_POST['keperluan'];
		$keterangan = $_POST['keterangan'];
		$pegawai = $_POST['pegawai'];
		$status = $_POST['status'];
		$tgl_datang = date('Y-m-d'); 
		$idtgl = date('dYm');
		$nambid = "select nama_bidang from data_bidang where id= '$bidang'";
		
		
		date_default_timezone_set('Asia/Jakarta');		

		$kobid = "select left(nama_bidang, 2) as kode from data_bidang where id_bidang = 2";
		$kobid2= mysqli_query($koneksi, $kobid) or die(mysqli_error($koneksi));
		

		$updateDataTamu = mysqli_query($koneksi, "update data_pelayanan SET 
				
				status='".$status."', 
				id_pegawai='".$pegawai."'
				where id_pelayanan =" .$id_tamu) or die(mysqli_error($koneksi));

		 unset($_SESSION['formDataSet']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

		}


	
	//Aksi Duplicate Tami	
	if(isset($_POST['copyDataTamu'])){

		
		$_SESSION['formDataCopy'] = $_POST;
		$nip = $_POST['nip_copy'];
		$id_tamu = $_POST['id_tamu'];
		$instansi =$_POST['instansiCopy'];
		$bidang = $_POST['bidangCopy'];
		$keperluan = $_POST['keperluan'];
		$keterangan = $_POST['keterangan'];

		$status = "1";
		$tgl_datang = date('Y-m-d');
		$idtgl = date('dYm');
		$nambid = "select nama_bidang from data_bidang where id_bidang= '$bidang'";

		$maxid = "select max(id_pelayanan) AS idtamu from data_pelayanan";
		$querymax = mysqli_query($koneksi, $maxid);
		$count = $querymax->fetch_assoc();
		$newid = $count['idtamu'] + 1;

		
		
		date_default_timezone_set('Asia/Jakarta');		

		$kobid = "select left(nama_bidang, 2) as kode from data_bidang where id_bidang = 2";
		$kobid2= mysqli_query($koneksi, $kobid) or die(mysqli_error($koneksi));
		
		while ($rowbid = $kobid2->fetch_assoc()) {
		$kodebid=$rowbid['kode'];
		$kode_pel = "$kodebid-$idtgl-0$newid";

		$simpantamuinstansi = mysqli_query($koneksi, "insert into data_pelayanan (id_pelayanan, kode_pelayanan, id_tamu, id_bidang, keperluan, keterangan, status, tgl_datang, jam_datang, id_pegawai) values ('$newid', '$kode_pel','$id_tamu','$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME(), '1')") or die(mysqli_error($koneksi));
		
		} //KODE_BID



        unset($_SESSION['formDataCopy']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}