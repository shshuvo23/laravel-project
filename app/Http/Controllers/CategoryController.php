<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categories;
    public function index()
    {
        return view('admin.category.create');
    }

    public function create(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:categories,name',
            ]);

            Category::createCategory($request);
            return redirect('/category')->with('message','Category created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    public function manage()
    {
        $this->categories = Category::all();
        return view('admin.category.index', ['categories' => $this->categories]);
    }

    public function edit($id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category')->with('message', 'Updated category');
    }

    public function delete($id)
    {
        Category::categorydelete($id);
        return redirect('/category/manage')->with('message',"Deleted successfully");
    }
}
