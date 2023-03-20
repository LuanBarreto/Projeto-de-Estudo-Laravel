<?php

namespace App\Http\Controllers;

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

        return view('product.create', compact('product'));
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

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
           'name' => 'required',
           'description' => 'required',
           'price' => 'required|numeric'
        ]);

        $product->update($data);

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

        return view('product.show', compact('product'));
    }

    public function index()
    {
        $products = Product::all();

        return view('product.list', compact('products'));
    }
}
