<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <style>
        body {
            padding-top:50px; 
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>{{ env('APP_NAME') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                @php
                $alamat = \App\Models\Infoweb::find(5);
                @endphp
                <h6>{!! $alamat->deskripsi !!}</h6>
            </div>
        </div>

        <hr>

        @yield('content')
        
        <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
                <p>Jambi, {{ date('d-M-Y') }} <br>Mengetahui</p>

                <br>
                <br>
                <p>Nama Pemilik</p>
            </div>
        </div>
    </div>
</body>
</html>

