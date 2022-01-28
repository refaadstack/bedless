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
                                    <label>Kode :</label>
                                    {{ Form::text('kode',$data->kode,['class'=>'form-control ','placeholder' => 'Kode','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Nama Expedisi :</label>
                                    {{ Form::text('namaexpedisi',$data->kode,['class'=>'form-control ','placeholder' => 'Nama Expedisi','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Biaya :</label>
                                    {{ Form::number('biaya',$data->biaya,['class'=>'form-control ','placeholder' => 'Biaya','autofocus','required']) }}
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