<div class="container">
    <div class="card mx-auto" style="margin-top: 180px; width: 80%">
        <div class="card-header">
            Data Transaksi Anda
        </div>
        <span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan')?></span>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Merk Mobil</th>
                    <th>No Plat Mobil</th>
                    <th>Tanggal Rental</th>
                    <th>Tanggal Kembali</th>
                    <th>Harga Sewa /Hari</th>
                    <th>Aksi</th>
                </tr>
                <?php $no=1;
                foreach($transaksi as $tr) : ?> 
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $tr->nama ?></td>
                    <td><?php echo $tr->merk ?></td>
                    <td><?php echo $tr->nopol ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
                    <td>Rp. <?php echo number_format($tr->harga,0,',','.'); ?></td>
                    <td>
                        <?php if($tr->status_rental == "Selesai") {?>
                            <button class="btn btn-sm btn-danger">Rental Selesai</button>
                        <?php }else{ ?>
                            <a href="<?php echo base_url('Customer/Transaksi/pembayaran/'.$tr->id_rental) ?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
                        <?php } ?>
                        
                    </td>
                    </tr>
                <?php endforeach; ?> 
            </table>
        </div>
    </div>
</div>