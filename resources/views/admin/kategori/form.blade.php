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
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::model($data,['route' => [$route,$data->id],'method' => $method,'files' => true,'autocomplete' => 'off']) !!}
                                <div class="form-group">
                                    <label>Nama Kategori :</label>
                                    {{ Form::text('nama',$data->nama,['class'=>'form-control ','placeholder' => 'Nama Kategori','autofocus','required']) }}
                                   
                                </div>
                                <div class="form-group">
                                    <label>Jenis Ukuran :</label>
                                    {{ Form::select('jenisukuran',[
                                            'Banyak' => 'Banyak Ukuran',
                                            'Satu' => 'Satu Ukuran'
                                        ], $data->jenisukuran,['class'=>'form-control ','placeholder' => 'Pilih Jenis Ukuran...','autofocus','required']) }}
                                   
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                               
                            </form>
                        </div>
                      
                    </div>
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