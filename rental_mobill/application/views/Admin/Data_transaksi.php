<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Transaksi</h1>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Cari..." name="keyword">
                      <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                  </div>
                </form>
            </div>
            <!-- <a href="<?php echo base_url('Admin/Data_transaksi/tambah_transaksi')?>" class="btn btn-sm btn-primary mb-4">
            <i class="fas fa-plus fa-sm"></i>Tambah Data Rental</a> -->
        </div>

        <?php echo $this->session->flashdata('pesan') ?> 
        <div class="table-responsive">
        <table class="table table-hover table-striped table-borderd">
            <thead>
                <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Merk Mobil</th>
                <th>Tanggal Rental</th>
                <th>Tanggal Kembali</th>
                <th>Harga Sewa </th>
                <th>Harga Denda </th>
                <th>Total Denda</th>
                <th>Tanggal dikembalikan</th>
                <th>Status Pengembalian</th>
                <th>Status Rental</th>
                <th>Check Pembayaran</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no=1;
                foreach($transaksi as $tr) : ?> 
                <tr>
                    <td><?php echo $no++ ?></td>

                    <td><?php echo $tr->nama ?></td>

                    <td><?php echo $tr->merk ?></td>

                    <td><?php echo date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>

                    <td><?php echo date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>

                    <td>Rp. <?php echo number_format($tr->harga,0,',','.'); ?> /Hari</td>

                    <td>Rp. <?php echo number_format($tr->denda,0,',','.'); ?> /Hari</td>

                    <td>Rp. <?php echo number_format($tr->total_denda,0,',','.'); ?> /Hari</td>
                    
                    <td><?php if ($tr->tgl_pengembalian == "0000-00-00"){
                                    echo "-";
                              }else{
                                  echo date('d/m/Y', strtotime($tr->tgl_pengembalian));
                              } ?></td>
                    <td><?php 
                    if($tr->status == "0"){
                        echo " Belum Kembali ";
                    }else{
                        echo "Kembali";
                    }
                    ?></td>
                    <td><?php 
                    if($tr->status == "0"){
                        echo " Belum Selesai ";
                    }else{
                        echo "Selesai";
                    }
                    ?></td>
                    
                    <td>
                        <center>
                        <?php 
                        if(empty($tr->bukti_pembayaran)) { ?>
                         <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
                        <?php }else{ ?>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('Admin/Data_transaksi/pembayaran/'.$tr->id_rental) ?>"><i class="fas fa-check-circle"></i></a>
                        <?php } ?>
                        </center>
                    </td>

                    <td>
                        <?php 
                            if($tr->status == "1"){
                                echo "-";
                            }else{ ?>
                                <div class="row">
                                <a class="btn btn-sm btn-success mr-2"
                                href="<?php echo base_url('Admin/Data_transaksi/transaksi_selesai/'.$tr->id_rental) ?>">
                                <i class='fas fa-check'></i></a>
                                <a class="btn btn-sm btn-danger"
                                href="<?php echo base_url('Admin/Data_transaksi/transaksi_batal/'.$tr->id_rental) ?>">
                                <i class='fas fa-times'></i></a>
                                </div>
                            <?php } ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
          </div>
        </section>
</div>