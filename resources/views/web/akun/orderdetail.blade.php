@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
       
        <li class="active">Order Detail</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			
			<div class="span12">
				<h3>Detail Pemesanan</h3>
				<hr class="soft"/>
				<table class="table">
                    <tr>
                        <td>Barang</td>
                        <td>Harga</td>
                        <td width="20">Jumlah</td>
                        <td width="100">Total</td>
                    </tr>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($pemesanandetail as $item)
                    <tr>
                        <td>
                            <a href="{{ route('web.detail.barang',['idbarang' => $item->id]) }}">
                                {{ $item->nama }}
                            </a>
                        </td>
                        
                        <td>@currency($item->harga)</td>
                        <td>
                            {{ $item->jumlah }}
                        </td>
                        <td>@currency($item->harga * $item->jumlah)</td>
                        
                    </tr>
                    @php
                    $total += $item->harga * $item->jumlah;
                    @endphp
                @endforeach
                </table>
			</div>
		</div>
        <hr class="softn clr"/>
    
        <div class="row-fluid">
            <form action="{{ route('web.pelanggan.proses.konfirmasi') }}" class="form-horizontal" method="post" name="form1" id="form1" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <th>Konfirmasi</th>
                        <th>Total Biaya Keseluruhan</th>
                    </thead>
                    
                    <tbody>
                        <td>
                            @if ($pemesanan->konfirmasi->stskonfirmasi == 'S')
                                @php
                                $konf = $pemesanan->konfirmasi;
                                @endphp
                                <table class="table">
                                    <tr>
                                        <td>Jumlah Bayar</td>
                                        <td>:</td>
                                        <td>@currency($konf->jumlahbayar)</td>
                                    </tr>
                                    <tr>
                                        <td>Melalui</td>
                                        <td>:</td>
                                        <td>{{ $konf->melalui }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Rekening Tujuan</td>
                                        <td>:</td>
                                        <td>{{ $konf->norekening }}</td>
                                    </tr>
                                </table>
                                <img src="data:image/png;base64, {{ $konf->fotobukti }}" alt="" width="200" height="200">
                            @else
                            
                            <input type="hidden" name="idpemesanan" value="{{ $pemesanan->id }}">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Jumlah Bayar :</label>
                                <div class="controls">
                                <input type="number" placeholder="" name="jumlahbayar" value="{{ $total }}" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">No Rekening :</label>
                                <div class="controls">
                                {{-- <input type="text" placeholder="" name="norekening" value="" required> --}}
                                <select name="norekening" id="" required>
                                    <option value="BCA:8525258358">BCA-8525258358</option>
                                    <option value="BNI:8525258358">BNI-8525258358</option>
                                    <option value="BRI:8525258358">BRI-8525258358</option>
                                    <option value="MANDIRI:8525258358">MANDIRI-8525258358</option>
                                </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Melalui :</label>
                                <div class="controls">
                                <input type="text" placeholder="" name="melalui" value="" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Bukti Transfer :</label>
                                <div class="controls">
                                    <input type="file" name="uploadgambar" required>
                                </div>
                            </div>
                            @endif
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
                                        <tr class="subtotal">
                                            <th>Pengiriman :</th>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total Keseluruhan :</th>
                                            <td>Rp </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tbody>
                </table> 
                @if ($pemesanan->konfirmasi->stskonfirmasi == 'B')
	            <button type="submit" class="shopBtn btn-large xpull-right">Konfirmasi <span class="icon-arrow-right"></span></button>
                @endif
            </form>
        </div>
    </div>

</div>
@endsection