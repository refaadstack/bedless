@extends('admin.lapformat')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <h4>LAPORAN BARANG KELUAR</h4>
        <h5>BULAN : {{ $bulan }}</h5>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-sm table-bordered">
            <tr>
                <td width="50">No</td>
                <td>Tanggal</td>
                <td>Kode Pemesanan</td>
                <td>Nama Pelanggan</td>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Harga</td>
                <td>Jumlah</td>
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
                <td>{{ $rs->kode }}</td>
                <td>{{ $rs->namabarang }}</td>
                <td>@currency($rs->harga)</td>
                <td>{{ $rs->jumlah }}</td>
                <td>@currency($rs->harga * $rs->jumlah)</td>
                @php
                $total += $rs->total;
                @endphp
            </tr>
            @endforeach
            <tr>
                <th colspan="8">Total</th>
                <td>@currency($total)</td>
            </tr>
        </table>
    </div>
</div>

@endsection