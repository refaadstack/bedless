<?php include ('title.php');?>
<?php include ('header.php');?>
<!-- 
Body Section 
-->
<?php include ('sidebar.php');?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="lihat_pesanan.php">Lihat Pesanan</a> <span class="divider">/</span></li>
    <li class="active">Detail Pesanan</li>
    </ul>
	<div class="well well-small">
	<div class="row-fluid">
			</div>
            <h3>Detail Pesanan</h3>
				<hr class="softn clr"/>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow">
                <td><b>No Invoice</b></td>
                <td width="65%">: INV00000001</td>
                </tr>
				<tr class="techSpecRow">
                <td><b>Status Pembayaran</b></td>
                <td width="65%">: LUNAS</td>
                </tr>
                <tr class="techSpecRow">
                <td><b>Status Penerimaan Barang</b></td>
                <td width="65%">: <select name="status">
                <option value="Belum di Terima">Belum di Terima</option>
                <option value="Sudah di Terima">Sudah di Terima</option> 
                </select></td>
                </tr>
                
				</tbody>
				</table>
                <a class="btn btn-primary"href="bayar.php?kode=<?php echo $row[0]; ?>"> SIMPAN </a>
                <hr>
</div>
</div>
</div> <!-- Body wrapper -->
<!-- 
Clients 
-->
<?php include ('footer.php');?>