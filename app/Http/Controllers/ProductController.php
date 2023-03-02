<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        $product = [
            'name' => 'name',
            'description' => 'description',
            'price' => 'price'
        ];

        return view('product.show', compact('product'));
    }

}
