<?php

namespace App\Http\Controllers;

use App\Models\Infoweb;
use Illuminate\Http\Request;

class InfowebController extends Controller
{
    private $title = 'Info Web';
    private $folder = 'admin.infoweb';
    private $route = 'infoweb';
    private $routeindex = 'infoweb.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Infoweb::all()
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
            'data' => new Infoweb(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $infoweb = new Infoweb();
        $infoweb->fill($request->all());
        $infoweb->save();

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
            'data' => Infoweb::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $infoweb = Infoweb::findOrFail($id);
        $infoweb->fill($request->all());
        $infoweb->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        Infoweb::findOrFail($id)->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
