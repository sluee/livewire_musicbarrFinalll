<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index(){
        return view('components.band');
    }

    public function dashboard(){
        return view('components.dashboard');
    }
}
