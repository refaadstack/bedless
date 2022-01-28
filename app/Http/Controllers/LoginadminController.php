<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginadminController extends Controller
{
    public function index() {
        return view('admin.loginadmin');        
    }

    public function proseslogin(Request $request) 
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::guard('admin')->attempt(['username'=>$username,'password'=>$password])) {
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->back()->with('danger',"<strong>Maaf, Anda Gagal Login</strong>");
        }
    
        return redirect()->back()->with('danger',"<strong>Maaf, Anda Gagal Login</strong>");
    }

    public function logout()
    {
        if(Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        return redirect()->route('login.admin');
    }
}
