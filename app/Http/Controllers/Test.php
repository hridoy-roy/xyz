<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function index(){
        return view('form');
    }
    
    public function about(){
        return view('about');
    }
}
