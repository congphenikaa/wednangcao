<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    //
    function view_category()
    {
        return view('admin.category');
    }
    function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        return back()->with('category_added', 'Category has been added successfully!');
    }
}
