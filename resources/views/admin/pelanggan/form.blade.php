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
                                    <label>Nama :</label>
                                    {{ Form::text('nama',$data->nama,['class'=>'form-control ','placeholder' => 'Nama','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin :</label>
                                    {{ Form::select('jeniskelamin',['L' => 'Laki-Laki','P' => 'Perempuan'],$data->jeniskelamin,['class'=>'form-control ','placeholder' => 'Jenis Kelamin','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir :</label>
                                    {{ Form::text('tempatlahir',$data->tempatlahir,['class'=>'form-control ','placeholder' => 'Tempat Lahir','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir :</label>
                                    {{ Form::date('tanggallahir',$data->tanggallahir,['class'=>'form-control ','placeholder' => 'Tanggal Lahir','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Alamat :</label>
                                    {{ Form::text('alamat',$data->alamat,['class'=>'form-control ','placeholder' => 'Alamat','autofocus','required']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="form-group">
                                    <label>No Hp :</label>
                                    {{ Form::text('nohp',$data->nohp,['class'=>'form-control ','placeholder' => 'No HP','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Username :</label>
                                    {{ Form::text('username',$data->username,['class'=>'form-control ','placeholder' => 'Username','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    {{ Form::password('password',['class'=>'form-control ','placeholder' => 'Password']) }}
                                </div>
                                <div class="form-group">
                                    <label>Status :</label>
                                    {{ Form::select('status',['Aktif' => 'Aktif','Tidak' => 'Tidak Aktif'],$data->status,['class'=>'form-control ','placeholder' => 'Status...','required']) }}
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                               

                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
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