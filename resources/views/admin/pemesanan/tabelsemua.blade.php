@extends('admin.layouts')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-9">
            <h1 class="page-header">{{ $title }}</h1>
        </div>
        <div class="col-md-3">
            <h1 class="page-header">
                <a href="{{ route('offline.index') }}" class="btn btn-primary btn-block"><i class="fa fa-cog fa-fw"></i> Pemesanan Offline</a>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
        <div class="col-lg-12">
            @include('admin.flash')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Semua Pemesanan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Kode Pemesanan</th>
                                <th>Tgl Pemesanan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th width="130">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tabel as $rs)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>{{ $rs->nama }}</td>
                                <td>{{ $rs->kodepemesanan }}</td>
                                <td>{{ $rs->tanggalpemesanan }}</td>
                                <td>@currency($rs->total)</td>
                                <td>{{ $rs->status }}</td>
                                <td>
                                    <a href="{{ route($linkview,['idpemesanan' => $rs->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail Pesanan</a>									
                                </td>
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