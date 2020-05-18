<div class="container mt-5 mb-5">
    <div class="card" style="margin-top: 200px">
        <div class="card-body">
        <section class="section">
          <div class="section-header">
            <h1>Silahkan Isi Data Peminjaman</h1>
          </div> 
        </section>
        <form method ="POST" action="<?php echo base_url('Customer/Data_mobil/tambah_rental_aksi')?>">
            <div class="form-group">
                <input type="hidden" id="id_mobil" name="id_mobil" value="<?php echo $id_mobil ?>">
            </div>
            <div class="form-group">
                <label>Nama Customer</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>No Identitas</label>
                <input type="text" name="noiden" class="form-control">
                <?php echo form_error('noiden','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>No Telpon</label>
                <input type="text" name="notelp" class="form-control">
                <?php echo form_error('notelp','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tgl_rental" class="form-control">
                <?php echo form_error('tgl_rental','<span class="text-small text-danger">','</span>') ?>
            </div>
            <div class="form-group">
            <label>Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" class="form-control">
                <?php echo form_error('tgl_kembali','<span class="text-small text-danger">','</span>') ?>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            <button type="reset" class="btn btn-sm btn-danger">Hapus</button>
        </form>
        </div>
    </div>
</div>

