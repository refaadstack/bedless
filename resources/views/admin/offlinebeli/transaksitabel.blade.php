<table class="table table-striped  table-bordered table-hover table-sm">
    <thead class="bg-success">
        <th width="10">Aksi</th>   
        <th width="20">No</th>
        <th width="150">Kode</th>
        <th>Nama</th>
        <th>Ukuran</th>
        <th width="130">Harga Beli</th>
        <th width="130">Harga Jual</th>
        <th width="130">Jumlah</th>
        <th width="180">Sub Total</th>
    </thead>
    <tbody>
      @php
      $iduser = Auth::guard('admin')->user()->id;
      $cart = \Cart::session($iduser)->getContent();
      @endphp

      @foreach ($cart as $item)
      @php
          $barang = \App\Models\Barang::find($item->id);
      @endphp
      <tr>
          <td>
              <a href="#" data-toggle="modal" data-target="#modalHapus" data-id="{{ $item->id }}"><i class="fa fa-trash fa-fw"></i></a>
          </td>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $barang->kode }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->attributes->ukuran }}</td>
          <td align="right">@currency($item->price)</td>
          <td align="right">@currency($item->attributes->hargajual)</td>
          <td align="right">{{ $item->quantity }}</td>
          <td align="right">@currency($item->price * $item->quantity)</td>
      </tr>
      @endforeach
    </tbody>
    
</table>

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="prosesHapus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelX">Hapus Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="hapusDataModal" href="">Ya</a>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<script>
$(document).ready(function(){ 
  $('#modalHapus').on('show.bs.modal',function(e){
    var target = $(e.relatedTarget);
    var data = target.data('id');

    var url = '{{ route("belioff.temp.transaksi.delete", ":id") }}';
		url = url.replace(':id', data);

    $('#hapusDataModal').attr('href',url);
  })
});
</script>    