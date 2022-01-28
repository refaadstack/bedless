<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    private $title = 'Pelanggan';
    private $folder = 'admin.pelanggan';
    private $route = 'pelanggan';
    private $routeindex = 'pelanggan.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Pelanggan::all()
        ];
        
        return view($this->folder.'.tabel',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah '.$this->title,
            'link' => route($this->routeindex),
            'route' => $this->route.'.store',
            'method' => 'POST',
            'data' => new Pelanggan(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function cekusername($username) {
        $pelanggan = Pelanggan::where('username',$username)->get();
        return $pelanggan;
    }

    public function store(Request $request)
    {
        $username = $request->username;
        if($this->cekusername($username)->count()) {
            return redirect()
                ->route($this->routeindex)
                ->with('success','Username telah ini '.$username.' telah digunakan');
        } 

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->jeniskelamin = $request->jeniskelamin;
        $pelanggan->tempatlahir = $request->tempatlahir;
        $pelanggan->tanggallahir = $request->tanggallahir;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->nohp = $request->nohp;
        $pelanggan->username = $request->username;
        if($request->password) {
            $pelanggan->password = Hash::make($request->password);
        }
        $pelanggan->status = $request->status;
        $pelanggan->fotoprofil = '';
        $pelanggan->tanggaldaftar = date('Y-m-d H:i:s');
        $pelanggan->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil simpan '.$this->title);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah '.$this->title,
            'link' => route($this->routeindex),
            'route' => $this->route.'.update',
            'method' => 'PATCH',
            'data' => Pelanggan::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama = $request->nama;
        $pelanggan->jeniskelamin = $request->jeniskelamin;
        $pelanggan->tempatlahir = $request->tempatlahir;
        $pelanggan->tanggallahir = $request->tanggallahir;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->nohp = $request->nohp;
        $pelanggan->username = $request->username;
        if($request->password) {
            $pelanggan->password = Hash::make($request->password);
        }
        $pelanggan->status = $request->status;
        $pelanggan->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
