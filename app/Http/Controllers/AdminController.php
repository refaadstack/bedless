<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $title = 'Admin';
    private $folder = 'admin.admin';
    private $route = 'admin';
    private $routeindex = 'admin.index';

    public function index()
    {
        $data = [
            'title' => $this->title,
            'linkform' => route($this->route.'.create'),
            'linkedit' => $this->route.'.edit',
            'linkdestroy' => $this->route.'.destroy',
            'tabel' => Admin::all()
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
            'data' => new Admin(),
        ];
        return view($this->folder.'.form',$data);
    }

    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->nama = $request->nama;
        $admin->nohp = $request->nohp;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->level = $request->level;
        $admin->save();

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
            'data' => Admin::findOrFail($id),
        ];
        return view($this->folder.'.form',$data);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->nama = $request->nama;
        $admin->nohp = $request->nohp;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->level = $request->level;
        $admin->save();

        return redirect()
            ->route($this->routeindex)
            ->with('success','Berhasil ubah data '.$this->title);
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        
        return redirect()
            ->route($this->routeindex)
            ->with('danger','Berhasil hapus '.$this->title);
    }
}
