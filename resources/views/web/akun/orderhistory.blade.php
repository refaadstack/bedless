@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Order History</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Order History</h3>
				<hr class="soft"/>
				<table class="table">
                    <tr>
                        <td>No</td>
                        <td>Kode</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td>Lihat</td>
                    </tr>
                    @foreach ($pemesanan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kodepemesanan }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('web.pelanggan.orderhistory.detail',['idpemesanan'=>$item->id]) }}">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
			</div>
		</div>
        <hr class="softn clr"/>
        
    </div>
</div>
@endsection