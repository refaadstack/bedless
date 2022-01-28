@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">List Cart</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>List Cart</h3>
				<hr class="soft"/>
				<table class="table">
                    <tr>
                        <td width="10">Hapus</td>
                        <td>Barang</td>
                        <td>Ukuran</td>
                        <td>Harga</td>
                        <td width="20">Jumlah</td>
                        <td width="100">Total</td>
                    </tr>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <a href="{{ route('cart.barang.hapus',['idbarang' => $item->id]) }}"><i class="icon-trash"></i></a>
                        </td>
                        <td>
                            <a href="{{ route('web.detail.barang',['idbarang' => $item->id]) }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>{{ $item->attributes['ukuran'] }}</td>
                        <td>@currency($item->price)</td>
                        <td>
                            {{ $item->quantity }}
                            {{-- <input type="number" value="{{ $item->quantity }}"> --}}
                        </td>
                        <td>@currency($item->price * $item->quantity)</td>
                        
                    </tr>
                    @php
                    $total += $item->price * $item->quantity;
                    @endphp
                @endforeach
                </table>
			</div>
		</div>
        <hr class="softn clr"/>
    
        <div class="row-fluid">
            <form action="{{ route('cart.barang.proses.order') }}" class="form-horizontal" method="post" name="form1" id="form1" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <th>Data Pengiriman</th>
                        <th>Total Biaya Keseluruhan</th>
                    </thead>
                    
                    <tbody>
                        <td>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Nama Penerima :</label>
                                <div class="controls">
                                <input type="text" placeholder="Nama Penerima" name="nama" value="{{ $pelanggan->nama }}" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Alamat Penerima :</label>
                                <div class="controls">
                                <input type="text" placeholder="Alamat Penerima" name="alamatkirim" value="{{ $pelanggan->alamat }}" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">No HP :</label>
                                <div class="controls">
                                <input type="text" placeholder="No HP" name="notelp" value="{{ $pelanggan->nohp }}" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Jasa Pengiriman :</label>
                                <div class="controls">
                                    <select name="expedisi_id" id="expedisi_id" class="form-control" onchange="tampilkan()">
                                        <option value='0' selected>- Pilih Jasa Pengiriman -</option>
                                        @foreach ($expedisi as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaexpedisi.' - '}} @currency($item->biaya)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td width="50%">
                            <div class="cart-total-table">
                                <table class="table">
                                    <tbody>
                                        <tr class="subtotal">
                                            <th>Total Berat :</th>
                                            <td>{{ $totalberat }} Kg</td>
                                        </tr>
                                        <tr class="subtotal">
                                            <th>Subtotals :</th>
                                            <td>@currency($total)</td>
                                        </tr>
                                        {{-- <tr class="subtotal">
                                            <th>Pengiriman :</th>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total Keseluruhan :</th>
                                            <td>Rp </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tbody>
                </table> 
                <a href="{{ route('web.home') }}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Lanjutkan Belanja </a>
	            <button type="submit" class="shopBtn btn-large pull-right">Chekout <span class="icon-arrow-right"></span></button>
            </form>
        </div>
    </div>

</div>
@endsection