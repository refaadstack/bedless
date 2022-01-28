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
                    <div class="row">
						<div class="col-md-5">
							{{ $title }}
						</div>
						<div class="col-md-3 text-right">
							<select name="bulan" id="bulan" class="form-control form-control-sm">
								<option value="">Pilih Bulan...</option>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-md-2 text-right">
							<select name="tahun" id="tahun" class="form-control form-control-sm">
								<option value="">Pilih Tahun...</option>
								<option value="2021">2021</option>
							</select>
						</div>
						<div class="col-md-2">
							<button type="button" id="cari" class="btn btn-sm btn-success btn-block"><i class="fa fa-search"></i> Cari</button>
						</div>
					</div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="card-body" id="loadData">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>




$(document).ready(function(){

    $(function(){
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        showData(bulan,tahun)
    });

    $('#cari').on('click',function(){
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        showData(bulan,tahun)
    })

    function showData(vbulan,vtahun) {
        var url = '{{ $linkcari }}';
        $.get(url,{bulan:vbulan,tahun:vtahun,view:'show'},function(data){
            $('#loadData').html(data);
        },'html');
        
    }
})
</script>

@endsection