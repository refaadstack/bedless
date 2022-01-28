<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Beli;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private $folder = 'admin.laporan';
    
    public function barang(Request $request) {
        $view = $request->view;
        $barang = Barang::all();
        $data['tabel'] = $barang;
        $data['title'] = 'Barang';

        if($view == '') {
            $data['linkcetak'] = route('laporan.barang',['view'=>'cetak']);
            return view($this->folder.'.barang',$data);
        } else if($view == 'cetak') {
            return view($this->folder.'.barangcetak',$data);
        }
    }

    public function pelanggan(Request $request) {
        $view = $request->view;
        $pelanggan = Pelanggan::all();
        $data['tabel'] = $pelanggan;
        $data['title'] = 'Pelanggan';

        if($view == '') {
            $data['linkcetak'] = route('laporan.pelanggan',['view'=>'cetak']);
            return view($this->folder.'.pelanggan',$data);
        } else if($view == 'cetak') {
            return view($this->folder.'.pelanggancetak',$data);
        }
    }

    public function pemesananpertanggal(Request $request) {
        $data['title'] = 'Pemesanan Pertanggal';
        $data['linkcari'] = route('laporan.pemesanan.tanggal.data');
        return view($this->folder.'.pemesanan.tanggal',$data);
    }

    public function pemesananpertanggaldata(Request $request) {
        $view = $request->view;
        $tanggal = $request->tanggal;

        $data['title'] = 'data';
        if($view == 'show') {
            $data['pemesanan'] = Pemesanan::pemesanan($tanggal);
            $data['linkcetak'] = route('laporan.pemesanan.tanggal.data',['tanggal' => $tanggal,'view'=>'cetak']);
            return view($this->folder.'.pemesanan.tanggalview',$data);
        } else if ($view == 'cetak') {
            $data['pemesanan'] = Pemesanan::pemesanan($tanggal);
            $data['tanggal'] = $tanggal;
            return view($this->folder.'.pemesanan.tanggalcetak',$data);
        }
    }

    // revisi
    public function keluarperbulan(Request $request) {
        $data['title'] = 'Barang Keluar Perbulan';
        $data['linkcari'] = route('laporan.keluar.bulan.data');
        return view($this->folder.'.keluar.bulan',$data);
    }

    public function keluarperbulandata(Request $request) {
        $view = $request->view;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data['title'] = 'data';
        if($view == 'show') {
            $data['pemesanan'] = Pemesanan::pemesanankeluarbulan($bulan,$tahun);
            $data['linkcetak'] = route('laporan.keluar.bulan.data',['bulan' => $bulan,'tahun' => $tahun,'view'=>'cetak']);
            return view($this->folder.'.keluar.bulankeluarview',$data);
        } else if ($view == 'cetak') {
            $data['pemesanan'] = Pemesanan::pemesanankeluarbulan($bulan,$tahun);
            $data['bulan'] = $bulan.' - '.$tahun;
            return view($this->folder.'.keluar.bulankeluarcetak',$data);
        }
    }

    public function masukperbulan(Request $request) {
        $data['title'] = 'Barang Masuk Perbulan';
        $data['linkcari'] = route('laporan.masuk.bulan.data');
        return view($this->folder.'.masuk.bulan',$data);
    }

    public function masukperbulandata(Request $request) {
        $view = $request->view;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data['title'] = 'data';
        if($view == 'show') {
            $data['masuk'] = Beli::pembelian($bulan,$tahun);
            $data['linkcetak'] = route('laporan.masuk.bulan.data',['bulan' => $bulan,'tahun' => $tahun,'view'=>'cetak']);
            return view($this->folder.'.masuk.bulanmasukview',$data);
        } else if ($view == 'cetak') {
            $data['masuk'] = Beli::pembelian($bulan,$tahun);
            $data['bulan'] = $bulan.' - '.$tahun;
            return view($this->folder.'.masuk.bulanmasukcetak',$data);
        }
    }

    // 

    public function pendapatanperbulan(Request $request) {
        $data['title'] = 'Pendapatan Perbulan';
        $data['linkcari'] = route('laporan.pendapatan.bulan.data');
        return view($this->folder.'.pendapatan.bulan',$data);
    }

    public function pendapatanperbulandata(Request $request) {
        $view = $request->view;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data['title'] = 'data';
        if($view == 'show') {
            $data['pemesanan'] = Pemesanan::pemesanankeluarbulan($bulan,$tahun);
            $data['linkcetak'] = route('laporan.pendapatan.bulan.data',['bulan' => $bulan,'tahun' => $tahun,'view'=>'cetak']);
            return view($this->folder.'.pendapatan.bulanpendapatanview',$data);
        } else if ($view == 'cetak') {
            $data['pemesanan'] = Pemesanan::pemesanankeluarbulan($bulan,$tahun);
            $data['bulan'] = $bulan.' - '.$tahun;
            return view($this->folder.'.pendapatan.bulanpendapatancetak',$data);
        }
    }
}
