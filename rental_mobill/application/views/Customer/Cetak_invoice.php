<table style="width: 60%">
    <h2>Invoice Pembayaran Rental Mobil UWU</h2>
    <?php foreach ($transaksi as $tr) : ?>
    <tr>
        <td>Nama Customer</td>
        <td>:</td>
        <td><?php echo $tr->nama ?></td>
    </tr>
    <tr>
        <td>Merk Kendaraan</td>
        <td>:</td>
        <td><?php echo $tr->merk ?></td>
    </tr>
    <tr>
        <td>No Plat Kendaraan</td>
        <td>:</td>
        <td><?php echo $tr->nopol ?></td>
    </tr>
    <tr>
        <td>Tanggal Rental</td>
        <td>:</td>
        <td><?php echo date('d/m/Y', strtotime($tr->tgl_rental)); ?></td>
    </tr>
    <tr>
        <td>Tanggal Kembali</td>
        <td>:</td>
        <td><?php echo date('d/m/Y', strtotime($tr->tgl_kembali)); ?></td>
    </tr>
    <tr>
        <td>Harga Sewa</td>
        <td>:</td>
        <td>Rp. <?php echo number_format($tr->harga,0,',','.') ?> /Hari</td>
    </tr>
    <tr>
        <?php 
            $x= strtotime($tr->tgl_kembali);
            $y= strtotime($tr->tgl_rental);
            $jml = abs(($x - $y)/(60*60*24));
        ?>
        <td>Jumlah Hari Sewa</td>
        <td>:</td>
        <td><?php echo $jml ?> Hari</td>
    </tr>
    <tr>
        <td>Status Pembayaran</td>
        <td>:</td>
        <td>
            <?php if($tr->status_pembayaran == '0' ){
                echo "Belum Lunas";
            }else{
                echo"Lunas";
            } ?>
        </td>
    </tr>

    
    
    <tr style="font-weight: bold; color:red">
        <td>Total Pembayaran</td>
        <td>:</td>
        <td>Rp. <?php echo number_format($tr->harga * $jml,0,',','.') ?></td>
    </tr>
   

    <tr>
        <td>Rekening Pembayaran</td>
        <td>:</td>
        <td>
            <ul>
                <li>Bank Mandiri 123456876543</li>
                <li>Bank BCA 008989890</li>
                <li>Bank BNI 00623456</li>
            </ul>
        </td>
    </tr>

    <?php endforeach; ?>
</table>



<script type="text/javascript">
    window.print();

</script>