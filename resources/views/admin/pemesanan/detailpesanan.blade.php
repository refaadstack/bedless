@extends('admin.layouts')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        
        <div class="col-lg-12">
            @include('admin.flash')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ $link }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table>
                        <tr>
                            <th width="130">Kode</th>
                            <td width="10">:</td>
                            <td>#{{ $pemesanan->kodepemesanan }}</td>
                        </tr>
                        <tr>
                            <th>Tgl Pesan</th>
                            <td>:</td>
                            <td>{{ $pemesanan->tanggalpemesanan }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ $pemesanan->status }}</td>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <td>:</td>
                            <td>{{ $pemesanan->noresi }}</td>
                        </tr>
                    </table>
                    
                    <hr>

                    <table width="100%" class="table table-striped table-borderedx table-hover">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Barang</th>
                                <td>Ukuran</td>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                        @foreach ($tabel as $rs)
                            <tr>
                                <td>{{ $loop->iteration }} </td>
                                <td>{{ $rs->barang->nama }}</td>
                                <td>{{ $rs->ukuran }}</td>
                                <td>{{ $rs->jumlah }}</td>
                                <td>@currency($rs->harga)</td>
                                <td>@currency($rs->jumlah * $rs->harga)</td>
                            </tr>
                            @php
                                $total += $rs->jumlah * $rs->harga;
                            @endphp
                        @endforeach  
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Sub Total</th>
                                <th>@currency($total)</th>
                            </tr>
                            <tr>
                                <th colspan="5">Ongkir</th>
                                <th>@currency($pemesanan->expedisi->biaya)</th>
                            </tr>
                            <tr>
                                <th colspan="5">Total</th>
                                <th>@currency($pemesanan->expedisi->biaya + $total)</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <hr>
                    
                    @if($pemesanan->pelanggan_id != '-99' )
                        @if ($pemesanan->konfirmasi->stskonfirmasi == 'S')
                            @php
                            $konfirmasi = $pemesanan->konfirmasi;
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <td width="200">Tgl Transfer</td>
                                            <td width="10">:</td>
                                            <td>{{ $konfirmasi->tgltransfer }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ke No Rekening</td>
                                            <td>:</td>
                                            <td>{{ $konfirmasi->norekening }}</td>
                                        </tr>
                                        <tr>
                                            <td>Melalui</td>
                                            <td>:</td>
                                            <td>{{ $konfirmasi->melalui }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Bayar</td>
                                            <td>:</td>
                                            <td>@currency($konfirmasi->jumlahbayar)</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <form method="post" action="{{ route('pemesanan.savenoresi') }}">
                                        @csrf
                                        <input type="hidden" name="idpemesanan" value="{{ $pemesanan->id }}">
                                        <div class="form-group">
                                            <label>Inputkan No Resi Pengiriman :</label>
                                            <input type="text" name="noresi" class="form-control" value="{{ $pemesanan->noresi }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>    
                                    </form>   
                                </div>
                            </div>
                            
                            <hr>
                            <h4>Bukti Transfer</h4>
                            <img src="data:image/png;base64, {{ $konfirmasi->fotobukti }}" height="200" width="300">
                        @else
                            <p class="alert alert-info">Pemesanan ini belum dikonfirmasi oleh pelanggan.</p>
                        @endif
                    @endif
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

@endsection