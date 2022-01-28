@extends('admin.lapformat')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <h4>LAPORAN DATA BARANG</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="example1x" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Ukuran S</th>
                    <th>Ukuran M</th>
                    <th>Ukuran L</th>
                    <th>Ukuran XL</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($tabel as $rs)
                <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $rs->kode }}</td>
                    <td>{{ $rs->nama }}</td>
                    <td>{{ $rs->kategori->nama }}</td>
                    <td>@currency($rs->harga)</td>
                    <td>{{ $rs->ukuran_s }}</td>
                    <td>{{ $rs->ukuran_m }}</td>
                    <td>{{ $rs->ukuran_l }}</td>
                    <td>{{ $rs->ukuran_xl }}</td>
                </tr>
            @endforeach  
            </tbody>
        </table>
    </div>
</div>
@endsection