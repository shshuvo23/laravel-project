<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products;
    public function index()
    {
        $this->products = Product::all();
        return view('admin.product.index',['products'=> $this->products]);
    }

    public function addproduct()
    {
        return view('admin.product.create',['categories'=>Category::all(), 'brands'=>Brand::all()]);
    }
    public function create(Request $request)
    {
        Product::createProduct($request);
        return redirect('/products/add')->with('message', 'Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.product.edit', ['product' => Product::find($id), 'categories' => Category::all(), 'brands' => Brand::all()]);
    }

    public function update(Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/products')->with('message', 'Updated Successfully');
    }
}
