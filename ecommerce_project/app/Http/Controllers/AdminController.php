<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        return view('admin.category');
    }

    public function add_category(Request $request){
        $category = new Category;

        $category->category_name = $request->category;

        $$category->save();

        toasrt()->addSuccess('Category Added Successfully');

        return redirect()->back();
    }
}
