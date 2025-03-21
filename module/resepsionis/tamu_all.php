
<div class="container px-4 p-3 text-white">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <br>
        <!-- <h3 class="box-title">Tamu Baru</h3>
        <br> -->
     <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahTamuBaru" data-whatever="@mdo">Tambah Tamu Baru</button>

<div class="modal fade bd-example-modal-lg" id="tambahTamuBaru" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="module/resepsionis/aksi_resepsionis.php" method="post">
      <div class="modal-body">
        <div class="row">       
          <div class="col-md-6">
         
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Lengkap :</label>
              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahBaru']['namaLengkap']; ?>" name="namaLengkap" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">NIP :</label>
              <input type="text" class="form-control" id="nip"  value="<?php echo @$_SESSION['formTambahBaru']['nip_tamu']; ?>" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nomor HP :</label>
              <input type="text" class="form-control" id="noHp" value="<?php echo @$_SESSION['formTambahBaru']['noHp']; ?>" name="noHp" placeholder="Nomor HP">
            </div> 
            
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Instansi :</label>
            <select class="form-control" id="namaInstansi" name="namaInstansi" required>
                  <option selected>Pilih Instansi</option>
                      <?php 
                            $instansi = "select * from data_instansi";
                            $kueriQuo= mysqli_query($koneksi, $instansi);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_instansi']?>"><?=$pro['nama_instansi']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>
     
       
          </div> <!-- end col-md6 -->

          <div class="col-md-6"> <!-- col-md6 -->
       

          <div class="form-group">
          <label for="recipient-name" class="col-form-label">Bidang :</label>
          <select class="form-control" id="bidang" name="bidang" required>
                <option selected>Pilih Bidang</option>
                    <?php 
                          $bidang = "select * from data_bidang";
                          $kueriBid= mysqli_query($koneksi, $bidang);
                          while($pro=mysqli_fetch_array($kueriBid)){
                        ?>
                      <option value="<?=$pro['id_bidang']?>"><?=$pro['nama_bidang']?></option> 
                    <?php
                      }
                    ?>
              </select>
              <div class="invalid-feedback">Example invalid custom select feedback</div>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Keperluan :</label>
            <input type="text" class="form-control" id="keperluan" value="<?php echo @$_SESSION['formTambahBaru']['keperluan']; ?>" name="keperluan" placeholder="Keperluan">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" value="<?php echo @$_SESSION['formTambahBaru']['keterangan']; ?>" name="keterangan" placeholder="Keterangan"></textarea>
          </div>

          </div> <!-- end col-md6 -->
        </div>  <!-- end row -->      
      </div> <!-- End Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveTamuBaru" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- end modal for tambah -->

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
            <td><?php echo $pro['nama_tamu']; ?></td>
            <td><?php echo $pro['nip_tamu']; ?></td>
            <td><?php echo $pro['nama_instansi']; ?></td>
            <td><?php echo $pro['nama_bidang']; ?></td>
            <td><?php echo $pro['keperluan']; ?></td>
            <td><?php echo $pro['keterangan']; ?></td>
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

