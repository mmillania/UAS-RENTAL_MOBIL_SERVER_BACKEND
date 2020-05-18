<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Customer</h1>
          </div>    

            <a href="<?php echo base_url('Admin/Data_customer/tambah_customer')?>" class="btn btn-sm btn-primary mb-4">
            <i class="fas fa-plus fa-sm"></i>Tambah Data Customer</a>

            <?php echo $this->session->flashdata('pesan') ?> 
            
            <table class="table table-striped table-responsive table-bordered">
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th> 
                    <th>Gender</th>
                    <th>No Telpon</th>
                    <th>No KTP</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                $no = 1;
                foreach ($customer as $cs) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $cs->nama ?></td>
                        <td><?php echo $cs->username ?></td>
                        <td><?php echo $cs->alamat ?></td>
                        <td><?php echo $cs->gender ?></td>
                        <td><?php echo $cs->no_tlp ?></td>
                        <td><?php echo $cs->no_ktp ?></td>
                        <td><?php echo $cs->password ?></td>
                        <td>
                            <a href="<?php echo base_url('Admin/Data_customer/delete_customer/').$cs->id_customer ?>" class="btn btn-sm"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url('Admin/Data_customer/update_customer/').$cs->id_customer ?>" class="btn btn-sm"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
</div>