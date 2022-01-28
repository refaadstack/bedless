<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Expedisi;
use App\Models\Kategori;
use App\Models\Konfirmasi;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\Pemesanandetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function logindulu() {
        return view('web.home.logindulu');
    }

    public function home() {
        $data = [
            'barang' => Barang::all()
        ];
        return view('web.home.home',$data);
    }

    public function tentang() {
        $data = [
        ];
        return view('web.home.tentang',$data);
    }

    public function carapesan() {
        $data = [
        ];
        return view('web.home.carapesan',$data);
    }


    public function kategori(Request $request) {
        $idkategori = $request->idkategori;

        $data = [
            'kategori' => Kategori::find($idkategori),
            'barang' => Barang::where('kategori_id',$idkategori)->get()
        ];
        return view('web.home.barangkategori',$data);
    }

    public function detailbarang(Request $request)
    {
        $idbarang = $request->idbarang;
        $barang = Barang::find($idbarang);
        $data = [
            'kategori' => Kategori::find($barang->kategori_id),
            'barang' => $barang,
            'baranglainnya' => Barang::where('id','<>',$idbarang)->where('kategori_id',$barang->kategori_id)->get()
        ];
        return view('web.home.barangdetail',$data);
    }

    public function daftar() {
        $data = [];
        return view('web.home.daftar',$data);
    }

    public function daftarsave(Request $request) {

        $username = $request->username;

        $plg = Pelanggan::where('username',$username)->get();

        if($plg->count() > 0) {
            return redirect()
                ->route('web.daftar')
                ->with('warning','Maaf, Username ini sudah digunakan');
        }

        $plg = new Pelanggan();
        $request->request->add([
            'fotoprofil' => '',
            'tanggaldaftar' => date('Y-m-d H:i:s'),
            'status' => 'Aktif',
            'password' => Hash::make($request->passwordnya)
        ]);
        $plg->fill($request->except('passwordnya'));
        $plg->save();

        return redirect()->route('web.home')
              ->with('success','Pendaftaran berhasil, silahkan login');
        
    }

    public function loginproses(Request $request) {
        $username = $request->username;
        $password = $request->password;

        if(Auth::guard('pelanggan')->attempt(['username' => $username,'password' => $password])) {
            return redirect()
                ->route('web.home')
                ->with('success','Anda berhasil login');
                // ->route('web.pelanggan.profil');
        } else  {
           return redirect()
                    ->route('web.home')
                    ->with('danger','Maaf, Login Anda Gagal');
        }
    }

    public function logout()
    {
        if(Auth::guard('pelanggan')->check()) {
            Auth::guard('pelanggan')->logout();
        }

        return redirect()->route('web.home');
    }

    /// akun

    public function profil() {
        $id = Auth::guard('pelanggan')->user()->id;
        $pelanggan = Pelanggan::find($id);
        $data = [
            'pelanggan' => $pelanggan
        ];
        return view('web.akun.profil',$data);
    }

    public function orderhistory() {
        $id = Auth::guard('pelanggan')->user()->id;
        $pelanggan = Pelanggan::find($id);
        $data = [
            'pemesanan' => Pemesanan::getPemesananPelanggan($id)
        ];
        return view('web.akun.orderhistory',$data);
    }

    public function getTotalBeratPemesanan($idpemesanan)
    {
        $cart = Pemesanan::getPemesananDetail($idpemesanan);
        $berat = 0;
        foreach($cart as $item) {
            $barang = Barang::find($item->barang_id);
            $berat += $barang->berat;
        }

        return $berat;
    }

    public function orderhistorydetail(Request $request) {
        $id = Auth::guard('pelanggan')->user()->id;
        $pelanggan = Pelanggan::find($id);
        $idpemesanan = $request->idpemesanan;
        $data = [
            'pelanggan' => $pelanggan,
            'pemesanan' => Pemesanan::find($idpemesanan),
            'pemesanandetail' => Pemesanan::getPemesananDetail($idpemesanan),
            'totalberat' => $this->getTotalBeratPemesanan($idpemesanan)
        ];
        return view('web.akun.orderdetail',$data);
    }

    // fungsi cart

    public function stokkurang() {
        return view('web.cart.cekjumlah');
    }

    public function addcart(Request $request)
    {
        $this->iduser = Auth::guard('pelanggan')->user()->id;
        $idbarang = $request->idbarang;
        $barang = Barang::find($idbarang);

        $jumlah = $request->jumlah;
        $ukuran = $request->ukuran;

        if($barang->kategori->jenisukuran == 'Satu') {
            if($jumlah <= $barang->jumlah) {
                echo 'jumlah cukup';

                \Cart::session($this->iduser)->add([
                    'id' => $idbarang,
                    'name' => $barang->nama,
                    'price' => $barang->harga,
                    'quantity' => $jumlah,
                    'attributes' => [
                       'ukuran' => $ukuran
                    ],
                ]);

                return redirect()->route('cart.barang.list');

            } else {
                return redirect()->route('cart.barang.stokkurang');
            }
        } else if($barang->kategori->jenisukuran == 'Banyak') {
            $ukr = 'ukuran_'.Str::lower($ukuran);

            if($jumlah <= $barang->$ukr) {
                \Cart::session($this->iduser)->add([
                    'id' => $idbarang,
                    'name' => $barang->nama,
                    'price' => $barang->harga,
                    'quantity' => $jumlah,
                    'attributes' => [
                       'ukuran' => $ukuran
                    ],
                ]);
                return redirect()->route('cart.barang.list');
            } else {
                return redirect()->route('cart.barang.stokkurang');
            }
        }
    }

    public function getTotalBerat()
    {
        $cart = \Cart::session($this->iduser)->getContent();
        $berat = 0;
        foreach($cart as $item) {
            $barang = Barang::find($item->id);
            $berat += $barang->berat;
        }

        return $berat;
    }

    public function listcart() {
        $this->iduser = Auth::guard('pelanggan')->user()->id;
        $data = [
            'expedisi' => Expedisi::all(),
            'items' => \Cart::session($this->iduser)->getContent(),
            'totalberat' => $this->getTotalBerat(),
            'total' => \Cart::session($this->iduser)->getTotal(),
            'pelanggan' => Pelanggan::find($this->iduser)
        ];
        return view('web.cart.listcart',$data);
    }

    public function hapuscart(Request $request) {
        $idbarang = $request->idbarang;
        $this->iduser = Auth::guard('pelanggan')->user()->id;
        \Cart::session($this->iduser)->remove($idbarang);

        return redirect()->route('cart.barang.list');
    }

    public function prosesordercart(Request $request)
    {
        $this->iduser = Auth::guard('pelanggan')->user()->id;
        $pelanggan = Pelanggan::find($this->iduser);
        
        $alamat = $request->alamatkirim;
        $nama = $request->nama;
        $notelp = $request->notelp;
        $expedisi = $request->expedisi_id;
        $total = \Cart::session($this->iduser)->getTotal();
        
        $pemesanan = Pemesanan::create([
            'kodepemesanan' => time(),
            'pelanggan_id' => $this->iduser,
            'alamatkirim' => $alamat,
            'nama' => $nama,
            'notelp' => $notelp,
            'total' => $total,
            'expedisi_id' => $expedisi,
            'noresi' => '',
            'status' => 'Belum',
            'tanggalpemesanan' => date('Y-m-d H:i:s'),
            'bayar' => 0,
            'kembalian' => 0
        ]);

        Konfirmasi::create([
            'pemesanan_id' => $pemesanan->id,
            'jumlahbayar' => '0',
            'norekening' => '',
            'melalui' => '',
            'tgltransfer' => date('Y-m-d H:i:s'),
            'fotobukti' => '',
            'stskonfirmasi' => 'B'
        ]);

        $list = \Cart::session($this->iduser)->getContent();
        foreach($list as $cart) {
            $barang = Barang::find($cart->id);
            Pemesanandetail::create([
                'pemesanan_id' => $pemesanan->id,
                'barang_id' => $cart->id,
                'harga' => $cart->price,
                'hargabeli' => $barang->hargabeli,
                'jumlah' => $cart->quantity,
                'ukuran' => $cart->attributes['ukuran']
            ]);

            $ukuran = $cart->attributes['ukuran'];
            Pemesanan::updateJumlah($cart->id,$cart->quantity,$ukuran);

            \Cart::session($this->iduser)->remove($cart->id);
        }

        return redirect()
            ->route('web.pelanggan.orderhistory');
    }

    
    
    public function proseskonfirmasi(Request $request) {
        $idpemesanan = $request->idpemesanan;
        $konfirmasi = Konfirmasi::where('pemesanan_id',$idpemesanan)->first();
        $konfirmasi = Konfirmasi::find($konfirmasi->id);
        $konfirmasi->melalui = $request->melalui;
        $konfirmasi->norekening = $request->norekening;
        $konfirmasi->jumlahbayar = $request->jumlahbayar;
        $konfirmasi->tgltransfer = date('Y-m-d');
        $konfirmasi->stskonfirmasi = 'S';

        $gambarbase64 = '';
        if($request->file('uploadgambar')) {
            $gambarbase64 = base64_encode(file_get_contents($request->file('uploadgambar')->path()));
        }
        $konfirmasi->fotobukti = $gambarbase64;
        $konfirmasi->save();

        return redirect()
            ->route('web.pelanggan.orderhistory.detail',['idpemesanan' => $idpemesanan]);
    }

    public function ubahprofil(Request $request) {
        $id = Auth::guard('pelanggan')->user()->id;
        $plg = Pelanggan::find($id);
        if($request->passwordnya != '') {
            $request->request->add([
                'password' => Hash::make($request->passwordnya)
            ]);
        }
        $plg->fill($request->except('passwordnya'));
        $plg->save();

        return redirect()->route('web.pelanggan.profil')
              ->with('success','Berhasil ubah profil');   
    }
}
