<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Mobil</h1>
          </div>

          <div class="row mt-3">
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
              <a href="<?php echo base_url('Admin/Data_mobil/tambah_mobil')?>" class="btn btn-sm btn-primary mb-4">
            <i class="fas fa-plus fa-sm"></i>Tambah Data Mobil</a>
          </div>

            <?php echo $this->session->flashdata('pesan') ?> 
          <div class="table-responsive">
          <table class="table table-hover table-striped table-borderd">
            <thead>
                <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Type</th>
                <th>Merk</th>
                <th>Harga</th>
                <th>Nomor Kendaraan</th>
                <th>Status</th>
                <th>Aksi</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $no=1;
                foreach($mobil as $mbl) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                      <img width="160px" src="<?php echo base_url().'assets/upload/'.$mbl->gambar ?>">
                    </td>
                    <td><?php echo $mbl->kode_type ?></td>
                    <td><?php echo $mbl->merk ?></td>
                    <td>Rp. <?php echo number_format ($mbl->harga,0,',','.') ?>/Hari</td>
                    <td><?php echo $mbl->nopol ?></td>
                    <td><?php 
                    if($mbl->status == "0"){
                        echo "<span class='badge badge-danger'>Sedang Direntalkan </span>";
                    }else{
                        echo "<span class='badge badge-primary'>Tersedia </span>";
                    }
                    ?></td>
                    <td>
                        <a href="<?php echo base_url('Admin/Data_mobil/detail_mobil/').$mbl->id_mobil ?>" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="<?php echo base_url('Admin/Data_mobil/update_mobil/').$mbl->id_mobil ?>" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('Admin/Data_mobil/delete_mobil/').$mbl->id_mobil ?>" class="btn btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
          </div>
        </section>
</div>