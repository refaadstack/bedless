@extends('web.app')

@section('content')
    
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="{{ route('web.home') }}">Home</a> <span class="divider">/</span></li>
        <li><a href="#">Barang</a> <span class="divider">/</span></li>
        <li class="active">Detail Produk</li>
    </ul>

	<div class="well well-small">
	    <div class="row-fluid">
			<div class="span5">
                <div id="myCarousel" class="carousel slide cntr">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="data:image/png;base64, {{ $barang->gambar1 }}" alt="">
                        </div>
                    </div>
                </div>
			</div>
			<div class="span7">
				<h3>{{ $barang->nama }}
                <br \>
                Kategori : {{ $barang->kategori->nama }}
                <br>
                [@currency($barang->harga)]</h3>
                <hr class="soft"/>
                
            @if (Auth::guard('pelanggan')->check())
                <form action="{{ route('cart.barang.add') }}" class="form-horizontal qtyFrm" id = "addcart" method="post">
                    @csrf
            @else 
                <form action="{{ route('cart.barang.logindulu') }}" class="form-horizontal qtyFrm" id = "addcart" method="get">
            @endif

                    <input type="hidden" name="idbarang" value="{{ $barang->id }}">

                    @if ($barang->kategori->jenisukuran == 'Banyak')
                        <h5>Stok Barang 
                            <br> S : {{ $barang->ukuran_s }}
                            <br> M : {{ $barang->ukuran_m }}
                            <br> L : {{ $barang->ukuran_l }}
                            <br> XL : {{ $barang->ukuran_xl }}
                        </h5>

                        <hr class="soft"/>
                                    
                        <div class="control-group">
                            <label class="control-label"><span>Ukuran</span></label>
                            <div class="controls">
                                <select name= "ukuran" id="ukuran" style = "width :150px" required >
                                    {{-- <option value=''>Pilih Ukuran...</option> --}}
                                    <option value="s" selected>S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                </select>
                            </div>
                        </div>
                    @else
                        <h5>Stok Barang : {{ $barang->jumlah }}</h5>
                        <input type="hidden" name="ukuran" value="-"/>
                    @endif
                    
                    <div class="control-group">
					    <label class="control-label"><span>Jumlah</span></label>
					    <div class="controls">
                            <input type="number" name="jumlah" min="1" max="{{ $barang->stok }}" value="1" style="width:136px;" placeholder="Qty" onkeypress="return hanyaAngka(event, false)"/>
					    </div>
                    </div>
				    <button type="submit" onClick = "document.getElementById('addcart').submit();" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
		</div>
        <hr class="softn clr"/>
        
        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Detail Produk</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Produk Serupa</a></li>
        </ul>
        <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			    <h4>Informasi Produk</h4>
                <table class="table table-striped">
                    <tbody>
                    <tr class="techSpecRow">
                        <td>Ukuran</td>
                        <td>:</td>
                        <td>{{ $barang->ukuran }}</td>
                    </tr>
                    <tr class="techSpecRow">
                        <td>Deskripsi Barang</td>
                        <td>:</td>
                        <td>{{ $barang->deskripsi }}</td>
                    </tr>
                    </tbody>
				</table>
            </div>
            <div class="tab-pane fade" id="profile">
                @foreach ($baranglainnya as $blain)
                <div class="row-fluid">	
                    <div class="span2">
                        <img src="data:image/png;base64, {{ $blain->gambar1 }}" alt="" width="200" height="200">
                    </div>
                    <div class="span6">
                        <h5>{{ $blain->nama }}</h5>
                        <p>{{ $blain->deskripsi }}</p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3>@currency($blain->harga)</h3>
                            <div class="btn-group">
                                <a href="" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="{{ route('web.detail.barang',['idbarang' => $blain->id]) }}" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft"/>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection