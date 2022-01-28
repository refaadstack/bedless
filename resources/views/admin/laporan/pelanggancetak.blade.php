@extends('admin.lapformat')

@section('content')

<div class="row">
    <div class="col-md-12 text-center">
        <h4>LAPORAN DATA PELANGGAN</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="example1x" class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($tabel as $rs)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rs->nama }}</td>
                    <td>{{ $rs->nohp }}</td>
                    <td>{{ $rs->alamat }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection