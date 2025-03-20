<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Invoice</h3>
        <br>
        <a href="adminweb.php?module=tambah_invoice"><button class="btn btn-primary">Tambah invoice</button></a>
       <a href="adminweb.php?module=print_quotation"><button class="btn btn-primary">Print</button></a>  <br>

        <!--- Modal For Tambah -->

        <div class="modal fade" id="newquotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_salesall.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New Invoice</h4>

              </div>

              <div class="modal-body">

                <!--- Details Invoice ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Quotation No</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo @$_SESSION['formDataInvoice']['quotationNo']; ?>" name="quotationNo" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo @$_SESSION['formDataInvoice']['nama_client']; ?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo @$_SESSION['formDataInvoice']['alamat']; ?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo @$_SESSION['formDataInvoice']['email']; ?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo @$_SESSION['formDataInvoice']['phone_client']; ?>" name="phone_client" placeholder="Phone Client">
                        </div>

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductListInvoice">
                            <?php

                              $products = mysqli_query($koneksi,"select * from cera_product where product_type='child'");
                              while($p=mysqli_fetch_array($products)){

                            ?>

                                <option value="<?php echo $p['id_product']; ?>"> <?php echo $p['product_name']; ?></option>

                            <?php 
                              } 
                            ?>
                          </select>

                        </div>
                        <div class="col-md-4">

                          <button type="submit" name="tambahProductListInvoice" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

                        </div>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th><center>ID</center></th>
                            <th><center>Jenis Produk</center></th>
                            <th><center>Harga Fix</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Harga Custom</center></th>
                            <th><center>Options</center></th>
                          </tr>
                        </thead>
                        <tbody id="addproductform">

                        <?php
                          
                          $products = @$_SESSION['productListInvoice'];

                          if(array_key_exists('productListInvoice', $_SESSION)){
                          foreach($products as $data){
                        ?>
                          <tr>
                            <td><center><?php echo $data['id_product']; ?>                           
                                <input type="hidden" name="id[]" value="<?php echo $data['id_product']; ?>"></center>
                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?>
                                <input type="hidden" name="name[]" value="<?php echo  $data['product_name']; ?>">
                              </center>
                            </td>
                            <td>

                            <select onchange="setPriceQtyQuotation($(this),$(this).val())" name="fixPriceQty">                             
                              <?php

                                  $prices = mysqli_query($koneksi,"select * from cera_product_price where pp_product_id=".$data['id_product']);
                                  while($p=mysqli_fetch_array($prices)){

                                ?>
                                    <option value="<?php echo $p['pp_id']; ?>"> <?php echo $p['pp_price']; ?> - <?php echo $p['pp_qty']; ?></option>

                              <?php 
                                  } 
                                ?>
                            </select>  
                            </td>
                            <td>
                              <center>

                                <input class="form-control qty" type="number" min="0" name="qty[]" value="<?php echo $data['product_name']; ?>">

                              </center>
                            </td>
                            
                            <td><center><input type="number" class="form-control price" name="harga[]" value="<?php echo $data['product_name']; ?>"></center></td>
                            <td>
                              <button type="submit" name="removeProductListInvoice" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>
                        <?php 
                          }
                        }
                        ?>
                        </tbody>

                      </table>

                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="saveQuotation" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <!-- end modal for tambah -->


        <div class="box-tools">
          <form role="search" method="POST" action="adminweb.php?module=search">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">

              <button type="submit" style="display: all;" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
        </form>
            </div>
          </div>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th>Invoice No</th>
                      <th>Nama Client</th>
                      <th>perusahaan</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal</th>

                      <th style="width: 110px">Aksi</th>
          </tr>
      <?php

      $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);

      $myq = "select * from cera_sales cs JOIN cera_client cc ON cs.sales_id_client=cc.id_client where sales_id_status=3 order by sales_invoice_no desc";

      $mynewpo = "select * from cera_sales JOIN cera_sales_item ON cera_sales.sales_id = cera_sales_item.si_sales_id where sales_id_status=3 order by sales_invoice_no desc";

      $kueriQuo= mysqli_query($koneksi, $myq);
      while($pro=mysqli_fetch_array($kueriQuo)){
      ?>
          <tr>
                      <td><?php echo $pro['sales_invoice_no']; ?></td>
                      <td><?php echo $pro['client_name']; ?></td>
                      <td><?php echo $pro['perusahaan']; ?></td>
                      <td><?php echo $pro['address_client']; ?></td>
                      <td><?php echo $pro['email_client']; ?></td>
                      <td><?php echo $pro['phone_client']; ?></td>
                      <td><?php echo $pro['updated_at']; ?></td>
                      
            <td>


                <!-- Single button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#detail<?php echo $pro['sales_id'];?>">Details</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#edit<?php echo $pro['sales_id'];?>" >Edit</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#kwitansi<?php echo $pro['sales_id'];?>" >Set As Kwitansi</a></li>
                    
                    <li role="separator" class="divider"></li>
                    <li><a href="module/sales/aksi_hapus.php?sales_id=<?php echo $pro['sales_id'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                  </ul>
                </div>

                <div class="btn-group">
                
                
                
            </div></td>
          </tr>
    <?php } ?>
        </table>
      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </div>
