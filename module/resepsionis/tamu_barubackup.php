
<div class="container px-4 p-3 text-white">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <br>
        <!-- <h3 class="box-title">Tamu Baru</h3>
        <br> -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahTamuBaru" data-whatever="@mdo">Tambah Tamu Baru</button>



        <!-- BOX TOOLS -->
        <div class="box-tools">
          <form role="search" method="POST" action="adminweb.php?module=search">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" style="display: all;" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
        <!-- END BOX TOOLS -->

        <!--  FORM TABLE -->
        <div class="box-body no-padding">
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Instansi</th>
            <th>Bidang</th>
            <th>Keperluan</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>jam Kunjungan</th>
            <th style="width: 110px">Aksi</th>
          </tr>
      <?php
      $saiki = date('Y-m-d');
      $page = trim(@$_GET['page']) == ''? 1 : $_GET['page'];
      $offset = ($page*2);
      $dataTamuBaru = "select * from data_pelayanan dp join data_tamu dt on dp.id_tamu = dt.id_tamu join data_bidang db on dp.id_bidang = db.id_bidang join status s on dp.status = s.id_status join data_instansi di on dt.instansi = di.id_instansi join data_pegawai p on dp.id_pegawai = p.id_pegawai ";

      //$mynewpo = "select * from cera_sales JOIN cera_client ON cera_sales.sales_id_client=cera_client.id_client JOIN cera_sales_item ON cera_sales_item.si_sales_id = cera_sales.sales_id JOIN cera_product ON cera_product.id_product = cera_sales_item.si_product_id where sales_id_status='1' order by sales_quotation_no desc";

      $no=0;
      $kueriQuo= mysqli_query($koneksi, $dataTamuBaru);
      while($pro=mysqli_fetch_array($kueriQuo)){
      $no+=1;  
      ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $pro['nama']; ?></td>
            <td><?php echo $pro['nip']; ?></td>
            <td><?php echo $pro['nama_instansi']; ?></td>
            <td><?php echo $pro['nama_bidang']; ?></td>
            <td><?php echo $pro['Keperluan']; ?></td>
            <td><?php echo $pro['Keterangan']; ?></td>
            <td><?php echo $pro['nama_status']; ?></td>
            <td><?php echo $pro['jam_datang']; ?></td>
            <td>


                <!-- Single button -->                
                
                  <!-- Example split danger button -->
                <div class="btn-group">
            
                          
                  <a class="btn btn-danger" href="module/resepsionis/cetak_kartu.php?idtamu=<?php echo $pro['id_pelayanan'];?>" role="button">Cetak</a> <button type="button" class="btn btn-primary btn-sm">Action</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript::void(0)" data-toggle="modal" data-target="#modal<?php echo $pro['id_tamu_instansi'];?>">Detail</a></li>
                    <li><a class="dropdown-item" href="javascript::void(0)" data-toggle="modal" data-target="#duplicate<?php echo $pro['id_tamu_instansi'];?>" >Duplicate</a></li>
                    <li><a class="dropdown-item" href="javascript::void(0)" data-toggle="modal" data-target="#edit<?php echo $pro['id_tamu_instansi'];?>" >Edit</a></li>
                    <li><a class="dropdown-item" data-toggle="modal" data-target="#edit<?php echo $pro['id_tamu_instansi'];?>" data-whatever="@mdo">Set as DiLayani</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="module/resepsionis/aksi_hapus.php?id_tamu=<?php echo $pro['id_tamu_instansi'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">Delete</a></li>
                  </ul>
                </div>

                <!-- END OPTION -->
            </td>
          </tr>
    <?php } ?>
        </table>
      </div>
      <!--  END FORM TABLE -->



        <?php
      $kueriQuo= mysqli_query($koneksi, $dataTamuBaru);
      while($pro=mysqli_fetch_array($kueriQuo)){
        ?>

   


  <?php }; ?>


      </div>
    </div>
  </div>
</div>
</div> <!-- end container -->

