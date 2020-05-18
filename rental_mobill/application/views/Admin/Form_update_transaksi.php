<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Transaksi</h1>
          </div> 
        </section>
        <?php foreach ($rental as $cs) : ?>
        <form method ="POST" action="<?php echo base_url('Admin/Data_transaksi/update_transaksi_aksi')?>">
            <div class="form-group">
                <label>ID mobil</label>
                <input type="hidden" name="id_rental" value="<?php echo $cs->id_rental ?>">
                <input type="text" name="id_mobil" class="form-control" value="<?php echo $cs->id_mobil ?>">
                <?php echo form_error('id_mobil','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $cs->nama ?>">
                <?php echo form_error('nama','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>No Identitas</label>
                <input type="text" name="noiden" class="form-control" value="<?php echo $cs->noiden ?>">
                <?php echo form_error('noiden','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>No Telpon</label>
                <input type="text" name="notelp" class="form-control" value="<?php echo $cs->notelp ?>">
                <?php echo form_error('notelp','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tgl_rental" class="form-control" value="<?php echo $cs->tgl_rental ?>">
                <?php echo form_error('tgl_rental','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
            <label>Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" class="form-control" value="<?php echo $cs->tgl_kembali ?>">
                <?php echo form_error('tgl_kembali','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>Tanggal Pengembalian</label>
                <input type="date" name="tanggal_pengembalian" class="form-control" value="<?php echo $cs->tanggal_pengembalian ?>">
                <?php echo form_error('z','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>Status Pengembalian</label>
                <select name="status_rental" class="form-control">              
                    <option <?php if ($cs->status_rental == "1"){echo "selected = 'selected'";}echo $cs->status_rental;?> value="1">Terlambat</option>
                    <option <?php if ($cs->status_rental == "0"){echo "selected = 'selected'";}echo $cs->status_rental;?> value="0">Tepat Waktu</option>
                </select>
                <?php echo form_error('status_rental','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Status Transaksi</label>
                <select name="status_pengembalian" class="form-control">              
                    <option <?php if ($cs->status_pengembalian == "1"){echo "selected = 'selected'";}echo $cs->status_pengembalian;?> value="1">Uang Muka</option>
                    <option <?php if ($cs->status_pengembalian == "0"){echo "selected = 'selected'";}echo $cs->status_pengembalian;?> value="0">Lunas</option>
                </select>
                <?php echo form_error('status_pengembalian','<div class="text-small text-danger">','</div>') ?>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <button type="reset" class="btn btn-sm btn-danger">Hapus</button>
        </form>
        <?php endforeach; ?>
</div>