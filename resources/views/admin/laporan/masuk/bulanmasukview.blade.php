<a href="{{ $linkcetak }}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm">
            <tr>
                <td width="50">No</td>
                <td>Tanggal</td>
                <td>Kode Beli</td>
                <td>Supplier</td>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Jumlah</td>
                <td>Total</td>
            </tr>
            @php
            $total = 0;
            @endphp
            @foreach ($masuk as $rs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rs->tanggal }}</td>
                <td>{{ $rs->kode }}</td>
                <td>{{ $rs->supplier }}</td>
                <td>{{ $rs->kodebarang }}</td>
                <td>{{ $rs->nama }}</td>
                <td>@currency($rs->hargabeli)</td>
                <td>@currency($rs->harga)</td>
                <td>{{ $rs->jumlah }}</td>
                <td>@currency($rs->hargabeli * $rs->jumlah)</td>
                @php
                $total += $rs->total;
                @endphp
            </tr>
            @endforeach
            <tr>
                <th colspan="9">Total</th>
                <td>@currency($total)</td>
            </tr>
        </table>
    </div>
</div>