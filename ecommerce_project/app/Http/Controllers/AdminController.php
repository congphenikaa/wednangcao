<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    //
    function view_category()
    {
        $data = Category::all();


        return view('admin.category',compact('data'));
    }
    function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(5000)->addSuccess('Category added successfully');
        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);

        $data->delete();
        toastr()->timeOut(5000)->addSuccess('Category delete successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->timeOut(5000)->addSuccess('Category Update successfully');

        return redirect('/view_category');
    }

    public function add_product(){

        $category = Category::all();

        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request){
        $data = new Product;
        
        $data->title = $request->title;

        $data->description = $request->description;
        
        $data->price = $request->price;
        
        $data->quantity = $request->qty;

        $data->category = $request->category;

        $data->save();

        return redirect()->back();

    }
}
