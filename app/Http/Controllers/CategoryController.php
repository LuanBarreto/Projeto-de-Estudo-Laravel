<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
      return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->brand = $request->input('brand');
        $category->status = $request->input('status');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }
}
