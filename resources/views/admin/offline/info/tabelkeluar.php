<?php if($tabel->num_rows()) { ?>
<table class="table table-striped table-hover table-sm table-bordered">
  <thead class="bg-success">
      <tr>
          <th>No</th>
          <th>No Faktur</th>
          <th>Tanggal Transaksi</th>
          <th>Konsumen</th>
          <th width="150">Aksi</th>
      </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach($tabel->result() as $rs) {
    ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $rs->kode ?></td>
      <td><?php echo tanggaljam($rs->tanggal) ?></td>
      <td><?php echo $rs->nama ?></td>
      <td>
        <a href="#" data-toggle="modal" data-target="#modalDetailBarangKeluar" data-id="<?php echo $rs->kode ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Rincian</a>

        <a href="<?php echo site_url('keluar/pertrx_print/'.$rs->kode) ?>" class="btn btn-xs btn-success" target="_blank"><i class="fa fa-print"></i> Cetak</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } else { ?>
<p class="alert alert-info">Tidak Ditemukan</p>
<?php } ?>