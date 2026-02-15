<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_delete',0)->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('is_delete',0)->get();
        return view('category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($request->all());

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id','!=',$id)->get();

        return view('category.edit', compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

      
        if ($request->parent_id == $id) {
            return back()->withErrors('Không thể chọn chính nó làm cha');
        }

        $category->update($request->all());

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update(['is_delete'=>1]);

        return redirect()->route('category.index');
    }
}
