<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pemesanan;
use App\Models\Pemesanandetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfflineController extends Controller
{
    private $folder = 'admin.offline';

    public function index() {
        
        return view($this->folder.'.offline');
    }

    public function barang(Request $request) {
        $nama = $request->cari;
        $q =  "select barang.*,kategori.jenisukuran from barang inner join kategori on barang.kategori_id = kategori.id where barang.nama like '%".$nama."%'";
        $data = [
            'barang' => DB::select(DB::raw($q))
        ];
        return view($this->folder.'.modalbarangcari',$data);
    }

    public function getCariData(Request $request)
    {
        $kode = $request->kode;
        $q = "select * from barang where kode like '%".$kode."%'";
        // $barang = collect(DB::select(DB::raw($q)))->first(); //)->first(); //Barang::where('kode','LIKE',$kode)->first();

        $barang = Barang::where('kode','=',$kode)->first();


        $data = array(
            'pesan' => 'Tidak ditemukan',
            'sukses' => false,
            'list' => null,
        );

        if($barang->count()) {
             $data = array(
                'pesan' => 'Ditemukan',
                'sukses' => true,
                'list' => $barang,
            );
        }

        return $data;
    }

    public function loadJenisUkuranSelect(Request $request) {
        $idbarang = $request->idbarang;
        $barang = Barang::find($idbarang);

        if($barang->kategori->jenisukuran == 'Satu') {
            return view($this->folder.'.ukurantidak');
        } else if($barang->kategori->jenisukukran = 'Banyak') {
            return view($this->folder.'.ukuranada');
        }
    }


    public function savetransaksi(Request $request) 
    {
        $iduser = Auth::guard('admin')->user()->id;

        $kodebarang = $request->kodebarang;
        $jumlah = $request->jumlah;
        
        $ukuran = $request->ukuran;

        $barang = Barang::where('kode',$kodebarang)->first();
        
        \Cart::session($iduser)->add([
            'id' => $barang->id,
            'name' => $barang->nama,
            'price' => $barang->harga,
            'quantity' => $jumlah,
            'attributes' => [
                'ukuran' => $ukuran
            ],
        ]);

        $data = array('sukses' => true);
        return $data;
    }

    public function getTotal() 
    {
        $iduser = Auth::guard('admin')->user()->id;
        $cart = \Cart::session($iduser);
       
        $data = array(
            'total' => number_format($cart->getTotal(),0,',','.'),
            'totalbayar' => $cart->getTotal()
        );
        return $data;
    }

    public function delete($iddata) 
    {
        $iduser = Auth::guard('admin')->user()->id;
        \Cart::session($iduser)->remove($iddata);
        return redirect()->route('offline.index');
    }

    public function alltransaksi()
    {
        return view($this->folder.'.transaksitabel');
    }

    // proses transaksi
    public function prosestransaksi(Request $request)
    {
        $iduser = Auth::guard('admin')->user()->id;
        
        $total = \Cart::session($iduser)->getTotal();
        $bayar = $request->jumlahbayar;
        $kembalian = $request->sisa;
     
        $pemesanan = Pemesanan::create([
            'kodepemesanan' => time(),
            'pelanggan_id' => -99,
            'nama' => 'Offline',
            'alamatkirim' => '',
            'notelp' => '',
            'total' => $total,
            'status' => 'Sudah',
            'tanggalpemesanan' => date('Y-m-d H:i:s'),
            'expedisi_id' => 0,
            'noresi' => '',
            'bayar' => $bayar,
            'kembalian' => $kembalian
        ]);


        $list = \Cart::session($iduser)->getContent();
        foreach($list as $cart) {
            Pemesanandetail::create([
                'pemesanan_id' => $pemesanan->id,
                'barang_id' => $cart->id,
                'harga' => $cart->price,
                'jumlah' => $cart->quantity,
                'ukuran' => $cart->attributes->ukuran
            ]);

            Pemesanan::updateJumlah($cart->id,$cart->quantity,$cart->attributes->ukuran);

            \Cart::session($iduser)->remove($cart->id);
        }

        $route = route('offline.cetak.transaksi',['idpemesanan' => $pemesanan->id]); 
        $data = [
            'url' => $route
        ];
        return $data; 
    }

    public function cetaktransaksi(Request $request) {

        $idpemesanan = $request->idpemesanan;
        $pemesanan = Pemesanan::find($idpemesanan);
        $data = [
            'title' => 'Transaksi Penjualan : '.$pemesanan->kodepemesanan,
            'pemesanan' => Pemesanan::find($idpemesanan),
            'tabel' => Pemesanandetail::where('pemesanan_id',$idpemesanan)->get()
        ];
        
        return view($this->folder.'.cetak',$data);
    }
}
