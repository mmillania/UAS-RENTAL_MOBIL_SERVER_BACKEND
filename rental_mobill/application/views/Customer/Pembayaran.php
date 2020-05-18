<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="margin-top: 100px">
                <div class="card-header alert alert-success">
                    Invoice Pembayaran Anda
                </div>
                <div class="card-body">
                    <table class="table">
                        <?php foreach ($transaksi as $tr) : ?>
                        <tr>
                            <th>Merk Kendaraan</th>
                            <td>:</td>
                            <td><?php echo $tr->merk ?></td>
                        </tr>
                        <tr>
                            <th>No Plat Kendaraan</th>
                            <td>:</td>
                            <td><?php echo $tr->nopol ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Rental</th>
                            <td>:</td>
                            <td><?php echo date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>:</td>
                            <td><?php echo date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
                        </tr>
                        <tr>
                            <th>Harga Sewa</th>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($tr->harga,0,',','.') ?> /Hari</td>
                        </tr>
                        <tr>
                            <?php 
                                $x= strtotime($tr->tgl_kembali);
                                $y= strtotime($tr->tgl_rental);
                                $jml = abs(($x - $y)/(60*60*24));
                            ?>
                            <th>Jumlah Hari Sewa</th>
                            <td>:</td>
                            <td><?php echo $jml ?> Hari</td>
                        </tr>
                        <tr class="text-success">
                            <th>Total Pembayaran</th>
                            <td>:</td>
                            <td><button class="btn btn-sm btn-danger">Rp. <?php echo number_format($tr->harga * $jml,0,',','.') ?></button></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                            <td><a href="<?php echo base_url('Customer/Transaksi/cetak_invoice/'.$tr->id_rental) ?>" class="btn btn-sm btn-primary">Print Invoice</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="margin-top: 100px">
                <div class="card-header alert alert-primary">
                    Informasi Pembayaran
                </div>
                <div class="card-body">
                    <p class="text-success mb-3">Silahkan Melakukan Pembayaran Melalui Nomor Rekening Di Bawah Ini:</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bank Mandiri 123456876543</li>
                        <li class="list-group-item">Bank BCA 008989890</li>
                        <li class="list-group-item">Bank BNI 00623456</li>
                    </ul>
                        
                    <?php 
                        //kalau bukti pembayarannya customer blm upload
                        if(empty($tr->bukti_pembayaran)) { ?>
                            <!-- Button trigger modal -->
                            <button style="width: 100%" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">
                            Upload Bukti Pembayaran
                            </button>
                       <?php }elseif($tr->status_pembayaran == '0'){ ?>
                       <button style="width: 100%" class="btn btn-sm btn-warning"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi Admin</button>
                       <?php }elseif($tr->status_pembayaran == '1') { ?>
                        <button style="width: 100%" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Pembayaran Selesai</button>
                       <?php } ?>

    

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal untuk upload bukti pembayaran -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Segera Upload Bukti Pembayaran Anda ! </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url('Customer/Transaksi/pembayaran_aksi') ?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form group">
                <label>Upload Bukti Pembayaran</label>
                <input type="hidden" name="id_rental" class="form-control" value="<?php echo $tr->id_rental ?>">
                <input type="file" name="bukti_pembayaran" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-sm btn-success">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>