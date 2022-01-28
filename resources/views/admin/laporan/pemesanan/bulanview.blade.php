<a href="{{ $linkcetak }}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> Cetak</a>
<hr>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm">
            <tr>
                <td width="50">No</td>
                <td>Tanggal Pesan</td>
                <td>Kode Pemesanan</td>
                <td>Nama Pelanggan</td>
                <td>Total</td>
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
                <td>@currency($rs->total)</td>
                @php
                $total += $rs->total;
                @endphp
            </tr>
            @endforeach
            <tr>
                <th colspan="4">Total</th>
                <td>@currency($total)</td>
            </tr>
        </table>
    </div>
</div>