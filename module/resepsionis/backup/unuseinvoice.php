<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Quotation</h3>
        <br>
        <a href="adminweb.php?module=tambah_invoice"><button class="btn btn-primary">Tambah invoice</button></a>
       <a href="adminweb.php?module=print_quotation"><button class="btn btn-primary">Print</button></a>  <br>

        <!--- Modal For Tambah -->

        <div class="modal fade" id="newquotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_sales.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New Quotation</h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Quotation No</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo @$_SESSION['formData']['quotationNo']; ?>" name="quotationNo" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo @$_SESSION['formData']['nama_client']; ?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo @$_SESSION['formData']['alamat']; ?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo @$_SESSION['formData']['email']; ?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo @$_SESSION['formData']['phone_client']; ?>" name="phone_client" placeholder="Phone Client">
                        </div>

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductList">
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

                          <button type="submit" name="tambahProductList" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

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
                          
                          $products = @$_SESSION['productList'];

                          if(array_key_exists('productList', $_SESSION)){
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
                              <button type="submit" name="removeProductList" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
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
          <div class="input-group" style="width: 150px;">
            <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button style="display:none" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th>Invoice No</th>
                      <th>Nama Client</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th style="width: 110px">Aksi</th>
          </tr>
      <?php

      $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);

      $myq = "select * from cera_sales where sales_id_status=3 order by sales_quotation_no desc";

      $mynewpo = "select * from cera_sales JOIN cera_sales_item ON cera_sales.sales_id = cera_sales_item.si_sales_id where sales_id_status=3 order by sales_invoice_no desc";

      $kueriQuo= mysqli_query($koneksi, $myq);
      while($pro=mysqli_fetch_array($kueriQuo)){
      ?>
          <tr>
            <td><?php echo $pro['sales_invoice_no']; ?></td>
                      <td><?php echo $pro['sales_nama_client']; ?></td>
                      <td><?php echo $pro['sales_alamat_client']; ?></td>
                      <td><?php echo $pro['sales_email_client']; ?></td>
                      <td><?php echo $pro['sales_telp_client']; ?></td>
                      <td><?php echo $pro['updated_at']; ?></td>
                      <td><?php echo $pro['sales_nama_client']; ?></td>
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

 <!--- Modal For Set As Kwitansi -->
        <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
            
                while($pro=mysqli_fetch_array($kueriQuo)){

                 
              ?>

        <div class="modal fade" id="kwitansi<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_sales.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Set As Kwitansi<?php echo $pro['sales_quotation_no'];?></h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    
                        <?php $tgl_skrg = date("dmY"); ?>
                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">No Kwitansi</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo $tgl_skrg ;?>-<?php echo $pro['sales_id'];?>" name="kwitansiNo" placeholder="Nomor Kwitansi">
                          <input type="hidden" value="<?php echo $pro['sales_id'];?>" name="sales_id" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['sales_nama_client'];?>" name="nama_client" placeholder="Nama Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Perusahaan</label>
                          <input type="text" class="form-control" id="alamat" value="" name="perusahaan" placeholder="Nama Perusahaan">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="email" value="<?php echo $pro['sales_alamat_client'];?>" name="alamat" placeholder="Alamat">
                        </div>                  

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Guna Membayar</label>
                          <input type="text" class="form-control" id="email" value="" name="email" placeholder="Guna Membayar">
                        </div>  

                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <div class="col-md-12">
                          <label for="inputEmail3" class="control-label">Pilih Product</label>                          
                        </div>
                        <div class="col-md-8">
                          
                          <select class="form-control" id="productlist" name="idProductListUpdate">
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

                          <button type="submit" name="tambahProductListUpdate" id="btnaddproduct" class="btn btn-primary">Tambah Product</button>

                        </div>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th><center>ID</center></th>
                            <th><center>Jenis Produk</center></th>
                            <th><center>Harga</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Total</center></th>
                            <th><center>Options</center></th>
                          </tr>
                        </thead>
                        <tbody id="addproductform">

                        <?php
                          /* GET DATA YANG DI SESSION ( BELUM KESIMPEN )*/
                          $products = @$_SESSION['productListUpdate'];

                          if(array_key_exists('productListUpdate', $_SESSION)){
                          foreach($products as $data){

                        ?>

                          <tr>
                            <td><center><?php echo $data['id_product']; ?>                           
                                <input type="hidden" name="idnew[]" value="<?php echo $data['id_product']; ?>"></center>
                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?></center>
                            </td>                
                              <?php
                                
                                $in = ['price'=>1,'qty'=>1];

                                  $prices = mysqli_query($koneksi,"select * from cera_product_price where pp_product_id=".$data['id_product']);
                                  while($p=mysqli_fetch_array($prices)){

                                    $in['price'] = $p['pp_price'];
                                    $in['qty'] = $p['pp_qty'];
                                    break;

                                  } 
                                ?>
                            <td><center>
                              <input type="number" 
                                    id="priceQuotationListUpdate<?php echo $data['id_product'];?>" 

                                        onchange="changValQuotation('<?php echo $data['id_product'];?>',$('#priceQuotationListUpdate<?php echo $data['id_product'];?>').val(),$('#qtyQuotationListUpdate<?php echo $data['id_product'];?>').val())"

                                    class="form-control price" 
                                    name="harganew[]" 
                                    value="<?php echo $in['price']; ?>">

                              </center></td>

                            <td>
                              <center>
                                <input class="form-control qty" 
                                        id="qtyQuotationListUpdate<?php echo $data['id_product'];?>" 

                                        onchange="changValQuotation('<?php echo $data['id_product'];?>',$('#priceQuotationListUpdate<?php echo $data['id_product'];?>').val(),$('#qtyQuotationListUpdate<?php echo $data['id_product'];?>').val())"

                                        type="number" min="0" 
                                        name="qtynew[]" 
                                        value="<?php echo $in['qty']; ?>">
                              </center>
                            </td>
                            <td id="totalQuotationListUpdate<?php echo $data['id_product'];?>">
                            <?php echo $in['price']*$in['qty']; ?>                              
                            </td>
                            <td>
                              <button type="submit" name="removeProductListUpdate" value="<?php echo $data['id_product'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>

                        <?php

                          }
                        }

                          /* GET DATA YANG DI DATABASE ( UDAH KESIMPEN )*/
                          $items = "select * from cera_sales_item where si_sales_id=".$pro['sales_id'];
                          $items = mysqli_query($koneksi,$items);

                          while($item=mysqli_fetch_array($items)){

                            $data = "select * from cera_product where id_product=".$item['si_product_id'];
                            $data = mysqli_query($koneksi,$data);
                            $data = mysqli_fetch_array($data);

                        ?>
                          <tr>
                            <td><center><?php echo $data['id_product']; ?>
                    
                                <input type="hidden" name="id[]" value="<?php echo $item['si_id']; ?>"></center>

                            </td>
                            <td><center>
                              <?php echo $data['product_name']; ?></center>
                            </td>
                            <td>
                              <center>

                                <input class="form-control" 
                                        type="number" 
                                        min="<?php echo $item['si_item_price']; ?>" 
                                        name="price[]" 
                                        id="priceQuotationListSaved<?php echo $item['si_product_id'];?>"

                                        onchange="changValQuotationSaved('<?php echo $item['si_product_id'];?>',$('#priceQuotationListSaved<?php echo $item['si_product_id'];?>').val(),$('#qtyQuotationListSaved<?php echo $item['si_product_id'];?>').val())" 

                                        value="<?php echo $item['si_item_price']; ?>">

                              </center>
                            </td>
                            <td>
                              <center>

                                <input class="form-control" 
                                        type="number" 
                                        min="<?php echo $item['si_item_qty']; ?>" 
                                        name="qty[]" 

                                        id="qtyQuotationListSaved<?php echo $item['si_product_id'];?>"

                                        onchange="changValQuotationSaved('<?php echo $item['si_product_id'];?>',$('#priceQuotationListSaved<?php echo $item['si_product_id'];?>').val(),$('#qtyQuotationListSaved<?php echo $item['si_product_id'];?>').val())" 

                                        value="<?php echo $item['si_item_qty']; ?>">

                              </center>
                            </td>
                            <td>
                                <center id="totalQuotationListSaved<?php echo $item['si_product_id'];?>"><?php echo $item['si_item_qty']*$item['si_item_price']; ?></center>
                            </td>
                            <td>
                              <button type="submit" name="removeProductListPO" value="<?php echo $pro['sales_id'];?>" id="btnaddproduct" class="btn btn-primary">Remove</button>
                            </td>
                          </tr>
                        <?php 
                          }
                        
                        ?>
                        </tbody>

                      </table>

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
