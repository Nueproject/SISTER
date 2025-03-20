<?php

	session_start();

    include "../../lib/config.php";
    include "../../lib/koneksi.php";

    //Tambah
	
	if(isset($_POST['tambahProductList'])){

		// data form
		$_SESSION['formData'] = $_POST;
		
		// data product list
		$product = "select * from cera_product where id_product = '".$_POST['idProductList']."'";
		$product = mysqli_query($koneksi,$product);
		$product = mysqli_fetch_array($product);

		if(array_key_exists('id_product', $product)){
			$_SESSION['productList'][] = $product;
		}		

		// redirect back
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	if(isset($_POST['removeProductList'])){

		//echo $_POST['removeProductList'];
		$_SESSION['formData'] = $_POST;

		if(trim($_POST['removeProductList']) !== ''){

			$i=0;
			foreach ($_SESSION['productList'] as $input){
				
				//echo json_decode($input);

				if($input['id_product'] == $_POST['removeProductList']){
					
					array_splice($_SESSION['productList'], $i, 1);
					//unset($_SESSION['productList'][$i]);

				}
				
				$i++;

			}

		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	if(isset($_POST['saveQuotation'])){
		
		// data form jg array
		$_SESSION['formData'];
		$tgl_skrg = date("Y-m-d");
		$nama = $_SESSION['formData']['nama_client'];
		$alamat = $_SESSION['formData']['alamat'];
		$email = $_SESSION['formData']['email'];
		$telp = $_SESSION['formData']['phone_client'];

		$qsimpanquotation = mysqli_query($koneksi, "insert into cera_sales (sales_id_status, sales_quotation_no, sales_nama_client, sales_alamat_client, sales_email_client, sales_telp_client) values (1, 'Q-$tgl_skrg', '$nama', '$alamat', '$email', '$telp')") or die(mysqli_error($koneksi));

		$id_order=mysqli_insert_id($koneksi);

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '$id_order'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		foreach ($_SESSION['productList'] as $input) {

            $query = mysqli_query($koneksi, "select * from cera_product where id_product =".$_POST['id'][$i]);
            $data = mysqli_fetch_array($query);
            $produk=$data['id_product'];

            mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id,  si_item_name, si_item_qty, si_item_price) values ('$id_order', '$produk', '".$_POST['name'][$i]."', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."')");
            
            $i++;
        }

        unset($_SESSION['productList']);
        unset($_SESSION['formData']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//price

	if(isset($_POST['aksi_getPriceQty'])){

		$price = "select * from cera_product_price where pp_id=".$_POST['pp_id'];
		$price = mysqli_query($koneksi,$price);
		$price = mysqli_fetch_array($price);
		
		header('Content-Type: application/json');
		echo json_encode($price);

	}

	//Purchase Order

	if(isset($_POST['tambahProductListPO'])){

		// data form
		$_SESSION['formDataPO'] = $_POST;
		
		// data product list
		$product = "select * from cera_product where id_product = '".$_POST['idProductListPO']."'";
		$product = mysqli_query($koneksi,$product);
		$product = mysqli_fetch_array($product);

		$_SESSION['productListPO'][] = $product;

		// redirect back
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	if(isset($_POST['removeProductListPO'])){

		//echo $_POST['removeProductList'];
		$_SESSION['formDataPO'] = $_POST;

		if(trim($_POST['removeProductListPO']) !== ''){

			$i=0;
			foreach ($_SESSION['productListPO'] as $input){
				
				//echo json_decode($input);

				if($input['id_product'] == $_POST['removeProductListPO']){
					
					array_splice($_SESSION['productListPO'], $i, 1);
					//unset($_SESSION['productList'][$i]);

				}
				
				$i++;

			}

		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}


	//ini belum bisa
	if(isset($_POST['tambahProductListUpdate'])){

		// data form
		$_SESSION['formDataUpdate'] = $_POST;
		
		// data product list
		$product = "select * from cera_product where id_product = '".$_POST['idProductListUpdate']."'";
		$product = mysqli_query($koneksi,$product);
		$product = mysqli_fetch_array($product);

		if(array_key_exists('id_product', $product)){
			$_SESSION['productListUpdate'][] = $product;
		}		

		// redirect back
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	if(isset($_POST['removeProductListUpdate'])){

		//echo $_POST['removeProductList'];
		$_SESSION['formDataUpdate'] = $_POST;

		if(trim($_POST['removeProductListUpdate']) !== ''){

			$i=0;
			foreach ($_SESSION['productListUpdate'] as $input){
				
				//echo json_decode($input);

				if($input['id_product'] == $_POST['removeProductListUpdate']){
					
					array_splice($_SESSION['productListUpdate'], $i, 1);
					//unset($_SESSION['productList'][$i]);

				}
				
				$i++;

			}

		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}





	if(isset($_POST['SetAsPO'])){
		//echo json_encode($_POST);

		//echo json_encode($_POST);
		/* YANG KURANG ALUR LOGICNYA 

			1. update sales berdasarkan id sales
			2. foreach $_POST['id'] untuk update sales item ( untuk yg udh tersimpan )
			3. foreach( yg namenya new di quotation edit ) untuk insert ke sale item ( utk yg belum tersimpan )
			4. udah gitu ajah

intinya itu aja sih,
update sales,
update sales item ( ini yg udh ke insert )
insert sale item baru ( misal nambah product )
	
		*/
// data form jg array
	


		$idSales = $_GET['sales_id'];
		$_SESSION['formDataUpdate'] = $_POST;
		
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$tgl_skrg = date("Y-m-d");


		$nama_product = $_SESSION['formDataUpdate']['nama_product'];
		$idDev = $_SESSION['formDataUpdate']['idDelivery'];
		$bahan = $_SESSION['formDataUpdate']['desc_product'];
		$ukuran = $_SESSION['formDataUpdate']['size_product'];
		$jumlah = $_SESSION['formDataUpdate']['qty_product'];
		$gambar = $_SESSION['formDataUpdate']['gambar_po'];
		$tglacc = $_SESSION['formDataUpdate']['tglACC'];
		$tgldp = $_SESSION['formDataUpdate']['tglDP'];
		$deadline = $_SESSION['formDataUpdate']['deadline'];$nama = $_SESSION['formDataUpdate']['nama_client'];
		$cargo = $_SESSION['formDataUpdate']['cargo'];
		$packing = $_SESSION['formDataUpdate']['packing'];
		$nama_cargo = $_SESSION['formDataUpdate']['namaCargo'];$nama = $_SESSION['formDataUpdate']['nama_client'];
		$telp = $_SESSION['formDataUpdate']['phoneCargo'];
		$qtykoli = $_SESSION['formDataUpdate']['jumlahKoli'];
		$harga = $_SESSION['formDataUpdate']['hargaKirim'];
		$tglkirim = $_SESSION['formDataUpdate']['tglKirim'];
		$id_order = $_POST['sales_id'];

$qsimpanquotation = mysqli_query($koneksi, "update cera_sales SET 
				 
				sales_nama_client='".$_POST['nama_client']."',
				sales_tgl_dp='".$tgldp."',
				sales_tgl_acc='".$tglacc."',
				sales_tgl_deadline='".$deadline."',
				sales_id_delivery='".$idDev."',
				sales_tgl_po='".$tgl_skrg."',
				sales_id_status='2'

				where sales_id ='".$idSales."'") or die(mysqli_error($koneksi));


		
	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$idSales."'");
	    $POData = mysqli_fetch_array($query);


	     $querycsi = mysqli_query($koneksi, "select * from cera_sales_item where si_sales_id = '".$idSales."'");
	    $poDatacs = mysqli_fetch_array($querycsi);
	   


	    $insertPO = mysqli_query($koneksi,"insert into cera_delivery (delivery_id, created_at, updated_at, acc_date, cargo, packing, cargo_name, phone_cargo, koli_qty, price_cargo, shipping_time) values ('$idDev', '$tgl_skrg', '$tgl_skrg', '$tglacc', '$cargo', '$packing', '$nama_cargo', '$telp', '$qtykoli', '$harga', '$tglkirim')") or die(mysqli_error($koneksi));

	    $queryinsert = mysqli_query($koneksi, "select * from cera_delivery where delivery_id = '".$idDev."'");
	    $PODelivery = mysqli_fetch_array($queryinsert);

	    
//$updatecsi = mysqli_query($koneksi, "update cera_sales_item SET 
				//si_item_size='".$ukuran."',
				//si_item_bahan='".$bahan."',
				//si_item_qty='".$jumlah."',
				//si_item_gambar='".$gambar."'
				
				

				//where si_sales_id ='".$idSales."'") or die(mysqli_error($koneksi));

$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$idSales', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_deskripsi='".$_POST['desc'][$i]."',
            			si_item_size='".$_POST['size'][$i]."', 
            			si_item_gambar='".$_POST['gambar'][$i]."',
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}
$i=0;
		foreach($_POST['id'] as $d){
	include "../../lib/config.php";
    include "../../lib/koneksi.php";
	

	$nama_file = $_FILES['gambar'][$i]['name'][$i];
    $ukuran_file = $_FILES['gambar'][$i]['size'][$i];
    $tipe_file = $_FILES['gambar'][$i]['type'][$i];
    $tmp_file = $_FILES['gambar'][$i]['tmp_name'][$i];

		$path = "../../upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if ($ukuran_file <= 1000000) {// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload

            if (move_uploaded_file($tmp_file, $path)) {
		
	   		// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_deskripsi='".$_POST['desc'][$i]."',
            			si_item_size='".$_POST['size'][$i]."', 
            			si_item_gambar='".$_POST['gambar'][$i]."',
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);

                if ($query) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../adminweb.php?module=product';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../adminweb.php?module=product';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '../../adminweb.php?module=product';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar Produk Gagagl Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '../../adminweb.php?module=product';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '../../adminweb.php?module=product';</script>";
    }

 $i++;
		}

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}






if(isset($_POST['SavePO'])){		 
		
	    $maxsid = mysqli_query($koneksi, "select max(sales_id) AS idsales from cera_sales");
		$count = $maxsid->fetch_assoc();
		$newid = $count['idsales'] + 1;

		$i = 0;
		foreach ($_SESSION['productList'] as $input) {

            $query = mysqli_query($koneksi, "select * from cera_product where id_product =".$_POST['id'][$i]);
            $data = mysqli_fetch_array($query);
            $produk = $data['id_product'];	

            $nama_file = $_POST['gambarOld'][$i];

            if(isset($_FILES['gambar'])){

				$nama_file = date('Ymdhms').$_FILES['gambar']['name'][$i];
			    $ukuran_file = $_FILES['gambar']['size'][$i];
			    $tipe_file = $_FILES['gambar']['type'][$i];
			    $tmp_file = $_FILES['gambar']['tmp_name'][$i];

				$path = "../../upload/" . $nama_file;

			    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

			        if ($ukuran_file <= 1000000) {

			            move_uploaded_file($tmp_file, $path);

			        }
			    }

            }

            mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id,  si_item_name, si_item_qty, si_item_price, si_item_deskripsi, si_item_size, si_item_gambar) values ('$newid', '$produk', '".$_POST['name'][$i]."', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."','".$_POST['desc'][$i]."','".$_POST['size'][$i]."','".$nama_file."')");
            
            $i++;
        }

		$_SESSION['formDataUpdate'] = $_POST;
		$idDev = $_SESSION['formDataUpdate']['idDelivery'];
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$telp = $_SESSION['formDataUpdate']['tlp_client'];
		$email = $_SESSION['formDataUpdate']['email'];
		
		$tgl_skrg = date("Y-m-d h:m:s");
		$tglacc = $_SESSION['formDataUpdate']['tglACC'];
		$tgldp = $_SESSION['formDataUpdate']['tglDP'];
		$deadline = $_SESSION['formDataUpdate']['deadline'];
		$cargo = $_SESSION['formDataUpdate']['cargo'];
		$packing = $_SESSION['formDataUpdate']['packing'];
		$nama_cargo = $_SESSION['formDataUpdate']['namaCargo'];

		$telp_Cargo = $_SESSION['formDataUpdate']['phoneCargo'];
		$qtykoli = $_SESSION['formDataUpdate']['jumlahKoli'];
		$harga = $_SESSION['formDataUpdate']['hargaKirim'];
		$tglkirim = $_SESSION['formDataUpdate']['tglKirim'];
		
		$simpanPO = mysqli_query($koneksi, "insert into cera_sales (sales_nama_client, sales_alamat_client, sales_email_client, sales_telp_client, created_at, sales_tgl_dp, sales_tgl_acc, sales_tgl_deadline, sales_id_delivery, sales_tgl_po, sales_id_status) values ('$nama', '$alamat','$email', '$telp','$tgl_skrg', '$tgldp', '$tglacc', '$deadline', '$idDev', '$tgl_skrg', '2' )") or die(mysqli_error($koneksi));

			 

		$simpanDEV = mysqli_query($koneksi, "insert into cera_delivery (delivery_id, created_at, acc_date, cargo, packing, cargo_name, phone_cargo, koli_qty, price_cargo, shipping_time) values ('$idDev', '$tgl_skrg','$tglacc', '$cargo','$packing', '$nama_cargo', '$telp_Cargo', '$qtykoli', '$harga', '$tglkirim')") or die(mysqli_error($koneksi));

			$queryinsert = mysqli_query($koneksi, "select * from cera_delivery where delivery_id = '".$idDev."'");
	    	$PODelivery = mysqli_fetch_array($queryinsert);	




	   
        unset($_SESSION['formData']);
 		unset($_SESSION['productList']);

        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../adminweb.php?module=sales';</script>";

		}


if(isset($_POST['POToInvoice'])){
		//echo json_encode($_POST);

		// data form jg array
		$_SESSION['formDataUpdate'] = $_POST;
		$tgl_skrg = date("Y-m-d");
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$nomor = $_SESSION['formDataUpdate']['id_invoice'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$email = $_SESSION['formDataUpdate']['email'];
		$telp = $_SESSION['formDataUpdate']['phone_client'];

				mysqli_query($koneksi, "update cera_sales SET 
				
				sales_invoice_no='".$_POST['quotationNo']."', 
				sales_nama_client='".$_POST['nama_client']."', 
				sales_alamat_client='".$_POST['alamat']."', 
				sales_email_client='".$_POST['email']."', 
				sales_telp_client='".$_POST['phone_client']."',
				updated_at='$tgl_skrg',
				sales_id_status='3'

				where sales_id =" .$_POST['sales_id']) or die(mysqli_error($koneksi));

		$id_order = $_POST['sales_id'];

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$_POST['sales_id']."'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$id_order', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_price='".$_POST['price'][$i]."', 
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}



if(isset($_POST['SaveInvoice'])){

		 
		
	    $maxsid = mysqli_query($koneksi,  "select max(sales_id) AS idsales from cera_sales");
		$count = $maxsid->fetch_assoc(); 
		$newid = $count['idsales']+ 1 ;


		$i = 0;
		foreach ($_SESSION['productList'] as $input) {

            $query = mysqli_query($koneksi, "select * from cera_product where id_product =".$_POST['id'][$i]);
            $data = mysqli_fetch_array($query);
            $produk=$data['id_product'];

            mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id,  si_item_name, si_item_qty, si_item_price, si_item_deskripsi, si_item_size, si_item_gambar) values ('$newid', '$produk', '".$_POST['name'][$i]."', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."','".$_POST['desc'][$i]."','".$_POST['size'][$i]."','".$_POST['gambar'][$i]."')");
            
            $i++;
        }

		$_SESSION['formDataUpdate'] = $_POST;

		$idInvoice = $_SESSION['formDataUpdate']['idDelivery'];
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$telp = $_SESSION['formDataUpdate']['tlp_client'];
		$email = $_SESSION['formDataUpdate']['email'];
		
		$tgl_skrg = date("Y-m-d");
		
		
		$simpanInvoice = mysqli_query($koneksi, "insert into cera_sales (sales_nama_client, sales_alamat_client, sales_email_client, sales_telp_client, created_at, sales_invoice_no, sales_id_status) values ('$nama', '$alamat','$email', '$telp','$tgl_skrg', '$idInvoice', '3' )") or die(mysqli_error($koneksi));


			$queryinsert = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$newid."'");
	    	$invoice = mysqli_fetch_array($queryinsert);	




	   
        unset($_SESSION['formData']);
 		unset($_SESSION['productList']);

 		header('Location: ' . $_SERVER['HTTP_REFERER']);


		}




if(isset($_POST['updateQuotation'])){
		//echo json_encode($_POST);

		//echo json_encode($_POST);
		/* YANG KURANG ALUR LOGICNYA 

			1. update sales berdasarkan id sales
			2. foreach $_POST['id'] untuk update sales item ( untuk yg udh tersimpan )
			3. foreach( yg namenya new di quotation edit ) untuk insert ke sale item ( utk yg belum tersimpan )
			4. udah gitu ajah

intinya itu aja sih,
update sales,
update sales item ( ini yg udh ke insert )
insert sale item baru ( misal nambah product )

		*/
// data form jg array
		$_SESSION['formDataUpdate'] = $_POST;
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$email = $_SESSION['formDataUpdate']['email'];
		$telp = $_SESSION['formDataUpdate']['phone_client'];

				mysqli_query($koneksi, "update cera_sales SET 
				
				sales_quotation_no='".$_POST['quotationNo']."', 
				sales_nama_client='".$_POST['nama_client']."', 
				sales_alamat_client='".$_POST['alamat']."', 
				sales_email_client='".$_POST['email']."', 
				sales_telp_client='".$_POST['phone_client']."'

				where sales_id =" .$_POST['sales_id']) or die(mysqli_error($koneksi));

		$id_order = $_POST['sales_id'];

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$_POST['sales_id']."'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$id_order', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_price='".$_POST['price'][$i]."', 
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

if(isset($_POST['InvToKwitansi'])){
		//echo json_encode($_POST);

		// data form jg array
		$_SESSION['formDataUpdate'] = $_POST;
		$tgl_skrg = date('Y-m-d h:m:s');
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$nomor = $_SESSION['formDataUpdate']['invoiceNo'];		
		$perusahaan = $_SESSION['formDataUpdate']['perusahaan'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$gunaBayar = $_SESSION['formDataUpdate']['gunaBayar'];

		

				mysqli_query($koneksi, "update cera_sales SET 
				
				sales_kwitansi_no='".$_POST['kwitansiNo']."', 
				sales_nama_client='".$_POST['nama_client']."', 
				sales_alamat_client='".$_POST['alamat']."', 
				sales_email_client='".$_POST['email']."', 
				sales_telp_client='".$_POST['phone_client']."',
				sales_tgl_bayar='$tgl_skrg',
				sales_guna_bayar='".$_POST['gunaBayar']."',
				sales_id_status='4'

				where sales_id =" .$_POST['sales_id']) or die(mysqli_error($koneksi));

		$id_order = $_POST['sales_id'];

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$_POST['sales_id']."'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$id_order', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_price='".$_POST['price'][$i]."', 
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//edit invoice

	if(isset($_POST['editInvoice'])){
		//echo json_encode($_POST);

		// data form jg array
		$_SESSION['formDataUpdate'] = $_POST;
		$tgl_skrg = date('Y-m-d h:m:s');
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$nomor = $_SESSION['formDataUpdate']['invoiceNo'];		
		$perusahaan = $_SESSION['formDataUpdate']['perusahaan'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$email = $_SESSION['formDataUpdate']['email'];
		$gunaBayar = $_SESSION['formDataUpdate']['gunaBayar'];
		$telp = $_SESSION['formDataUpdate']['phone_client'];

		

				mysqli_query($koneksi, "update cera_sales SET 
				
				sales_invoice_no='$nomor', 
				sales_nama_client='".$_POST['nama_client']."', 
				sales_alamat_client='".$_POST['alamat']."', 
				sales_email_client='".$_POST['email']."', 
				sales_telp_client='".$_POST['phone_client']."'

				where sales_id =" .$_POST['sales_id']) or die(mysqli_error($koneksi));

		$id_order = $_POST['sales_id'];

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$_POST['sales_id']."'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$id_order', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_price='".$_POST['price'][$i]."', 
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//edit PO

	if(isset($_POST['editPO'])){
		//echo json_encode($_POST);

		//echo json_encode($_POST);
		/* YANG KURANG ALUR LOGICNYA 

			1. update sales berdasarkan id sales
			2. foreach $_POST['id'] untuk update sales item ( untuk yg udh tersimpan )
			3. foreach( yg namenya new di quotation edit ) untuk insert ke sale item ( utk yg belum tersimpan )
			4. udah gitu ajah

intinya itu aja sih,
update sales,
update sales item ( ini yg udh ke insert )
insert sale item baru ( misal nambah product )
	
		*/
// data form jg array
	


		$idSales = $_GET['sales_id'];
		$_SESSION['formDataUpdate'] = $_POST;
		
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$tgl_skrg = date("Y-m-d");


		$nama_product = $_SESSION['formDataUpdate']['nama_product'];
		$idDev = $_SESSION['formDataUpdate']['idDelivery'];
		$bahan = $_SESSION['formDataUpdate']['desc_product'];
		$ukuran = $_SESSION['formDataUpdate']['size_product'];
		$jumlah = $_SESSION['formDataUpdate']['qty_product'];
		$gambar = $_SESSION['formDataUpdate']['gambar_po'];
		$tglacc = $_SESSION['formDataUpdate']['tglACC'];
		$tgldp = $_SESSION['formDataUpdate']['tglDP'];
		$deadline = $_SESSION['formDataUpdate']['deadline'];$nama = $_SESSION['formDataUpdate']['nama_client'];
		$cargo = $_SESSION['formDataUpdate']['cargo'];
		$packing = $_SESSION['formDataUpdate']['packing'];
		$nama_cargo = $_SESSION['formDataUpdate']['namaCargo'];$nama = $_SESSION['formDataUpdate']['nama_client'];
		$telp = $_SESSION['formDataUpdate']['phoneCargo'];
		$qtykoli = $_SESSION['formDataUpdate']['jumlahKoli'];
		$harga = $_SESSION['formDataUpdate']['hargaKirim'];
		$tglkirim = $_SESSION['formDataUpdate']['tglKirim'];
		$id_order = $_POST['sales_id'];

$qsimpanquotation = mysqli_query($koneksi, "update cera_sales SET 
				 
				sales_nama_client='".$_POST['nama_client']."',
				sales_tgl_dp='".$tgldp."',
				sales_tgl_acc='".$tglacc."',
				sales_tgl_deadline='".$deadline."',
				sales_id_delivery='".$idDev."',
				sales_tgl_po='".$tgl_skrg."',
				sales_id_status='2'

				where sales_id ='".$idSales."'") or die(mysqli_error($koneksi));


		
	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '".$idSales."'");
	    $POData = mysqli_fetch_array($query);


	     $querycsi = mysqli_query($koneksi, "select * from cera_sales_item where si_sales_id = '".$idSales."'");
	    $poDatacs = mysqli_fetch_array($querycsi);
	   


	    $insertPO = mysqli_query($koneksi,"update cera_delivery SET
	    	delivery_id='".$_POST['$idDev']."',
	    	created_at='".$tgl_skrg."',
	    	updated_at='".$tgl_skrg."',
	    	acc_date='".$tglacc."',
	    	cargo='".$cargo."',
	    	packing='".$packing."',
	    	cargo_name='".$nama_cargo."',
	    	phone_cargo='".$telp."',
	    	koli_qty='".$qtykoli."',
	    	price_cargo='".$harga."',
	    	shipping_time='".$tglkirim."'") or die(mysqli_error($koneksi));

	    $queryinsert = mysqli_query($koneksi, "select * from cera_delivery where delivery_id = '".$idDev."'");
	    $PODelivery = mysqli_fetch_array($queryinsert);

	    
//$updatecsi = mysqli_query($koneksi, "update cera_sales_item SET 
				//si_item_size='".$ukuran."',
				//si_item_bahan='".$bahan."',
				//si_item_qty='".$jumlah."',
				//si_item_gambar='".$gambar."'
				
				

				//where si_sales_id ='".$idSales."'") or die(mysqli_error($koneksi));

$i = 0;
		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		foreach ($_SESSION['productListUpdate'] as $input) {

			mysqli_query($koneksi, "insert into cera_sales_item 
				(si_id,si_sales_id, si_item_name, si_product_id, si_item_qty, si_item_price) 
				values ('','$idSales', '".$input['product_name']."', '".$input['id_product']."', '".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."')") or die(mysqli_error());
			$i++;
		}

		/* UPDATE BAGI YG UDAH ADA */
		$i=0;
		foreach($_POST['id'] as $d){

            $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_deskripsi='".$_POST['desc'][$i]."',
            			si_item_size='".$_POST['size'][$i]."', 
            			si_item_gambar='".$_POST['gambar'][$i]."',
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);
            $i++;
		}
$i=0;
		foreach($_POST['id'] as $d){
	include "../../lib/config.php";
    include "../../lib/koneksi.php";
	

	$nama_file = $_FILES['gambar'][$i]['name'][$i];
    $ukuran_file = $_FILES['gambar'][$i]['size'][$i];
    $tipe_file = $_FILES['gambar'][$i]['type'][$i];
    $tmp_file = $_FILES['gambar'][$i]['tmp_name'][$i];

		$path = "../../upload/" . $nama_file;
    if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {// Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if ($ukuran_file <= 1000000) {// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload

            if (move_uploaded_file($tmp_file, $path)) {
		
	   		// Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = mysqli_query($koneksi, 
            			"update cera_sales_item SET 
            			si_item_deskripsi='".$_POST['desc'][$i]."',
            			si_item_size='".$_POST['size'][$i]."', 
            			si_item_gambar='".$_POST['gambar'][$i]."',
            			si_item_qty='".$_POST['qty'][$i]."' 
            			where si_id =".$d
            		);

                if ($query) {// Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../adminweb.php?module=product';</script>";
                } else {
                    // Jika Gagal, Lakukan :
                    echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../adminweb.php?module=product';</script>";
                }
            } else {
                // Jika gambar gagal diupload, Lakukan :
                echo "<script> alert('Data Gambar Produk Gagal Dimasukkan'); window.location = '../../adminweb.php?module=product';</script>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "<script> alert('Data Gambar Produk Gagagl Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '../../adminweb.php?module=product';</script>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "<script> alert('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '../../adminweb.php?module=product';</script>";
    }

 $i++;
		}

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		/* INSERT BARU UNTUK DATA YG BELUM ADA */
		

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}