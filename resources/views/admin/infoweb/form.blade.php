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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Nama :</label>
                                    {{ Form::text('nama',$data->nama,['class'=>'form-control ','placeholder' => 'Nama','autofocus','required']) }}
                                </div>                                
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Deskripsi :</label>
                                    {{ Form::textarea('deskripsi',$data->deskripsi,['id' => 'deskripsi','class'=>'form-control','rows'=>3]) }}
                                </div>

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
<script src="{{ url('tinymce/tinymce.min.js') }}"></script>

<script type="text/javascript">
    $(function() {
        tinyMCE.init ({
            selector: '#deskripsi',
            plugins: [
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
              ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        })
    });
</script>
@endsection