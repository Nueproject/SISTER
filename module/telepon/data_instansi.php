<div class="container px-4 p-3 text-white">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        <br>
        
               <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataInstansi"><button type="button" class="btn btn-sm btn-primary">Tambah Instansi</button></a>
              </div>
                <!-- MODAL TAMBAH PEGAWAI -->
                <div class="modal fade bd-example-modal-md" id="tambahDataInstansi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Instansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="module/setup/aksi_setup.php" method="post">
                      <div class="modal-body">
                        <div class="row">       
                          <div class="col-md-12">
                         
                            <div class="form-group">
                              <label for="recipient-name" class="control-label">Nama Instansi :</label>
                              <input type="text" class="form-control" id="namalengkap" value="<?php echo @$_SESSION['formTambahInstansi']['namaLengkap']; ?>" name="namaLengkap" placeholder="Nama Lengkap">
                            </div>
                           
                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">PIC Pensiun</label>
                                  <select class="form-control" id="pensiun" name="pensiun">
                                    <option selected>Pilih Pegawai</option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from data_pegawai");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_pegawai']; ?>"> <?php echo $p['nama_pegawai']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Telp Pensiun</label>
                                  <select class="form-control" id="telpPensiun" name="telpPensiun">

                                  <option selected>Pilih Telepon</option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from telepon");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_telepon']; ?>"> <?php echo $p['lokasi']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">PIC Mutasi</label>
                                  <select class="form-control" id="mutasi" name="mutasi">
                                    <option selected>Pilih Pegawai</option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from data_pegawai");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_pegawai']; ?>"> <?php echo $p['nama_pegawai']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Telp Pensiun</label>
                                  <select class="form-control" id="telpMutasi" name="telpMutasi">
                                 <option selected>Pilih Telepon</option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from telepon");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_telepon']; ?>"> <?php echo $p['lokasi']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                           

                             
                       
                          </div> <!-- end col-md6 -->

                        </div>  <!-- end row -->      
                      </div> <!-- End Modal Body -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveTambahInstansi" class="btn btn-primary">SIMPAN</button>
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
                        <th class="text-center">PIC Pensiun</th>                        
                        <th class="text-center">Telp Pensiun</th>
                        <th class="text-center">PIC Mutasi</th>                        
                        <th class="text-center">Telp Mutasi</th>
                        <th class="text-right">Aksi</th>
                      </tr>
                      <?php        
                      $datapns= mysqli_query($koneksi,"select * from data_instansi");   

     
                        $no=0;                     
                      while($usr=mysqli_fetch_array($datapns)){  
                      $usr_id = $usr['id_instansi'];
                      $no+=1;


                      $idpensiun = $usr['pic_pensiun'];
                      $quepensiun = "select nama_pegawai as npensiun from data_pegawai where id_pegawai= '$idpensiun'";
                      $jeneng= mysqli_query($koneksi, $quepensiun) or die(mysqli_error($koneksi));
                      while ($rowbid = $jeneng->fetch_assoc()) {
                          $pensiun=$rowbid['npensiun'];
                      }

                      $idmutasi = $usr['pic_mutasi'];
                      $quemutasi = "select nama_pegawai as nmutasi from data_pegawai where id_pegawai= '$idmutasi'";
                      $jeneng2= mysqli_query($koneksi, $quemutasi) or die(mysqli_error($koneksi));
                      while ($rowbid2 = $jeneng2->fetch_assoc()) {
                          $mutasi=$rowbid2['nmutasi'];
                      }

                       $idtpensiun = $usr['telp_pensiun'];
                      $quetpensiun = "select nomor as tpensiun from telepon where id_telepon= '$idtpensiun'";
                      $telp1= mysqli_query($koneksi, $quetpensiun) or die(mysqli_error($koneksi));
                      while ($rowbidt1 = $telp1->fetch_assoc()) {
                          $tpensiun=$rowbidt1['tpensiun'];
                      }

                      $idtmutasi = $usr['telp_mutasi'];
                      $quetmutasi = "select nomor as tmutasi from telepon where id_telepon= '$idtmutasi'";
                      $telp2= mysqli_query($koneksi, $quetmutasi) or die(mysqli_error($koneksi));
                      while ($rowbidt2 = $telp2->fetch_assoc()) {
                          $tmutasi=$rowbidt2['tmutasi'];
                      }

                      ?>
                      
                      <tr>             
                        <td class="text-center"><?php echo $no; ?></td>
                        <td>
                          <?php echo $usr['nama_instansi']; ?>
                        </td>
                        <td>
                          <?php echo $pensiun; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $tpensiun; ?>
                        </td>
                        <td>
                          <?php echo $mutasi; ?>
                        </td>
                        <td class="text-center">
                       <?php echo $tmutasi; ?>
                        </td>
                        <td>
                            <!-- Example split danger button -->
                          <div class="btn-group">
                            <a class="btn btn-sm btn-danger" href="module/setup/aksi_hapus_instansi.php?id_instansi=<?php echo $usr['id_instansi'];?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $usr['nama_instansi'];?>?')">Delete</a> 
                            <a class="btn btn-sm btn-primary" href="javascript::void(0)" data-toggle="modal" data-target="#editinstansi<?php echo $usr['id_instansi'];?>" >Edit</a>
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
      $datapeg= mysqli_query($koneksi,"select * from data_instansi di join data_pegawai dp on di.pic_pensiun = dp.id_pegawai and di.pic_mutasi = dp.id_pegawai join telepon on di.telp_pensiun =  telepon.id_telepon and di.telp_pensiun = telepon.id_telepon"); 
     
      while($pro=mysqli_fetch_array($datapeg)){
        ?>
         
                            <!-- Modal for Edit Tamu Baru -->
                <div class="modal fade" id="editinstansi<?php echo $pro['id_instansi'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content modal-lg">
                      <form action="module/setup/aksi_setup.php" method="post">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Data #<?php echo $pro['nama_instansi'];?></h4>
                      </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">                    
                                <?php $tgl_skrg = date("dmY"); ?>
                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Nama Instansi</label>
                                  <input type="text" class="form-control" id="idTamuInstansi" value="<?php echo $pro['nama_instansi'];?>" name="nama" placeholder="Nama">
                                  <input type="hidden" value="<?php echo $pro['id_instansi'];?>" name="idPegawai" placeholder="Id Pegawai">
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="control-label">PIC Pensiun</label>
                                  <select class="form-control" id="pensiun" name="pensiun">
                                  <?php $default = $pro['nama_pegawai']; ?>
                                    <option value="<?php echo $pro['id_pegawai']; ?>"> <?php echo $pro['nama_pegawai']; ?></option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from data_pegawai order by nama_pegawai asc");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_pegawai']; ?>"> <?php echo $p['nama_pegawai']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                 <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Telp Pensiun</label>
                                  <select class="form-control" id="telpPensiun" name="telpPensiun">
                                  <?php $default = $pro['lokasi']; ?>
                                    <option value="<?php echo $pro['id_telepon']; ?>"> <?php echo $pro['lokasi']; ?></option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from telepon");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_telepon']; ?>"> <?php echo $p['lokasi']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                 <div class="form-group">
                                  <label for="inputEmail3" class="control-label">PIC Mutasi</label>
                                  <select class="form-control" id="mutasi" name="mutasi">
                                  <?php $default = $pro['nama_pegawai']; ?>
                                    <option value="<?php echo $pro['id_pegawai']; ?>"> <?php echo $pro['nama_pegawai']; ?></option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from data_pegawai");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_pegawai']; ?>"> <?php echo $p['nama_pegawai']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>

                                 <div class="form-group">
                                  <label for="inputEmail3" class="control-label">Telp Pensiun</label>
                                  <select class="form-control" id="telpMutasi" name="telpMutasi">
                                  <?php $default = $pro['lokasi']; ?>
                                    <option value="<?php echo $pro['id_telepon']; ?>"> <?php echo $pro['lokasi']; ?></option>
                                             <?php
                                              $products = mysqli_query($koneksi,"select * from telepon");
                                              while($p=mysqli_fetch_array($products)){                          
                                             ?>
                                                <option value="<?php echo $p['id_telepon']; ?>"> <?php echo $p['lokasi']; ?></option>
                                            <?php } ?>
                                  </select>
                                </div>
                           
                              </div>
                              
                            </div>
                          </div> <!--end modal body -->
                            <div class="modal-footer">
                            <button type="submit" name="editDataInstansi" class="btn btn-primary">Update</button>
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
