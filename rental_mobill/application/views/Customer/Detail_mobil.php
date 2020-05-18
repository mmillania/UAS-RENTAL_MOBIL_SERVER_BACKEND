<div class="container mt-5 mb-5">
    <div class="card" style="margin-top: 200px">
        <div class="card-body">
            <?php foreach ($detail as $dt) : ?>
                <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/upload/'.$dt->gambar)?>" style = "width: 500px; height: 350px" alt="">
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Merk Mobil</th>
                            <td><?php echo $dt->merk ?></td>
                        </tr>
                        <tr>
                            <th>No Plat Mobil</th>
                            <td><?php echo $dt->nopol ?></td>
                        </tr>
                        <tr>
                            <th>Harga Mobil</th>
                            <td><?php echo $dt->harga ?></td>
                        </tr>
                        <tr>
                            <th>Status Mobil</th>
                            <td><?php if ($dt->status == '1') {
                                echo "Tersedia";
                            }else {
                                echo "Telah Direntalkan";
                            } ?>
                            </td>
                            <tr>
                                <td></td>
                                <td>
                                    <?php
                                        if($dt->status == "0"){
                                        echo "<span class= 'btn btn-danger' disable>Telah di Rental</span>";
                                        }else{
                                        echo anchor('Customer/Data_mobil/rental_mobil'.$dt->id_mobil, '<button class="btn btn-success">Rental</button>');
                                        }
                                    ?>
                                </td> 
                            </tr>
                        </tr>
                        
                    </table>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>