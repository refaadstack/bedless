@extends('admin.layouts')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
        <div class="col-lg-12">
            @include('admin.flash')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ $linkcetak }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tabel as $rs)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>{{ $rs->nama }}</td>
                                <td>{{ $rs->jeniskelamin }}</td>
                                <td>{{ $rs->tempatlahir.', '.$rs->tanggallahir }}</td>
                                <td>{{ $rs->nohp }}</td>
                            </tr>
                        @endforeach  
                        </tbody>
                    </table>
                  
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

@endsection