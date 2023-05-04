<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function create()
    {
        $product = [
            'name' => '',
            'description' => '',
            'price' => ''
        ];

        $categories = Category::all();

        return view('product.create', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create($data);

        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
           'name' => 'required',
           'description' => 'required',
           'price' => 'required|numeric',
           'category_id' => 'required'
        ]);

        $product->update($data);

        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back();
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $category = $product->category;

        return view('product.show', compact('product', 'category'));
    }

    public function index()
    {
        $products = Product::all();

        return view('product.list', compact('products'));
    }
}
