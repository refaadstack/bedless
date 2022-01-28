<a href="{{ $linkcetak }}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm">
            <tr>
                <td width="50">No</td>
                <td>Tanggal</td>
                <td>Kode Pemesanan</td>
                <td>Nama Pelanggan</td>
                {{-- <td>Kode Barang</td> --}}
                <td>Nama Barang</td>
                <td>Jumlah</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Keuntungan</td>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach ($pemesanan as $rs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rs->tanggalpemesanan }}</td>
                <td>{{ $rs->kodepemesanan }}</td>
                <td>{{ $rs->nama }}</td>
                {{-- <td>{{ $rs->kode }}</td> --}}
                <td>{{ $rs->namabarang }}</td>
                <td>{{ $rs->jumlah }}</td>
                <td>@currency($rs->hargabeli)</td>
                <td>@currency($rs->harga)</td>
                <td>@currency($rs->harga - $rs->hargabeli)</td>
                @php
                $total += $rs->harga - $rs->hargabeli;
                @endphp
            </tr>
            @endforeach
            <tr>
                <th colspan="8">Total Pendapatan</th>
                <td>@currency($total)</td>
            </tr>
        </table>
    </div>
</div>