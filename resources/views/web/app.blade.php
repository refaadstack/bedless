<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="{{ url('webtemplate/assets/css/bootstrap.css') }}" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="{{ url('webtemplate/style.css') }}" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="{{ url('webtemplate/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="topNav">
            <div class="container">
                <div class="alignR">
                    {{-- <div class="pull-left socialNw">
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-youtube"></span></a>
                        <a href="#"><span class="icon-tumblr"></span></a>
                    </div> --}}
                    <a href="{{ route('web.home') }}"> <span class="icon-home"></span> Home</a> 
                    
                    @if (Auth::guard('pelanggan')->check())
                        <a href="{{ route('web.pelanggan.profil') }}"><span class="icon-user"></span> Akun Saya</a>
                        <a href="{{ route('web.pelanggan.orderhistory') }}"><span class="icon-history"></span> Order History</a> 
                        @php
                        $iduser = Auth::guard('pelanggan')->user()->id;
                        $cart =  \Cart::session($iduser);
                        
                        @endphp
                        <a href="{{ route('cart.barang.list') }}"><span class="icon-shopping-cart"></span> {{ $cart->getTotalQuantity() }} Item(s) - <span class="badge badge-warning"> @currency($cart->getTotal())</span></a>
                    @else 
                        <a href="{{ route('web.daftar') }}"><span class="icon-edit"></span> Daftar </a> 
                    @endif
                   
                </div>
            </div>
        </div>
    </div>

<!--
Lower Header Section 
-->
<div class="container">
    <div id="gototop">
       
    </div>
    <header id="header">
        @include('web.flash')
    </header>

    <div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class=""><a href="{{ route('web.home') }}">Home</a></li>
			  <li class=""><a href="{{ route('web.carapesan') }}">Cara Pesan</a></li>
			  <li class=""><a href="{{ route('web.tentang') }}">Tentang Kami</a></li>
			</ul>
			{{-- <form action="#" class="navbar-search pull-left">
			  <input type="text" placeholder="Search" class="search-query span2">
			</form> --}}
			<ul class="nav pull-right">
                @if (Auth::guard('pelanggan')->check())
                    <li><a href="{{ route('web.logout') }}">Logout</a></li>
                @else
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
                        <div class="dropdown-menu">
                    
                        <form class="form-horizontal loginFrm" method="POST" action="{{ route('web.login') }}">
                            @csrf
                            <div class="control-group">
                            <input type="text" name="username" class="span2" id="inputEmail" placeholder="Username">
                        </div>
                        <div class="control-group">
                            <input type="password" name="password" class="span2" id="inputPassword" placeholder="Password">
                        </div>
                        <div class="control-group">
                            <label class="checkbox">
                            <input type="checkbox"> Remember me
                            </label>
                            <button type="submit" class="shopBtn btn-block">Sign in</button>
                        </div>
                        </form>
                        
                        </div>
                    </li>
                @endif
			</ul>
		  </div>
		</div>
	  </div>
	</div>

	<div class="row">
		<div id="sidebar" class="span3">
            <div class="well well-small">
                <img src="{{ url('logo/logo.png') }}" alt="{{ env('APP_NAME') }}">
                <h3>Kategori</h3>
                <ul class="nav nav-list">
                    @php
                    $kategori = \App\Models\Kategori::all();
                    @endphp
                    @foreach ($kategori as $kt)
                        <li><a href="{{ route('web.kategori',['idkategori'=> $kt->id]) }}"><span class="icon-chevron-right"></span>{{ $kt->nama }}</a></li>    
                    @endforeach
                </ul>
            </div>
            @include('web.sidebar')
	    </div>
        
        @yield('content')

    </div>

    
    <footer class="footer">
        <div class="row-fluid">
            <div class="span4">
                <h5>{{ env('APP_NAME') }}</h5>
                @php
                $tentang = \App\Models\Infoweb::find(1);
                @endphp
               {!! $tentang->deskripsi !!}
            </div>
            <div class="span2">
                <h5>Kategori</h5>

                @php
                $kategori = \App\Models\Kategori::all();
                @endphp
                @foreach ($kategori as $kt)
                    <a href="{{ route('web.kategori',['idkategori'=> $kt->id]) }}">{{ $kt->nama }}</a><br>
                @endforeach              
            </div>
            <div class="span2">
                <h5>Halaman Web</h5>
                <a href="{{ route('web.carapesan') }}">Cara Pesan</a> <br>
                <a href="{{ route('web.tentang') }}">Tentang Kami</a><br>
            </div>
            <div class="span4">
                <h5>Pembayaran Melalui</h5>
                <p>
                    <a href="#"><img src="{{ url('webtemplate/bank/bni.png') }}" alt="payment" width="51" height="32"></a>
                    <a href="#"><img src="{{ url('webtemplate/bank/bca.png') }}" alt="payment" width="51" height="32"></a>
                    <a href="#"><img src="{{ url('webtemplate/bank/bri.jpg') }}" alt="payment" width="71" height="32"></a>
                    <a href="#"><img src="{{ url('webtemplate/bank/mandiri.png') }}" alt="payment" width="91" height="52"></a>
                </p>
            </div>
        </div>
    </footer>
</div><!-- /container -->

    <div class="copyright">
        <div class="container">
            <p class="pull-right">
                {{-- <a href="#"><img src="assets/img/maestro.png" alt="payment"></a>
                <a href="#"><img src="assets/img/mc.png" alt="payment"></a>
                <a href="#"><img src="assets/img/pp.png" alt="payment"></a>
                <a href="#"><img src="assets/img/visa.png" alt="payment"></a>
                <a href="#"><img src="assets/img/disc.png" alt="payment"></a> --}}
            </p>
            <span>Copyright &copy; {{ date('Y') }}<br> <a href="{{ route('login.admin') }}" target="_blank">{{ env('APP_NAME') }}</a></span>
        </div>
    </div>

    <a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('webtemplate/assets/js/jquery.js') }}"></script>
	<script src="{{ url('webtemplate/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('webtemplate/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ url('webtemplate/assets/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
    <script src="{{ url('webtemplate/assets/js/shop.js') }}"></script>
  </body>
</html>
