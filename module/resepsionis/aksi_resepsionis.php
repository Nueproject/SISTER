<?php
 
	session_start();

    include "../../lib/config.php";
    include "../../lib/koneksi.php";


	if(isset($_POST['saveTamuBaru'])){
		date_default_timezone_set('Asia/Jakarta');
		// data form jg array
		

		$_SESSION['formTambahBaru']= $_POST;
		$nama = $_SESSION['formTambahBaru']['namaLengkap'];
		$nip = $_SESSION['formTambahBaru']['nip'];
		$nohp = $_SESSION['formTambahBaru']['noHp'];
		$instansi = $_SESSION['formTambahBaru']['namaInstansi'];
		$bidang = $_SESSION['formTambahBaru']['bidang'];
		$keperluan = $_SESSION['formTambahBaru']['keperluan'];
		$keterangan = $_SESSION['formTambahBaru']['keterangan'];
		$status = "1";
		$tgl_datang = date('Y-m-d');
		$idtgl = date('dYm');
		$nambid = "select nama_bidang from data_bidang where id= '$bidang'";

		$maxid = "select max(id_tamu_instansi) AS idtamu from data_tamu_instansi";
		$querymax = mysqli_query($koneksi, $maxid);
		$count = $querymax->fetch_assoc();
		$newid = $count['idtamu'] + 1;
		$idbid = substr($nambid, 0, 2);
		$idtamu = "$idbid-$idtgl-$newid";
		
		$cekdata="select nip from data_tamu where nip='$nip'";
		$ada= mysqli_query($koneksi, $cekdata) or die(mysqli_error($koneksi));
		if(mysqli_num_rows($ada)>0)
		{ 
			//echo "<script> alert('Data NIP Tamu sudah ada'); window.location = '../../adminweb.php?module=resepsionis';</script>";
			//echo "<h3>Pegawai telah Terdaftar! Silahkan menggunakan mode kunjungan lama.</h3>"; 
			//$maxsid = mysqli_query($koneksi, "select max(id_tamu_instansi) AS idtamu from tamu_instansi");
			//$count = $maxsid->fetch_assoc();
			$simpantamuinstansi = mysqli_query($koneksi, "insert into data_tamu_instansi (id_tamu_instansi, kode_tamu, nip, bidang, keperluan, keterangan, status, tgl_datang, jam_datang) values ('$newid', '$idtamu','$nip', '$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME())") or die(mysqli_error($koneksi));
	
		}
		else
		{
		
			$simpantamu = mysqli_query($koneksi, "insert into data_tamu (nip, nama, no_hp, instansi) values ('$nip', '$nama', '$nohp', '$instansi')") or die(mysqli_error($koneksi));
			$simpantamuinstansi = mysqli_query($koneksi, "insert into data_tamu_instansi (id_tamu_instansi, kode_tamu, nip, bidang, keperluan, keterangan, status, tgl_datang, jam_datang) values ('$newid', '$idtamu','$nip', '$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME())") or die(mysqli_error($koneksi));
	
		//mysqli_query($koneksi) or die("Gagal menyimpan data karena :").mysqli_error();
		}

	    //$clientData = mysqli_fetch_array($querytamuinstansi);
		//$qsimpanquotation = mysqli_query($koneksi, "insert into cera_sales (sales_id_status, sales_quotation_no, sales_id_client) values (1, '$tgl_skrg-$newid', '$newidcl')") or die(mysqli_error($koneksi));

		// $id_order=mysqli_insert_id($koneksi);
	    // $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '$id_order'");
	    // $invoiceData = mysqli_fetch_array($query);

	    

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		// $i = 0;
		// foreach ($_SESSION['productListQuotation'] as $input) {

        //     $query = mysqli_query($koneksi, "select * from cera_product where id_product =".$_POST['id'][$i]);
        //     $data = mysqli_fetch_array($query);
        //     $produk=$data['id_product'];

        //     mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id,  si_item_name, si_item_qty, si_item_price) values ('$id_order', '$produk', '".$_POST['name'][$i]."', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."')");
            
        //     $i++;
        // }

        unset($_SESSION['formTambahBaru']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//AKSI_EDIT_TAMU	
	if(isset($_POST['editDataTamu'])){

		
		$_SESSION['formDataUpdate'] = $_POST;
		$id_tamu = $_POST['idTamu'];
		$kode_tamu = $_POST['kodeTamu'];
		$nama = $_POST['nama'];
		$nip = $_POST['nip'];
		$instansi =$_POST['instansiUpdate'];
		$bidang = $_POST['bidangUpdate'];
		$keperluan = $_POST['keperluan'];
		$keterangan = $_POST['keterangan'];
		$status = $_POST['status'];
		$tgl_datang = date('Y-m-d'); 
		$idtgl = date('dYm');
		$nambid = "select nama_bidang from data_bidang where id= '$bidang'";
		date_default_timezone_set('Asia/Jakarta');
		$updateTamu = mysqli_query($koneksi, "update data_tamu SET
				nip='".$nip."',
				nama='".$nama."',
				instansi='".$instansi."'
				where nip = ".$nip) or die(mysqli_error($koneksi));

		$updateDataTamu = mysqli_query($koneksi, "update data_tamu_instansi SET 
				id_tamu_instansi='".$id_tamu."', 
				kode_tamu='".$kode_tamu."', 
				nip='".$nip."', 
				bidang='".$bidang."', 
				keperluan='".$keperluan."', 
				keterangan='".$keterangan."', 
				status='".$status."', 
				tgl_datang='".$tgl_datang."'
				where id_tamu_instansi =" .$id_tamu) or die(mysqli_error($koneksi));




        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	
	//Aksi Duplicate Tami	
	if(isset($_POST['copyDataTamu'])){

		
		$_SESSION['formDataCopy'] = $_POST;
		$nip = $_POST['nip_copy'];
		$instansi =$_POST['instansiCopy'];
		$bidang = $_POST['bidangCopy'];
		$keperluan = $_POST['keperluan'];
		$keterangan = $_POST['keterangan'];

		$status = "1";
		$tgl_datang = date('Y-m-d');
		$idtgl = date('dYm');
		$nambid = "select nama_bidang from data_bidang where id= '$bidang'";

		$maxid = "select max(id_tamu_instansi) AS idtamu from data_tamu_instansi";
		$querymax = mysqli_query($koneksi, $maxid);
		$count = $querymax->fetch_assoc();
		$newid = $count['idtamu'] + 1;
		$idbid = substr($nambid, 0, 3);
		$idtamu = "$idbid-$idtgl-$newid";
		date_default_timezone_set('Asia/Jakarta');		

		$simpantamuinstansi = mysqli_query($koneksi, "insert into data_tamu_instansi 
		(id_tamu_instansi, kode_tamu, nip, bidang, keperluan, keterangan, status, tgl_datang, jam_datang) values 
		('$newid', '$idtamu','$nip', '$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME())") or die(mysqli_error($koneksi));
	



        unset($_SESSION['formDataCopy']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}