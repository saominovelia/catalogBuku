<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    //menampilkan halaman penerbit
    public function index(){
        return view('penerbit.dashboard');
    }
}
