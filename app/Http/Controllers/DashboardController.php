<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $folder = 'admin.dashboard';

    public function index()
    {
        return view($this->folder.'.dashboard');
    }
}
