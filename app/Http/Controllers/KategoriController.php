<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    private $title = 'Kategori';
    private $folder = 'admin.kategori';
    private $route = 'kategori';
    private $routeindex = 'kategori.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Kategori::all()
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
            'data' => new Kategori(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->fill($request->all());
        $kategori->save();

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
            'data' => Kategori::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->fill($request->all());
        $kategori->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
