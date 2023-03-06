<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $categories, $brands;
    public function index()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('home.index', ['categories' => $this->categories, 'brands' => $this->brands]);
    }
    public function product()
    {

        return view('home.product.index',['categories' => Category::all(), 'products' => Product::all()]);
    }

    public function productDetail($id)
    {
        return view('home.product.detail', ['categories' => Category::all(), 'products' => Product::all()]);
    }
}
