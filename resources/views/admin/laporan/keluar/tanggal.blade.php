@extends('adm.layouts.admlte')

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header grad">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h3>{{ $title }}</h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<!-- Main content -->
	<section class="content">
		
		@include('adm.layouts.flash')

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-md-6">
								{{ $title }}
							</div>
							<div class="col-md-4 text-right">
								<input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="cari" class="btn btn-success btn-block"><i class="fa fa-search"></i> Cari</button>
                            </div>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body" id="loadData">

					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>

<script>
$(document).ready(function(){

    $(function(){
        var tanggal = $('#tanggal').val();
        showData(tanggal)
    });

    $('#cari').on('click',function(){
        var tanggal = $('#tanggal').val();
        console.log(tanggal);
        showData(tanggal);
    })

    function showData(vtanggal) {
        var url = '{{ $linkcari }}';
        $.get(url,{tanggal:vtanggal,view:'show'},function(data){
            $('#loadData').html(data);
        },'html');
        
    }
})
</script>

@endsection