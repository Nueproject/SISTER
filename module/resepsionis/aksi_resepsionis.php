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
		$idtgl = date('dmY');
		$nambid = "select nama_bidang from data_bidang where id_bidang= '$bidang'";
		$maxid = "select max(id_pelayanan) AS idpelayanan from data_pelayanan";
		$querymax = mysqli_query($koneksi, $maxid);
		$count = $querymax->fetch_assoc();
		$newid = $count['idpelayanan'] + 1;

		$maxidtamu = "select max(id_tamu) AS idtamu from data_pelayanan";
		$querymaxtamu = mysqli_query($koneksi, $maxidtamu);
		$count2 = $querymaxtamu->fetch_assoc();
		$newid_tamu = $count2['idtamu'] + 1;
		$idbid = substr($nambid, 0, 2);
		

		$kobid = "select left(nama_bidang, 2) as kode from data_bidang where id_bidang = 2";
		$kobid2= mysqli_query($koneksi, $kobid) or die(mysqli_error($koneksi));
		while ($rowbid = $kobid2->fetch_assoc()) {
			$kodebid=$rowbid['kode'];
		$kode_pel = "$kodebid$idtgl$newid";

		$cekdata="select * from data_tamu where nip_tamu='$nip'";
		$ada= mysqli_query($koneksi, $cekdata) or die(mysqli_error($koneksi));
		
		if(mysqli_num_rows($ada)>0)
		{ 
			$idtamucek = "select id_tamu from data_tamu where nip_tamu= '$nip'";
			$idcek= mysqli_query($koneksi, $idtamucek) or die(mysqli_error($koneksi));
			while ($rowidtamu = $idcek->fetch_assoc()) {
					$idtamu = $rowidtamu['id_tamu'];
		
			
			//echo "<script> alert('Data NIP Tamu sudah ada'); window.location = '../../adminweb.php?module=resepsionis';</script>";
			//echo "<h3>Pegawai telah Terdaftar! Silahkan menggunakan mode kunjungan lama.</h3>"; 
			//$maxsid = mysqli_query($koneksi, "select max(id_pelayanan) AS idtamu from tamu_instansi");
			//$count = $maxsid->fetch_assoc();

			$simpantamuinstansi = mysqli_query($koneksi, "insert into data_pelayanan (id_pelayanan, kode_pelayanan, id_tamu, id_bidang, keperluan, keterangan, status, tgl_datang, jam_datang, id_pegawai) values ('$newid', '$kode_pel', '$idtamu', '$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME(), '1')") or die(mysqli_error($koneksi));
			
				}//whilecek
		}
		else
		{
		
			$simpantamu = mysqli_query($koneksi, "insert into data_tamu (id_tamu, nip_tamu, nama_tamu, no_hp, instansi) values ('$newid_tamu', '$nip', '$nama', '$nohp', '$instansi')") or die(mysqli_error($koneksi));
			$simpantamuinstansi = mysqli_query($koneksi, "insert into data_pelayanan (id_pelayanan, kode_pelayanan, id_tamu, id_bidang, keperluan, keterangan, status, tgl_datang, jam_datang, id_pegawai) values ('$newid', '$kode_pel','$newid_tamu','$bidang', '$keperluan', '$keterangan', '$status', '$tgl_datang', CURRENT_TIME(), '1')") or die(mysqli_error($koneksi));
	
		//mysqli_query($koneksi) or die("Gagal menyimpan data karena :").mysqli_error();
		}
	}//kodebid

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

		$kobid = "select left(nama_bidang, 2) as kode from data_bidang where id_bidang = 2";
		$kobid2= mysqli_query($koneksi, $kobid) or die(mysqli_error($koneksi));
		
		

		$updateTamu = mysqli_query($koneksi, "update data_tamu SET
				nip_tamu='".$nip."',
				nama_tamu='".$nama."',
				instansi='".$instansi."'
				where nip_tamu = ".$nip) or die(mysqli_error($koneksi));

		$updateDataTamu = mysqli_query($koneksi, "update data_pelayanan SET 
				id_pelayanan='".$id_tamu."', 
				kode_pelayanan='".$kode_tamu."', 
				id_bidang='".$bidang."', 
				keperluan='".$keperluan."', 
				keterangan='".$keterangan."', 
				status='".$status."', 
				tgl_datang='".$tgl_datang."'
				where id_pelayanan =" .$id_tamu) or die(mysqli_error($koneksi));

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