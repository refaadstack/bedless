<?php

namespace App\Http\Controllers;

use App\Models\Expedisi;
use Illuminate\Http\Request;

class ExpedisiController extends Controller
{
    private $title = 'Expedisi';
    private $folder = 'admin.expedisi';
    private $route = 'expedisi';
    private $routeindex = 'expedisi.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Expedisi::all()
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
            'data' => new Expedisi(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $expedisi = new Expedisi();
        $expedisi->fill($request->all());
        $expedisi->save();

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
            'data' => Expedisi::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $expedisi = Expedisi::findOrFail($id);
        $expedisi->fill($request->all());
        $expedisi->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        Expedisi::findOrFail($id)->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
