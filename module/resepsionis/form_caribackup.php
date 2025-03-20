<?php
 //session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Pencarian</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Purchase Order</li>
          </ol>
        </section>

<section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Tamu Kanreg I BKN Yogyakarta</h3>
                </div>

<?php
include "lib/koneksi.php";
$nama=$_POST['search'];
$query="select * from data_tamu_instansi dti join data_tamu dt on dti.nip = dt.nip join data_bidang db on dti.bidang = db.id join data_instansi di on dt.instansi = di.id_instansi join status s on dti.status = s.id_status where nama_instansi like '%$nama%'";
$hasil= mysqli_query($koneksi,$query);
echo"<center>";
echo"<h2>Hasil Pencarian</h2>";


if ($r=mysqli_fetch_array($hasil)){
  
 echo"<div class='col-md-12'>
                 <div class='form-group'>
                        <div class='col-md-12'>
<table class='table'>
                        <thead>
                          <tr>
                           <th><center>Status Terakhir</center></th>
                            <th><center>Nama Client</center></th>
                            <th><center>Alamat</center></th>
                            <th><center>Email</center></th>
                            <th><center>No.HP</center></th>
                            <th>Aksi</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                        <tr>
     <td><center>$r[ss_status_name]</center></td>
     <td><center>$r[client_name]</center></td>
     <td><center>$r[address_client]</center></td>
     <td><center>$r[email_client]</center></td>
     <td><center>$r[phone_client]</center></td>
     <td>

                <div class='btn-group'>
                  <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Options <span class='caret'></span>
                  </button>
                  <ul class='dropdown-menu'>
                    <li><a href='javascript::void(0)' data-toggle='modal' data-target='#detail$r[sales_id]'>Details</a></li>
                    <li><a href='javascript::void(0)' data-toggle='modal' data-target='#edit$r[sales_id]' >Edit</a></li>
                    <li><a href='adminweb.php?module=set_po&id_sales=$r[sales_id]' >Set As PO</a></li>
                    
                    <li role='separator' class='divider'></li>
                    <li><a href='module/sales/aksi_hapus.php?sales_id=$r[sales_id]' onClick='return confirm(Anda yakin ingin menghapus data ini?)'>Delete</a></li>
                  </ul>
                </div><div class='btn-group'>
                </div></td>

                        </tr>
                        </tbody>

                      </table>


 </div>
            </div>
              </div>
 
             

";
}
else
{
echo"DATA TIDAK DI TEMUKAN!";
}
?>
<br><br>
    <body><a href='adminweb.php?module=sales'><input class="btn btn-primary" type='submit' value='Kembali'></a></body>
    <br>
    <br>
    <br>
  </div>
        </div>
              </div>    
                 </div><!-- /.box-body -->



<!-- Modal Untuk Details -->

<?php
    $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);

      $myquotation = "select * from cera_sales where sales_id_status='1' order by sales_quotation_no desc";

      $mynewpo = "select * from cera_sales JOIN cera_sales_item ON cera_sales_item.si_sales_id = cera_sales.sales_id JOIN cera_product ON cera_product.id_product = cera_sales_item.si_product_id where sales_id_status='1' order by sales_quotation_no desc";

                $kueriQuo= mysqli_query($koneksi,$myquotation);
                while($pro=mysqli_fetch_array($kueriQuo)){

              ?>

                
                <div class="modal fade" id="detail<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari Quotation #<?php echo $pro['sales_quotation_no'];?></h4>
                      </div>
                      <div class="modal-body">

                        <table class="table table-striped">
                          <tr>
                            <td>Nama Product</td>
                            <td>Harga Product</td>
                            <td>Qty Product</td>
                            <td>Total</td>
                          </tr>
                          <?php 
                            $total = 0;
                            $q = mysqli_query($koneksi,"select * from cera_sales_item join cera_product on cera_product.id_product = cera_sales_item.si_product_id where cera_sales_item.si_sales_id = ".$pro['sales_id']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <tr>
                            <td><?php echo $ew['product_name'];?></td>
                            <td><?php echo $ew['si_item_price'];?></td>
                            <td><?php echo $ew['si_item_qty'];?></td>
                            <td><?php echo $ew['si_item_price'] * $ew['si_item_qty'];?></td>
                          </tr>
                          <?php $total = $total + ($ew['si_item_price'] * $ew['si_item_qty']); ?>
                          <?php } ?>
                          <tr>
                            <td colspan="3">Grand Total</td>
                            <td><?php echo $total;?></td>
                          </tr>
                        </table>

                      </div>
                      <div class="modal-footer">
                       <center>
                       <a href="adminweb.php?module=print_detail_quotation&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Quotation</button></a>
                         <a href="adminweb.php?module=print_detail_po&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Purchase Order</button></a>
                      <a href="adminweb.php?module=print_detail_invoice_np&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Invoice Non Pajak</button></a>
                      </center></div>

                      <div class="modal-footer">
                      <center>
                      <a href="adminweb.php?module=print_detail_invoice&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Invoice Pajak</button></a>
                       <a href="adminweb.php?module=print_detail_kwitansi&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Kwitansi</button></a>
                      </center>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

<!-- end of Modal Untuk Details -->










<?php } ?>
