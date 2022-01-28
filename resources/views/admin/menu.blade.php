<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('dashboard.admin') }}">{{ env('APP_NAME') }}</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li><a href="#"><i class="fa fa-calendar fa-fw"></i> {{ date('d, M-Y') }}</a>
        </li>
        {{-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ubah Password</a>
        </li> --}}
        <li><a href="{{ route('logout.admin') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>

    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <img src="{{ url('logo/logo.png') }}" width="250" height="180">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('dashboard.admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('pemesanan.semua') }}"><i class="fa fa-shopping-cart fa-fw"></i> Pemesanan</a>
                </li>
                
                <li>
                    <a href="{{ route('pelanggan.index') }}"><i class="fa fa-users fa-fw"></i> Pelanggan</a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}"><i class="fa fa-table fa-fw"></i> Kategori</a>
                </li>
                <li>
                    <a href="{{ route('barang.index') }}"><i class="fa fa-table fa-fw"></i> Barang</a>
                </li>
                <li>
                    <a href="{{ route('belioff.index') }}"><i class="fa fa-table fa-fw"></i> Barang masuk</a>
                </li>
                
                <li>
                    <a href="{{ route('expedisi.index') }}"><i class="fa fa-truck fa-fw"></i> Expedisi</a>
                </li>
                <li>
                    <a href="{{ route('infoweb.index') }}"><i class="fa fa-info fa-fw"></i> Info Web</a>
                </li>
                
                <li>
                    <a href="{{ route('admin.index') }}"><i class="fa fa-user fa-fw"></i> Admin</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-print fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('laporan.barang') }}">Barang</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.pelanggan') }}">Pelanggan</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('laporan.keluar.bulan') }}">Barang Keluar</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.masuk.bulan') }}">Barang Masuk</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('laporan.pendapatan.bulan') }}">Pendapatan</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('laporan.barang') }}">Barang Masuk</a>
                        </li> --}}
                       
                       
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>