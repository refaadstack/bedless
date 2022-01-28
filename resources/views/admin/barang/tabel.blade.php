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
                    <a href="{{ $linkform }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                <th>Jumlah</th>
                                <th width="130">Opsi</th>
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
                                <td>{{ $rs->jumlah }}</td>
                                <td>
                                    <a href="{{ route($linkedit,$rs->id) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a> |
									<a data-toggle="modal" data-target="#modalHapus" data-id="{{ $rs->id }}"
										   href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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

@include('admin.modalhapus')
<script>
	$(document).ready(function(){
		$('#modalHapus').on('show.bs.modal',function(e){
			var target = $(e.relatedTarget);
			var iddata = target.data('id');
			
			var url = '{{ route($linkdestroy, ":id") }}';
			url = url.replace(':id', iddata);
			$("#deleteForm").attr('action', url);
		})
	});

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>
@endsection