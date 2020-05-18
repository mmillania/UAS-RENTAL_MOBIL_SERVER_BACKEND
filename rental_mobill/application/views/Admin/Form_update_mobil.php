<div class="main-content">
<section class="section">
          <div class="section-header">
            <h1>Form Update Mobil</h1>
          </div>  

          <div class="card">
              <div class="card-body">

              <?php foreach($mobil as $mbl) :?>
              

              <form method="POST" action="<?php echo base_url('Admin/Data_mobil/update_mobil_aksi')?>" enctype="multipart/form-data">
                  <div class="row">
                      <div class="col-md-6">

                      <div class="form-grou">
                          <label>Type Mobil</label>
                          <input type="hidden" name="id_mobil" value="<?php echo $mbl->id_mobil ?>">
                          <select name="kode_type" class="form-control">
                              <option value="<?php echo $mbl->kode_type ?>"><?php echo $mbl->kode_type ?></option>
                              <?php foreach($type as $tp) : ?>
                                <option value="<?php echo $tp->kode_type ?>">
                                <?php echo $tp->nama_type?></option>
                              <?php endforeach; ?>
                          </select>
                          <?php echo form_error('kode_type','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Merk Mobil</label>
                          <input type="text" name="merk" class="form-control" value="<?php echo $mbl->merk ?>"> 
                          <?php echo form_error('merk','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Harga Sewa Mobil</label>
                          <input type="number" name="harga" class="form-control" value="<?php echo $mbl->harga ?>"> 
                          <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Harga Denda Mobil</label>
                          <input type="number" name="denda" class="form-control" value="<?php echo $mbl->denda ?>"> 
                          <?php echo form_error('denda','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Nomor Kendaraan</label>
                          <input type="text" name="nopol" class="form-control" value="<?php echo $mbl->nopol ?>"> 
                          <?php echo form_error('nopol','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Warna Mobil</label>
                          <input type="text" name="warna" class="form-control" value="<?php echo $mbl->warna ?>"> 
                          <?php echo form_error('warna','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      

                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label>Tahun Mobil</label>
                          <input type="text" name="tahun" class="form-control" value="<?php echo $mbl->tahun ?>"> 
                          <?php echo form_error('tahun','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Status Mobil</label>
                          <select name="status" class="form-control">
                              
                              <option <?php if ($mbl->status == "1"){echo "selected = 'selected'";}echo $mbl->status;?> value="1">Tersedia</option>
                              <option <?php if ($mbl->status == "0"){echo "selected = 'selected'";}echo $mbl->status;?> value="0">Sedang Direntalkan</option>
                          </select>
                          <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Fasilitas AC</label>
                          <select name="ac" class="form-control">
                              
                              <option <?php if ($mbl->ac == "1"){echo "selected = 'selected'";}echo $mbl->ac;?> value="1">Tersedia</option>
                              <option <?php if ($mbl->ac == "0"){echo "selected = 'selected'";}echo $mbl->ac;?> value="0">Tidak Tersedia</option>
                          </select>
                          <?php echo form_error('ac','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Fasilitas Supir</label>
                          <select name="supir" class="form-control">
                              
                              <option <?php if ($mbl->supir == "1"){echo "selected = 'selected'";}echo $mbl->supir;?> value="1">Tersedia</option>
                              <option <?php if ($mbl->supir == "0"){echo "selected = 'selected'";}echo $mbl->supir;?> value="0">Tidak Tersedia</option>
                          </select>
                          <?php echo form_error('supir','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Fasilitas MP3 Player</label>
                          <select name="ac" class="form-control">
                              
                              <option <?php if ($mbl->mp3_player == "1"){echo "selected = 'selected'";}echo $mbl->mp3_player;?> value="1">Tersedia</option>
                              <option <?php if ($mbl->mp3_player == "0"){echo "selected = 'selected'";}echo $mbl->mp3_player;?> value="0">Tidak Tersedia</option>
                          </select>
                          <?php echo form_error('mp3_player','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Fasilitas Central Lock</label>
                          <select name="central_lock" class="form-control">
                              
                              <option <?php if ($mbl->central_lock == "1"){echo "selected = 'selected'";}echo $mbl->central_lock;?> value="1">Tersedia</option>
                              <option <?php if ($mbl->central_lock == "0"){echo "selected = 'selected'";}echo $mbl->central_lock;?> value="0">Tidak Tersedia</option>
                          </select>
                          <?php echo form_error('central_lock','<div class="text-small text-danger">','</div>') ?>
                      </div>

                      <div class="form-group">
                          <label>Gambar</label>
                          <input type="file" name="gambar" class="form-control"> 
                      </div>
                        
                        <button type="reset" class="btn btn-danger mt-4">Reset</button>
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                      </div>
                  </div>
                </form>
                <?php endforeach; ?>
              </div>
          </div>
</section>
</div>  