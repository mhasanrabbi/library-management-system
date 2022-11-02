<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Catagory',
            'categories' => Category::latest()->paginate(12)
        ];

        return view('categories.index', $data);
    }

    //strore new category
    public function store(Request $request)
    {
        // dd($request->all());
        $formRequest = $request->validate([
            'categories' => 'required|min:4|max:30|unique:categories|regex:/^[a-zA-Z- ]*$/'
        ]);
        

        Category::create($formRequest);// models from if :: then 



        return redirect()->route('categories.index')->with('message', 'Category created successfully!');
    }

    //show all category for manage
    public function manage()
    {
        return view('categories.manage', [
            'pageTitle' => 'Manage categories',
            'categories' => Category::latest()->paginate(6)
        ]);
    }

    //update category
    public function update(Request $request, $id)
    {
        $formRequest = $request->validate([
            'category_name' => 'required|min:4|max:30|unique:categories|regex:/^[a-zA-Z- ]*$/'
        ]);

        Category::where('id', $id)->update($formRequest);
        return redirect()->back()->with('message', 'Category updated successfully!');
    }

    //delete category
    public function destroy($id) {

        Category::where('id', $id)->delete(); // category if :: then come from model view

        return redirect()->back()->with('message', 'category deleted successfully!');
    }
}
