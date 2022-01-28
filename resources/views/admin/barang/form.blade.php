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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ $link }}" class="btn btn-info btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="panel-body">
                    {!! Form::model($data,['route' => [$route,$data->id],'method' => $method,'files' => true,'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Kategori :</label>
                                    {{ Form::select('kategori_id',$kategori
									,$data->kategori_id,
									['class'=>'form-control','autofocus','required'] 
									) }}
                                </div>
                                <div class="form-group">
                                    <label>Nama :</label>
                                    {{ Form::text('nama',$data->nama,['class'=>'form-control ','placeholder' => 'Nama','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Kode :</label>
                                    {{ Form::text('kode',$data->kode,['class'=>'form-control ','placeholder' => 'Kode','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Harga :</label>
                                    {{ Form::number('harga',$data->harga,['class'=>'form-control ','placeholder' => 'Harga','autofocus','required']) }}
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                {{-- <div class="form-group">
                                    <label>Stok :</label>
                                    {{ Form::number('stok',$data->stok,['class'=>'form-control ','placeholder' => 'Stok','autofocus','required']) }}
                                </div> --}}
                                <div class="form-group">
                                    <label>Berat :</label>
                                    {{ Form::number('berat',$data->berat,['class'=>'form-control ','placeholder' => 'Berat','autofocus','required']) }}
                                </div>
                                
                                <label for="">Ukuran :</label>
                                <div class="row">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">S</label>
                                            {{ Form::text('ukuran_s',$data->ukuran_s,['class'=>'form-control ','placeholder' => 'Ukuran S','autofocus','required']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">M</label>
                                            {{ Form::text('ukuran_m',$data->ukuran_m,['class'=>'form-control ','placeholder' => 'Ukuran M','autofocus','required']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">L</label>
                                            {{ Form::text('ukuran_l',$data->ukuran_l,['class'=>'form-control ','placeholder' => 'Ukuran L','autofocus','required']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">XL</label>
                                            {{ Form::text('ukuran_xl',$data->ukuran_xl,['class'=>'form-control ','placeholder' => 'Ukuran XL','autofocus','required']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah :</label>
                                    {{ Form::number('jumlah',$data->jumlah,['class'=>'form-control ','placeholder' => 'Jumlah','autofocus','required']) }}
                                    <span class="text-danger"><i>Inputkan data ini jika jenis barang tidak punya ukuran seperti s,m,l dan xl</i></span>
                                </div>                            
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Deskripsi :</label>
                                    {{ Form::textarea('deskripsi',$data->deskripsi,['id' => 'deskripsi','class'=>'form-control','rows'=>3]) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Gambar 1 :</label>
                                    {{ Form::file('uploadgambar1') }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Gambar 2 :</label>
                                    {{ Form::file('uploadgambar2') }}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                    <!-- /.row (nested) -->
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