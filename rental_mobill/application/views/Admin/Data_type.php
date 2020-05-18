<div class="main-content">
        <div class="section">
          <div class="section-header">
            <h1>Data Type Mobil</h1>
          </div>    
        </div>

        <a href="<?php echo base_url('Admin/Data_type/tambah_type')?>" class="btn btn-sm btn-primary mb-4">
            <i class="fas fa-plus fa-sm"></i>Tambah Data  Type Mobil</a>

        <?php echo $this->session->flashdata('pesan') ?> 

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Kode Type</th>
                    <th>Nama Type</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no =1;
                foreach($type as $tp) :?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $tp->kode_type ?></td>
                        <td><?php echo $tp->nama_type ?></td>
                        <td>
                        <a href="<?php echo base_url('Admin/Data_type/update_type/').$tp->id_type ?>" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo base_url('Admin/Data_type/delete_type/').$tp->id_type ?>" class="btn btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                        
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</div>
