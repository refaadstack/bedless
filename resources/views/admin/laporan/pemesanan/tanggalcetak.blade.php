@extends('adm.layouts.lapformat')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <h4>LAPORAN DATA PEMESANAN</h4>
        <h5>TANGGAL : @tanggal($tanggal)</h5>
    </div>
</div>

@foreach ($pemesanan as $rs)
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <table>
                    <tr>
                        <th width="200">Kode Pemesanan</th>
                        <th width="10">:</th>
                        <th>{{ $rs->kodepemesanan }}</th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th>:</th>
                        <th>@tanggal($rs->tglpesan)</th>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>:</th>
                        <th>{{ $rs->nama }}</th>
                    </tr>
                </table>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-sm">
                    <tr>
                        <td width="50">No</td>
                        <td>Barang</td>
                        <td width="100">Jumlah</td>
                        <td width="200">Harga</td>
                        <td width="300">Sub Total</td>
                    </tr>
                    @php
                        $detpesan = \App\Models\Pemesanan::pemesanandetail($rs->id);
                        $total = 0;
                    @endphp
                    @foreach ($detpesan as $ds)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ds->nama }}</td>
                        <td>{{ $ds->jumlah }}</td>
                        <td>@currency($ds->harga)</td>
                        <td>@currency($ds->harga * $ds->jumlah)</td>
                        @php
                        $total += $ds->harga * $ds->jumlah;
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
    </div>
</div>
<hr>
@endforeach

@endsection