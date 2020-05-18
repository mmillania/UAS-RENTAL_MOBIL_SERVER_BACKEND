<div class="container">
    <div class="card" style="margin-top: 150px; margin-bottom: 50px">
        <div class="card-header">
            Form Rental Mobil
        </div>
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
            <form action="<?php echo base_url('Customer/Rental/tambah_rental_aksi') ?>" method="POST">
                <div class="form-group">
                    <label for="">Harga Sewa Kendaraan</label>
                    <input type="hidden" name="id_mobil" value="<?php echo $dt->id_mobil ?>">
                    <input type="text" name="harga" class="form-control" value="Rp. <?php echo number_format ($dt->harga,0,',','.') ?> /Hari" readonly>
                </div>
                <div class="form-group">
                    <label for="">Harga Denda Kendaraan</label>
                    <input type="text" name="denda" class="form-control" value="Rp. <?php echo number_format ($dt->denda,0,',','.') ?> /Hari" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Rental</label>
                    <input type="date" name="tgl_rental" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">Rental</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>