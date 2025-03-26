<div class="container-fluid px-4 p-3 text-white">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
        <br>
                <center>
               <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataInstansi"><button type="button" class="btn btn-lg btn-primary">LAPORAN SEMUA TAMU</button></a>
              </div>
              <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataInstansi"><button type="button" class="btn btn-lg btn-primary">LAPORAN PERBIDANG</button></a>
              </div>
              <div class="btn-group">
               <a data-toggle="modal" data-target="#tambahDataInstansi"><button type="button" class="btn btn-lg btn-primary">LAPORAN JUMLAH TAMU</button></a>
              </div>
              </center>

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



       </div>
      </div>
    </div>
  </div>
</div> <!-- end container -->
