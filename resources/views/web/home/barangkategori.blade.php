@extends('web.app')

@section('content')
<div class="span9">
    <div class="well well-small">
        <h3>{{ $kategori->nama }}</h3>
        <div class="row-fluid">
            @php
            $head = 0;
            @endphp
            @foreach ($barang as $brg)

                @if ($head == 0)
                    <ul class="thumbnails">
                @endif
                <li class="span4">
                    <div class="thumbnail">
                        <a href="{{ route('web.detail.barang',['idbarang' => $brg->id]) }}" class="overlay"></a>
                        <a class="zoomTool" href="{{ route('web.detail.barang',['idbarang' => $brg->id]) }}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <a href="{{ route('web.detail.barang',['idbarang' => $brg->id]) }}"><img src="data:image/png;base64, {{ $brg->gambar1 }}"></a>
                        <div class="caption cntr">
                            <p>{{ $brg->nama }}</p>
                            <p><strong>@currency($brg->harga)</strong></p>
                            {{-- <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4> --}}
                            <br class="clr">
                        </div>
                    </div>
                </li>
                @php
                $head = $loop->iteration % 3 == 0 ? 0 : 1;
                @endphp
                
                @if ($loop->iteration % 3 == 0)
                    </ul>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection