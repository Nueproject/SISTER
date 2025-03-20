<div class="row">
           <div class="col-xs-12">
             <div class="box">
               <div class="box-header">
                 <h3 class="box-title">Data Kwitansi</h3>
                 <br>
                 <a href="<?php echo $base_url; ?>adminweb.php?module=tambah_kwitansi"><button class="btn btn-primary">Tambah Kwitansi</button></a>
                <a href="adminweb.php?module=print_kwitansi"><button class="btn btn-primary">Print Kwitansi</button></a>

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
                     <th>No Kwitansi</th>
                     <th>Nama Client</th>
                     <th>Sejumlah</th>
                     <th>Guna Bayar</th>
                     <th>Tanggal</th>

            <th style="width: 110px">Aksi</th>
                   </tr>
               <?php
               $kueriKwitansi= mysqli_query($koneksi,"select * from cera_sales cs join cera_client cc ON cs.sales_id_client=cc.id_client where sales_id_status='4' order by sales_id desc");
               while($kat=mysqli_fetch_array($kueriKwitansi)){
               ?>

                     <td><?php echo $kat['sales_kwitansi_no']; ?></td>
                     <td><?php echo $kat['client_name']; ?></td>                    
                     <td><?php echo $kat['sales_jumlah_bayar']; ?></td>
                     <td><?php echo $kat['sales_guna_bayar']; ?></td>
                     <td><?php echo $kat['sales_tgl_bayar']; ?></td>

          <td>


                <!-- Single button -->
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#detail<?php echo $kat['sales_id'];?>">Details</a></li>
                    <li><a href="javascript::void(0)" data-toggle="modal" data-target="#edit<?php echo $kat['sales_id'];?>" >Edit</a></li>
                                  
                    <li role="separator" class="divider"></li>
                    <li><a href="module/sales/aksi_hapus.php?sales_id=<?php echo $kat['sales_id']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                  </ul>
                </div>

                <div class="btn-group">
                
                
                
            </div></td>
                   </tr>
             <?php } ?>
                 </table>
               </div><!-- /.box-body -->

            <div class="box-footer">
       
                 </div><!-- /.box-footer -->
             </div><!-- /.box -->

           </div>
         </div>

         <!-- Fungsi Terbilang -->

         <?php
        function Terbilang($x)
        {
          $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
          if ($x < 12)
            return " " . $abil[$x];
          elseif ($x < 20)
            return Terbilang($x - 10) . "belas";
          elseif ($x < 100)
            return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
          elseif ($x < 200)
            return " seratus" . Terbilang($x - 100);
          elseif ($x < 1000)
            return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
          elseif ($x < 2000)
            return " seribu" . Terbilang($x - 1000);
          elseif ($x < 1000000)
            return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
          elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
        }
        ?>

        <!-- end of Fungsi Terbilang-->

        <!-- Modal For Edit -->
        <?php

       $kueriKwitansi= mysqli_query($koneksi,"select * from cera_sales cs join cera_client cc on cs.sales_id_client=cc.id_client where sales_id_status='4' order by sales_id desc");
               while($kat=mysqli_fetch_array($kueriKwitansi)){

      ?>

       
        <div class="modal fade" id="edit<?php echo $kat['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Kwitansi in Kwitansi No <?php echo $kat['sales_kwitansi_no'];?></h4>
              </div>

              <div class="modal-body">

                      <form class="form-horizontal" action="module/kwitansi/aksi_edit.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kwitansi No</label>
                      <div class="col-sm-10">
                        <input type="hidden" name="idSales" value="<?php echo $kat['sales_id'];?>">
                        <input type="text" class="form-control" id="kwitansiNo" name="kwitansiNo" placeholder="Nomor Kwitansi" value="<?php echo $kat['sales_kwitansi_no'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Sudah diterima dari</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaClient" name="nama_client" placeholder="Nama Client" value="<?php echo $kat['client_name'];?>">
                        <input type="hidden" name="id_client" value="<?php echo $kat['id_client'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Sejumlah</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="totalHarga" name="totalHarga" placeholder="Total Harga" value="<?php echo $kat['sales_jumlah_bayar'];?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Untuk Pembayaran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="gunaBayar" name="gunaBayar" placeholder="Untuk Pembayaran" value="<?php echo $kat['sales_guna_bayar'];?>">
                      </div>
                    </div>


                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
                </div>
              </div>
            </div>
          </div>
      <?php } ?> 

        <!-- End of Modal For Edit -->

        <!-- Modal For Detail -->
        <?php

                 $kueriKwitansi= mysqli_query($koneksi,"select * from cera_sales cs join cera_client cc on  cs.sales_id_client=cc.id_client order by sales_id desc");
               while($kat=mysqli_fetch_array($kueriKwitansi)){

              ?>

                
                <div class="modal fade" id="detail<?php echo $kat['sales_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail dari Kwitansi #<?php echo $kat['sales_kwitansi_no'];?></h4>
                      </div>
                      <div class="modal-body">

                        <table class="table table-striped">
                          <tr>
                            <th>No Kwitansi</th>
                            <td><?php echo $kat['sales_kwitansi_no']; ?></td>
                          </tr>
                          <tr>
                            <th>Nama Client</th>
                            <td><?php echo $kat['client_name'] ;?></td>
                          </tr>
                          <tr>
                            <th>Tanggal</th>
                            <td><?php echo $kat['sales_tgl_bayar'] ;?></td>
                          </tr>
                          <tr>
                            <th>Sejumlah</th>
                            <td><?php echo $kat['sales_jumlah_bayar'] ;?></td>
                          </tr>
                          <tr>
                            <th>Terbilang</th>
                            <td><?php echo ucwords(Terbilang($kat['sales_jumlah_bayar'])); ?> Rupiah</td>
                          </tr>
                          <tr>
                             <th>Guna Bayar</th>
                             <td><?php echo $kat['sales_guna_bayar'] ;?></td>
                          </tr>
                        </table>

                      </div>
                      <div class="modal-footer">
                       <a href="adminweb.php?module=print_detail_kwitansi&id_sales=<?php echo $kat['sales_id'];?>"><button class="btn btn-primary">Print</button></a>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>

        <!-- End Modal For Detail -->