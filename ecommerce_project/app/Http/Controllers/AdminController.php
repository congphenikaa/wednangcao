<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
}
