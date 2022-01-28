<table id="barangtbl" class="table table-striped table-bordered table-hover table-sm">
  <thead>
    <tr>
      <th width="80">No</th>
      <th>Kode</th>
      <th>Nama</th>
      {{-- <th>Satuan</th> --}}
      <th>Harga</th>
      <th>S</th>
      <th>M</th>
      <th>L</th>
      <th>XL</th>
      <th>Jumlah</th>
      <th width="100">Pilih</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($barang as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->kode }}</td>
      <td>{{ $item->nama }}</td>
      <td>@currency($item->harga)</td>
      @if($item->jenisukuran == 'Banyak')
        <td>{{ $item->ukuran_s }}</td>
        <td>{{ $item->ukuran_m }}</td>
        <td>{{ $item->ukuran_l }}</td>
        <td>{{ $item->ukuran_xl }}</td>
        <td></td>
      @elseif($item->jenisukuran == 'Satu')
        <td></td><td></td><td></td><td></td>
        <td>{{ $item->jumlah }}</td>
      @endif
      <td>
        <a href="#" data-kodebarang="{{ $item->kode }}" class="btn btn-primary btn-xs">Pilih</a>
      </td>
    </tr>
    @endforeach
  </tbody> 
</table>
