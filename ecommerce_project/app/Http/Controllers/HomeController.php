<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){
        return view('home.index');
    }

    public function contact(){
        return view('home.contact');
    }

    public function shop(){
        return view('home.product');
    }

    public function testimonial(){
        return view('home.testimonial');
    }

    public function why(){
        return view('home.why');
    }
    
}
