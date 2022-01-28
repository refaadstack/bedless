<div class="row">
    <div class="col">
        <table>
            <tr>
                <td width="150">No Faktur</td>
                <td width="10">:</td>
                <td><?php echo $header->kodekeluar ?></td>
            </tr>
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><?php echo $header->kodekonsumen ?></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?php echo tanggaljam($header->tanggal) ?></td>
            </tr>
          
        </table>
    </div>
    <div class="col">
        <table>
            <tr>
                <td width="150">Konsumen</td>
                <td width="10">:</td>
                <td><?php echo $header->nama ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $header->alamat ?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><?php echo $header->notelp ?></td>
            </tr>
        </table>
    </div>
</div>
<br>
<div class="row">
    
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $totalitem = 0;
            $grandtotal = 0;
            foreach($tabel->result() as $rsdet) { 
                $totalitem += $rsdet->jumlahbrg;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rsdet->kode ?></td>
                <td><?php echo $rsdet->nama ?></td>
                <td align="right"><?php echo $rsdet->jumlahbrg ?></td>
                <td><?php echo $rsdet->satuan ?></td>
                <td align="right"><?php echo ribuan($rsdet->hargajual) ?></td>      
                <?php 
                $subtotal = $rsdet->jumlahbrg * $rsdet->hargajual;
                $grandtotal += $subtotal;
                ?>
                <td align="right"><?php echo ribuan($subtotal) ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            
            <tr>
                <th colspan="3" class="text-right">Total</th>
                <th class="text-right"><?php echo $totalitem ?></th>
                <th></th><th></th>
                <th class="text-right"><?php echo ribuan($grandtotal) ?></th>
            </tr>
          
        </tfoot>
    </table>
</div>
