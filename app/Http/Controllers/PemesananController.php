<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\Pemesanan;
use App\Models\Pemesanandetail;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    private $title = 'Pemesanan';
    private $folder = 'admin.pemesanan';
    private $route = 'pemesanan';
    private $routeindex = 'pemesanan.index';

    public function semua() {
        $data = [
            'title' => $this->title,
            'linkview' => $this->route.'.view.detail',
            'tabel' => Pemesanan::all()
        ];
        
        return view($this->folder.'.tabelsemua',$data);
    }

    public function detailpesanan(Request $request) {
        $idpemesanan = $request->idpemesanan;

        $data = [
            'title' => $this->title.' Detail',
            'link' => route('pemesanan.semua'),
            'pemesanan' => Pemesanan::find($idpemesanan),
            'tabel' => Pemesanandetail::where('pemesanan_id',$idpemesanan)->get()
        ];
        
        return view($this->folder.'.detailpesanan',$data);
    }

    public function savenoresi(Request $request) {
        $idpemesanan = $request->idpemesanan;
        $pemesan = Pemesanan::find($idpemesanan);
        $pemesan->noresi = $request->noresi;
        $pemesan->status = 'Sudah';
        $pemesan->save();

        // $konfirmasi = Konfirmasi::where('pemesanan_id',$idpemesanan)->first();

        // $konf = Konfirmasi::find($konfirmasi->id);
        // $konf->konfirmasiadmin = 'S';
        // $konf->save();

        return redirect()
            ->route('pemesanan.view.detail',['idpemesanan' => $idpemesanan])
            ->with('success',"Berhasil input no resi");
    }
}
