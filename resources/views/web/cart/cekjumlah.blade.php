@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active"></li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Jumlah Stok</h3>
                <hr class="soft"/>
                <p class="alert alert-danger">Maaf, jumlah yang anda inputkan melebihi jumlah stok yang tesedia</p>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection