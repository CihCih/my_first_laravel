<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NEWSController extends Controller
{
    public function index(){
        return view('3index_swiper');
    }
}
