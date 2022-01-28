<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    private $title = 'Barang';
    private $folder = 'admin.barang';
    private $route = 'barang';
    private $routeindex = 'barang.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'linkgambar' => 'gambar.barang.index',
            'tabel' => Barang::all()
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
            'kategori' => Kategori::pluck('nama','id'),
            'data' => new Barang(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $barang = new Barang();
        // $barang->fill($request->all());
        $gambarbase64a = '';
        if($request->file('uploadgambar1')) {
            $gambarbase64a = base64_encode(file_get_contents($request->file('uploadgambar1')->path()));
            $barang->gambar1 = $gambarbase64a;
        }

        if($request->file('uploadgambar2')) {
            $gambarbase64b = base64_encode(file_get_contents($request->file('uploadgambar2')->path()));
            $barang->gambar2 = $gambarbase64b;
        }

        $barang->fill($request->except(['uploadgambar1','uploadgambar2']));
        $barang->save();

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
            'kategori' => Kategori::pluck('nama','id'),
            'data' => Barang::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        // $barang->fill($request->all());
        $gambarbase64a = '';
        if($request->file('uploadgambar1')) {
            $gambarbase64a = base64_encode(file_get_contents($request->file('uploadgambar1')->path()));
            $barang->gambar1 = $gambarbase64a;
        }

        if($request->file('uploadgambar2')) {
            $gambarbase64b = base64_encode(file_get_contents($request->file('uploadgambar2')->path()));
            $barang->gambar2 = $gambarbase64b;
        }

        $barang->fill($request->except(['uploadgambar1','uploadgambar2']));
        $barang->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        
        $barang->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
