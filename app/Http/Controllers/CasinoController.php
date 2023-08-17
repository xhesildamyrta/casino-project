<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasinoController extends Controller
{
    public function index(){
        return view('pages.casino');
    }
}
