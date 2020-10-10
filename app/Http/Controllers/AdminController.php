<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //menampilkan halaman admin
    public function index(){
        return view('admin.dashboard');
    }
}
