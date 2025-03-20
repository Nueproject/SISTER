<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Purchase Order</h3>
                  <br>
             <a href="adminweb.php?module=tambah_po"><button class="btn btn-primary">Tambah PO</button></a>
             <a href="adminweb.php?module=print_po">
             <button class="btn btn-primary">Print</button></a>


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
                      <th>Tanggal PO</th>
                      <th>Client</th>
                      <th>Cargo</th>
                      <th>Packing</th>
                      <th>Nama Cargo</th>
                      <th>Jumlah Koli</th>         
                      <th>Harga Kirim</th>
                      <th>Total</th>
                      <th>Tanggal Kirim</th>
                      <th style="width: 110px">Aksi</th>
                    </tr>
                <?php

                $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
                $offset = ($page*2);
            

            $myq = "select * from cera_sales JOIN cera_client on cera_sales.sales_id_client=cera_client.id_client JOIN cera_delivery ON cera_delivery.delivery_id = cera_sales.sales_id_delivery where sales_id_status='2' order by sales_id desc";

               //$myq = "select * from cera_sales_item JOIN cera_sales ON cera_sales.sales_id = cera_sales_item.si_sales_id JOIN cera_delivery ON cera_delivery.delivery_id = cera_sales.sales_id_delivery JOIN cera_product_price ON cera_product_price.pp_product_id = cera_sales_item.si_product_id JOIN cera_sales_status ON cera_sales_status.ss_id = cera_sales.sales_id_status JOIN cera_product ON cera_product.id_product = cera_sales_item.si_product_id where cera_sales.sales_id_status='2' ";
$kueriQuo= mysqli_query($koneksi, $myq);
      while($pro=mysqli_fetch_array($kueriQuo)){
    
      ?>
          <tr>
            <td>#<?php echo $pro['sales_tgl_po']; ?></td>
            <td><?php echo $pro['client_name']; ?></td>
            <td><?php echo $pro['cargo']; ?></td>
            <td><?php echo $pro['packing']; ?></td>
            <td><?php echo $pro['cargo_name']; ?></td>
            <td><?php echo $pro['koli_qty']; ?></td>
            <td><?php echo $pro['price_cargo']; ?></td>
            <?php $total=$pro['koli_qty']*$pro['price_cargo'];?>
            <td><?php echo $total; ?></td>
            <td><?php echo $pro['shipping_time']; ?></td>
                      <td>
                   <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#modal<?php echo $pro['sales_id'];?>">Details</a></li>
                    <li><a href="adminweb.php?module=edit_po&id_sales=<?php echo $pro['sales_id'];?>">Edit</a></li>              
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#invoice<?php echo $pro['sales_id'];?>">Set As Invoice</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="module/sales/aksi_hapus.php?sales_id=<?php echo $pro['sales_id'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                  </ul>
                </div>
                <div class="btn-group">
                
                
                
            </div>
                      </td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->

            
              </div><!-- /.box -->

            </div>
          </div>

<!-- Modal Untuk Details -->

<?php

                $kueriQuo= mysqli_query($koneksi,$myq);
                while($pro=mysqli_fetch_array($kueriQuo)){

              ?>

                
                <div class="modal fade" id="modal<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content modal-lg">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari Purchase Order #<?php echo $pro['sales_quotation_no'];?></h4>
                      </div>
                      <div class="modal-body">

                        <table class="table table-striped">
                          <tr>
                            <td><b>Nama Product</b></td>
                            <td><b>Deskripsi</b></td>
                            <td><b>Ukuran</td>
                            <td><b>Jumlah</b></td>
                            <td><b>Tgl DP</b></td>
                            <td><b>Tgl ACC Design</b></td>
                            <td><b>Deadline</b></td>
                            <td><b>Design</b></td>
                          </tr>
                          <?php 
                            $total = 0;
                            $q = mysqli_query($koneksi,"select * from cera_sales_item join cera_product on cera_product.id_product = cera_sales_item.si_product_id join cera_sales on cera_sales.sales_id = cera_sales_item.si_sales_id where cera_sales_item.si_sales_id = ".$pro['sales_id']);
                            while($ew = mysqli_fetch_array($q)){
                          ?>
                          <tr>
                            <td><?php echo $ew['product_name'];?></td>
                            <td><?php echo $ew['si_item_deskripsi'];?></td>
                            <td><?php echo $ew['si_item_size'];?></td>
                            <td><?php echo $ew['si_item_qty'];?></td>
                            <td><?php echo $ew['sales_tgl_dp'];?></td>
                            <td><?php echo $ew['sales_tgl_acc'];?></td>
                            <td><?php echo $ew['sales_tgl_deadline'];?></td>
                            <td><img width="100px" height="20%" src="img/upload/<?php echo $ew['si_item_gambar'];?>"</td>

                                                      </tr>
                          <?php $total = $total + ($ew['si_item_price'] * $ew['si_item_qty']); ?>
                          <?php } ?>
                          
                        </table>

                      </div>
                      <div class="modal-footer">
                       <a href="adminweb.php?module=print_detail_po&id_sales=<?php echo $pro['sales_id'];?>"><button class="btn btn-primary">Print</button></a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

<!-- end of Modal Untuk Details -->


  <!--- Modal For Set As Invoice -->
        <?php

                $kueriQuo= mysqli_query($koneksi,$myq);
            
                while($pro=mysqli_fetch_array($kueriQuo)){

                 
              ?>

        <div class="modal fade" id="invoice<?php echo $pro['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
            <form action="module/sales/aksi_salesall.php" method="post">
              <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Set As Invoice<?php echo $pro['sales_quotation_no'];?></h4>

              </div>

              <div class="modal-body">

                <!--- Details Quotation ---->

                <!--- Products ---->
                  <div class="row">
                    
                    <div class="col-md-4">                    
                        <?php $tgl_skrg = date("dmY"); ?>
                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">No Invoice</label>
                          <input type="text" class="form-control" id="quotationNo" value="<?php echo $tgl_skrg ;?>-<?php echo $pro['sales_id'];?>" name="quotationNo" placeholder="Nomor Quotation">
                          <input type="hidden" value="<?php echo $pro['sales_id'];?>" name="sales_id" placeholder="Nomor Quotation">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Nama Client</label>
                          <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['client_name'];?>" name="nama_client" placeholder="Nama Client">
                          <input type="hidden" class="form-control" id="idClient" value="<?php echo $pro['id_client'];?>" name="id_client" placeholder="Id Client">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="<?php echo $pro['address_client'];?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Email</label>
                          <input type="text" class="form-control" id="email" value="<?php echo $pro['email_client'];?>" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="control-label">Telepon/HP</label>
                          <input type="text" class="form-control" id="phoneClient" value="<?php echo $pro['phone_client'];?>" name="phone_client" placeholder="Phone Client">
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
                <button type="submit" name="POToInvoice" class="btn btn-primary">Update</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php } ?>

        <!-- end modal set Invoice -->