</div>

<!-- Modal For Detail Invoice -->
<?php

                $kueriQuo= mysqli_query($koneksi,$myq);
            
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
                       
                       <a href="adminweb.php?module=print_detail_invoice_np&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print non pajak</button></a>
                       <a href="adminweb.php?module=print_detail_invoice&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print Pajak</button></a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

<!-- End For Detail Invoice -->


<!--- Modal For Set As Kwitansi -->
        <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
            
                while($pro=mysqli_fetch_array($kueriQuo)){

                 
              ?>

        <div class="modal fade" id="kwitansi<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_salesall.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Set As Kwitansi<?php echo $pro['sales_quotation_no'];?></h4>

              </div>

              <div class="modal-body">

                <!--- Details Invoice ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">
                      
                         <?php 
                            $tgl_skrg = date("dmY");
                            ?>
                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">No Kwitansi</label>
                          <input type="text" class="form-control" id="quotationNo" value="NO.<?php echo $pro['sales_id']; ?>/CL/<?php echo date('d/m/Y');?>" name="kwitansiNo" placeholder="Nomor Kwitansi">
                          <input type="hidden" value="<?php echo $pro['sales_id'];?>" name="sales_id" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['client_name'];?>" name="nama_client" placeholder="Nama Client">
                          <input type="hidden" class="form-control" id="idClient" value="<?php echo $pro['id_client'];?>" name="id_client" placeholder="Id Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Perusahaan</label>
                          <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?php echo $pro['perusahaan'];?>" placeholder="Nama Perusahaan">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo $pro['address_client'];?>" name="alamat" placeholder="Alamat">
                        </div> 
                         <?php
                            $jumlah = 0;
                            $q = mysqli_query($koneksi,"select * from cera_sales_item join cera_product on cera_product.id_product = cera_sales_item.si_product_id where cera_sales_item.si_sales_id = ".$pro['sales_id']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <?php $jumlah = $jumlah + ($ew['si_item_price'] * $ew['si_item_qty']); ?>
                          <?php } ?>
                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Guna Membayar</label>
                          <input type="text" class="form-control" id="gunaBayar" name="gunaBayar" placeholder="Guna Membayar">
                          <input type="hidden" class="form-control" id="Sejumlah" name="Sejumlah" value="<?php echo $jumlah;?>" placeholder="Sejumlah">
                        </div>  

                    </div>
                    
                  
                    
<div class="col-md-8">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Keterangan</h4>
                      </div>
                      <div class="modal-body">

                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Detail dari Invoice#<?php echo $tgl_skrg ;?>-<?php echo $pro['sales_id'];?></label>                          
                        </div>
                        <div class="col-md-12">
                          
                            
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
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="InvToKwitansi" class="btn btn-primary">Update</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- end modal set as Kwitansi -->

      <!-- Modal for Edit Invoice -->
             <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
            
                while($pro=mysqli_fetch_array($kueriQuo)){

                 
              ?>

        <div class="modal fade" id="edit<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_salesall.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Invoice #<?php echo $pro['sales_invoice_no'];?></h4>

              </div>

              <div class="modal-body">

                <!--- Details Invoice ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    
                        <?php $tgl_skrg = date("dmY"); ?>
                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">No Invoice</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo $tgl_skrg ;?>-<?php echo $pro['sales_id'];?>" name="invoiceNo" placeholder="Nomor Kwitansi">
                          <input type="hidden" value="<?php echo $pro['sales_id'];?>" name="sales_id" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['client_name'];?>" name="nama_client" placeholder="Nama Client">
                          <input type="hidden" class="form-control" id="idClient" value="<?php echo $pro['id_client'];?>" name="id_client" placeholder="Id Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Perusahaan</label>
                          <input type="text" class="form-control" id="perusahaanClient" value="<?php echo $pro['perusahaan'];?>" name="perusahaan" placeholder="Perusahaan">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo $pro['phone_client'];?>" name="phone_client" placeholder="Telepon/HP">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="email" value="<?php echo $pro['address_client'];?>" name="alamat" placeholder="Alamat">
                        </div>                  

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo $pro['email_client']?>" name="email" placeholder="Email">
                        </div>  

                    </div>
                    
<div class="col-md-8">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Keterangan</h4>
                      </div>
                      <div class="modal-body">

                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Detail dari Purchase Order #<?php echo $tgl_skrg ;?>-<?php echo $pro['sales_id'];?></label>                          
                        </div>
                        <div class="col-md-12">
                          
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
                        </div>
                        
                      </div>
                      
                    </div>
                  </div>
              
              </div> <!-- body -->
              <div class="modal-footer">
                <button type="submit" name="editInvoice" class="btn btn-primary">Update</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php } ?>
      <!-- End for edit invoice -->