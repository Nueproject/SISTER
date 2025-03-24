<div class="container px-4 p-3 text-white">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        <br>
              <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataPegawai"><button type="button" class="btn btn-sm btn-primary">Tambah Pegawai</button></a>
              </div>

<!-- MODAL TAMBAH PEGAWAI -->
<div class="modal fade bd-example-modal-md" id="tambahDataPegawai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="module/setup/aksi_setup.php" method="post">
      <div class="modal-body">
        <div class="row">       
          <div class="col-md-12">
         
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Lengkap :</label>
              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahPegawai']['namaLengkap']; ?>" name="namaLengkap" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">NIP :</label>
              <input type="text" class="form-control" id="nip"  value="<?php echo @$_SESSION['formTambahPegawai']['nip_pegawai']; ?>" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nomor HP :</label>
              <input type="text" class="form-control" id="noHp" value="<?php echo @$_SESSION['formTambahPegawai']['noHp']; ?>" name="noHp" placeholder="Nomor HP">
            </div> 
            
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bidang :</label>
            <select class="form-control" id="namaBidang" name="namaBidang" required>
                  <option selected>Pilih Bidang</option>
                      <?php 
                            $instansi = "select * from data_bidang";
                            $kueriQuo= mysqli_query($koneksi, $instansi);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_bidang']?>"><?=$pro['nama_bidang']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

              <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jabatan :</label>
            <select class="form-control" id="namaJabatan" name="namaJabatan" required>
                  <option selected>Pilih Jabatan</option>
                      <?php 
                            $jabatan = "select * from jenis_jabatan";
                            $kueriQuo= mysqli_query($koneksi, $jabatan);
                            while($pro=mysqli_fetch_array($kueriQuo)){
                          ?>
                        <option value="<?=$pro['id_jabatan']?>"><?=$pro['nama_jabatan']?></option> 
                      <?php
                        }
                      ?>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>
       
          </div> <!-- end col-md6 -->

        </div>  <!-- end row -->      
      </div> <!-- End Modal Body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="saveTambahPegawai" class="btn btn-primary">SIMPAN</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <!-- end modal for tambah -->






               <!-- BOX TOOLS CARI-->
        <div class="box-tools">
          <form role="search" method="POST" action="adminweb.php?module=cari_pegawai">
          <div class="input-group" style="width: 150px;">
            <input type="text" name="search" class="form-control input-sm pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" style="display: all;" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
          </form>
        </div>
        <!-- END BOX TOOLS -->
              <br>
            
               
                  <!-- DATA PNS -->
           <!--  FORM TABLE -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box box-solid">
              <div class="box-body no-padding">
                <table class="table table-hover table-striped" style="overflow-x: auto!important;">
                  <tbody>
                       <tr class="table-dark">
                        <th style="width: 10px" class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIP</th>                        
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Bidang</th>                        
                        <th class="text-center">Nomor HP</th>
                        <th class="text-right">Aksi</th>
                      </tr>
                      <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan order by nama_pegawai asc");   
     
                        $no=0;                     
                        while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_pegawai'];
                      $no+=1;
                      ?>
                      
                      <tr>             
                        <td class="text-center"><?php echo $no; ?></td>
                        <td>
                          <?php echo $usr['nama_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nip_pegawai']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_jabatan']; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $usr['nama_bidang']; ?>
                        </td>
                        <td class="text-center">
                         <a href="https://wa.me/<?php echo $usr['nomor_hp']; ?>"> <?php echo $usr['nomor_hp']; ?> </a>
                        </td>
                        <td>
                          <!-- Single button -->                
                
                  <!-- Example split danger button -->
                <div class="btn-group">
                  <a class="btn btn-sm btn-danger" href="module/setup/aksi_hapus_pegawai.php?id_pegawai=<?php echo $usr['id_pegawai'];?>" onClick="return confirm('Anda yakin ingin <?php echo $usr['nama_pegawai'];?>?')">Delete</a> 
                  <a class="btn btn-sm btn-primary" href="javascript::void(0)" data-toggle="modal" data-target="#editpegawai<?php echo $usr['id_pegawai'];?>" >Edit</a>
                </div>

                <!-- END OPTION -->
                        </td>
                      
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>              
            </div> <!-- end box solid -->
          </div>     
          <!-- END DATA PEGAWAI -->
         

          <?php
      $datapeg= mysqli_query($koneksi,"select * from data_pegawai dp join data_bidang db on dp.bidang = db.id_bidang join jenis_jabatan jj on dp.jabatan =  jj.id_jabatan"); 
     
      while($pro=mysqli_fetch_array($datapeg)){
        ?>

           <!-- Modal for Edit Tamu Baru -->
<div class="modal fade" id="editpegawai<?php echo $pro['id_pegawai'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <form action="module/setup/aksi_setup.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit Data #<?php echo $pro['nama_pegawai'];?></h4>
      </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">                    
                <?php $tgl_skrg = date("dmY"); ?>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="idTamuInstansi" value="<?php echo $pro['nama_pegawai'];?>" name="nama" placeholder="Nama">
                  <input type="hidden" value="<?php echo $pro['id_pegawai'];?>" name="idPegawai" placeholder="Id Pegawai">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">NIP</label>
                  <input type="text" class="form-control" id="namaClient" value="<?php echo $pro['nip_pegawai'];?>" name="nip" placeholder="NIP Pegawai">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Jabatan</label>
                  <select class="form-control" id="jabatan" name="jabatan">
                  <?php $default = $pro['nama_jabatan']; ?>
                    <option value="<?php echo $pro['id_jabatan']; ?>"> <?php echo $pro['nama_jabatan']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from jenis_jabatan");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_jabatan']; ?>"> <?php echo $p['nama_jabatan']; ?></option>
                            <?php } ?>
                  </select>

                </div>
                 
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Bidang</label>
                  <select class="form-control" id="bidang" name="bidangUpdate">
                  <?php $default = $pro['nama_bidang']; ?>
                    <option value="<?php echo $pro['id_bidang']; ?>"> <?php echo $pro['nama_bidang']; ?></option>
                             <?php
                              $products = mysqli_query($koneksi,"select * from data_bidang");
                              while($p=mysqli_fetch_array($products)){                          
                             ?>
                                <option value="<?php echo $p['id_bidang']; ?>"> <?php echo $p['nama_bidang']; ?></option>
                            <?php } ?>
                  </select>
                </div>               
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nomor HP</label>
                  <input type="text" class="form-control" id="keperluan" value="<?php echo $pro['nomor_hp']?>" name="NoHP" placeholder="Nomor HP">
                </div>                
              </div>
              
            </div>
          </div> <!--end modal body -->
            <div class="modal-footer">
            <button type="submit" name="editDataPegawai" class="btn btn-primary">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End for edit tamu baru -->

<?php }; ?>          

       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->
