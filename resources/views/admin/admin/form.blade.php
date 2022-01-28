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
                                    <label>No Hp :</label>
                                    {{ Form::text('nohp',$data->nohp,['class'=>'form-control ','placeholder' => 'No HP','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Email :</label>
                                    {{ Form::text('email',$data->email,['class'=>'form-control ','placeholder' => 'Email','autofocus','required']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username :</label>
                                    {{ Form::text('username',$data->username,['class'=>'form-control ','placeholder' => 'Username','autofocus','required']) }}
                                </div>
                                <div class="form-group">
                                    <label>Password :</label>
                                    {{ Form::password('password',['class'=>'form-control ','placeholder' => 'Password']) }}
                                </div>
                                <div class="form-group">
                                    <label>Level :</label>
                                    {{ Form::select('level',['Admin' => 'Admin','Super Admin' => 'Super Admin'],$data->level,['class'=>'form-control ','placeholder' => 'Pilih Level','required']) }}
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