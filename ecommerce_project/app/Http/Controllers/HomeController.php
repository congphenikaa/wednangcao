<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function home()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('product', 'count'));
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

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }
        return view('home.product_details', compact('data', 'count'));
    }
    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        toastr()->timeOut(5000)->addSuccess('Product Added to the Cart successfully');
        return redirect()->back();
    }

    public function mycart()
    {

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $cart = Cart::where('user_id', $userid)->get();
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $cart = '';
            $count = '';
        }
        return view('home.mycart', compact('cart', 'count'));
    }
    public function delete_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        flash()->success('The product has been Deleted successfully');

        return redirect()->back();
    }


    public function confirm_order(Request $request)
    {

        $name = $request->name;
        $adress = $request->adress;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $adress;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id', $userid)->get();
        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(5000)->closeButton()->addSuccess('Order Confirmed successfully');
        return redirect()->back();
    }
}
