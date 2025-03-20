<!-- Modal for Edit Tamu Baru -->


<div class="modal fade" id="edit<?php echo $pro['id_tamu_instansi'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-lg">
      <form action="module/resepsionis/aksi_resepsionis.php" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Edit Data Tamu #<?php echo $pro['kode_tamu'];?></h4>
      </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">                    
                <?php $tgl_skrg = date("dmY"); ?>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Nama</label>
                  <input type="text" class="form-control" id="idTamuInstansi" value="<?php echo $kode_tamu ;?>" name="kodeTamu" placeholder="Kode Tamu">
                  <input type="hidden" value="<?php echo $pro['id_tamu_instansi'];?>" name="idTamu" placeholder="Id Tamu">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">NIP</label>
                  <input type="text" class="form-control" id="nipUpdate" value="<?php echo $pro['nip'];?>" name="nipUpdate" placeholder="NIP Tamu">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Instansi</label>
                    <select class="form-control" id="instansi" name="instansiUpdate">
                            <?php

                              $products = mysqli_query($koneksi,"select * from data_instansi");
                              while($p=mysqli_fetch_array($products)){

                            ?>

                                <option value="<?php echo $p['nama_instansi']; ?>"> <?php echo $p['nama_instansi']; ?></option>

                            <?php 
                              } 
                            ?>
                    </select>
<!--                  <input type="text" class="form-control" id="alamat" value="<?php echo $pro['instansi'];?>" name="instansi" placeholder="Nama Instansi">
                            -->               </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Bidang</label>
                  <input type="text" class="form-control" id="bidang" value="<?php echo $pro['bidang'];?>" name="bidang" placeholder="Bidang">
                </div>               
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Keperluan</label>
                  <input type="text" class="form-control" id="keperluan" value="<?php echo $pro['keperluan']?>" name="email" placeholder="Keperluan">
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" value="<?php echo $pro['keterangan']?>" name="keterangan" placeholder="Keterangan">
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="control-label">status</label>
                  <input type="text" class="form-control" id="status" value="<?php echo $pro['status']?>" name="status" placeholder="Status">
                </div>                
              </div>
              
            </div>
          </div> <!--end modal body -->
            <div class="modal-footer">
            <button type="submit" name="editInvoice" class="btn btn-primary">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!-- End for edit tamu baru -->
