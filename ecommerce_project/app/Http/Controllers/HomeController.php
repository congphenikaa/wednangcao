<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product = Product::all();
        return view('home.index', compact('product'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function shop()
    {
        return view('home.product');
    }

    public function testimonial()
    {
        return view('home.testimonial');
    }

    public function why()
    {
        return view('home.why');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function login_home()
    {
        $product = Product::all();
        return view('home.index', compact('product'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        return view('home.product_details', compact('data'));
    }
}
