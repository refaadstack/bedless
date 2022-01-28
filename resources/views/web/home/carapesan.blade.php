@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Cara Pesan</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Cara Pesan</h3>
				<hr class="soft"/>
				@php
				$cpr = \App\Models\Infoweb::find(2);
				@endphp

				{!! $cpr->deskripsi !!}
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection