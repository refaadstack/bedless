<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Beli;
use App\Models\Belidetail;
use App\Models\Pemesanan;
use App\Models\Pemesanandetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OfflinebeliController extends Controller
{
    private $folder = 'admin.offlinebeli';

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
        $harga = $request->harga;
        $ukuran = $request->ukuran;
        $hargajual = $request->hargajual;

        $barang = Barang::where('kode',$kodebarang)->first();
        
        \Cart::session($iduser)->add([
            'id' => $barang->id,
            'name' => $barang->nama,
            'price' => $harga,
            'quantity' => $jumlah,
            'attributes' => [
                'ukuran' => $ukuran,
                'hargajual' => $hargajual
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
        return redirect()->route('belioff.index');
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
        $supplier = $request->supplier;
        if($total > 0) {

            $beli = Beli::create([
                'kode' => time(),
                'supplier' => $supplier,
                'total' => $total,
                'tanggal' => date('Y-m-d H:i:s'),
            ]);

            $list = \Cart::session($iduser)->getContent();
            foreach($list as $cart) {
                Belidetail::create([
                    'beli_id' => $beli->id,
                    'barang_id' => $cart->id,
                    'harga' => $cart->attributes->hargajual,
                    'hargabeli' => $cart->price,
                    'jumlah' => $cart->quantity,
                    'ukuran' => $cart->attributes->ukuran
                ]);

                Beli::updateJumlah($cart->id,$cart->quantity,$cart->attributes->ukuran);
                Barang::find($cart->id)->update([
                    'harga' => $cart->attributes->hargajual,
                    'hargabeli' => $cart->price
                ]);

                \Cart::session($iduser)->remove($cart->id);
            }

            return redirect()
                    ->route('belioff.index')
                    ->with('success','Transaksi pembelian berhasil disimpan');
        } else {
            return redirect()
                    ->route('belioff.index')
                    ->with('danger','Transaksi belum ada');
        }
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
