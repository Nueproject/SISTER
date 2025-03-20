<?php

	session_start();

    include "../../lib/config.php";
    include "../../lib/koneksi.php";
	
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

	if(isset($_POST['aksi_getPriceQty'])){

		$price = "select * from cera_product_price where pp_id=".$_POST['pp_id'];
		$price = mysqli_query($koneksi,$price);
		$price = mysqli_fetch_array($price);
		
		header('Content-Type: application/json');
		echo json_encode($price);

	}

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

            mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id, si_item_qty, si_item_price) values ('$id_order', '$produk', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."')");
            
            $i++;
        }

        unset($_SESSION['productList']);
        unset($_SESSION['formData']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}

	//ini belum bisa
	if(isset($_POST['tambahProductListUpdate'])){

		// data form
		$_SESSION['formDataUpdate'] = $_POST;
		
		// data product list
		$product = "select * from cera_product where id_product = '".$_POST['idProductList']."'";
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

	if(isset($_POST['updateQuotation'])){

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
		$_SESSION['formData'];
		$nama = $_SESSION['formDataUpdate']['nama_client'];
		$alamat = $_SESSION['formDataUpdate']['alamat'];
		$email = $_SESSION['formDataUpdate']['email'];
		$telp = $_SESSION['formDataUpdate']['phone_client'];

		$qsimpanquotation = mysqli_query($koneksi, "update cera_sales SET 
				(sales_quotation_no, 
				sales_nama_client, 
				sales_alamat_client, 
				sales_email_client, 
				sales_telp_client) values ('Q-$tgl_skrg', '$nama', '$alamat', '$email', '$telp') where sales_id =" .$_POST['sales_id']) or die(mysqli_error($koneksi));

		$id_order=mysqli_insert_id($koneksi);

	    $query = mysqli_query($koneksi, "select * from cera_sales where sales_id = '$id_order'");
	    $invoiceData = mysqli_fetch_array($query);

		// cth $_SESSION['formData']['nama_client'],$_SESSION['formData']['alamat']

		// data products, array, jadi harus foreach

		$i = 0;
		foreach ($_SESSION['productList'] as $input) {



            $query = mysqli_query($koneksi, "update cera_sales_item SET (si_item_name, si_item_price, si_item_qty) values ('','".$_POST['qtynew'][$i]."','".$_POST['harganew'][$i]."') where id_product =".$_POST['id'][$i]);
            $data = mysqli_fetch_array($query);
            $produk=$data['id_product'];

            mysqli_query($koneksi, "insert into cera_sales_item (si_sales_id, si_product_id, si_item_qty, si_item_price) values ('$id_order', '$produk', '".$_POST['qty'][$i]."','".$_POST['harga'][$i]."')");
            
            $i++;
        }

        unset($_SESSION['productListUpdate']);
        unset($_SESSION['formDataUpdate']);

        header('Location: ' . $_SERVER['HTTP_REFERER']);

	}