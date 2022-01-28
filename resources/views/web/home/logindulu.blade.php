@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Login Dahulu</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Login Dahulu</h3>
                <hr class="soft"/>
                @php
                $logdulu = \App\Models\Infoweb::find(4)
                @endphp
                <p class="alert alert-info">{{ strip_tags($logdulu->deskripsi) }}</p>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection