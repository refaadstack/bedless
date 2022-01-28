@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Tentang</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Tentang</h3>
				<hr class="soft"/>
				@php
				$cpr = \App\Models\Infoweb::find(3);
				@endphp

				{!! $cpr->deskripsi !!}
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection