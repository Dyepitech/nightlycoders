<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('layouts.admin.category', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('layouts.admin.category.create');
    }

    public function edit(Category $category)
    {
        return view('layouts.admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Category $category, Request $request)
    {
        $request->validate([
            'title' => 'min:2|required'
        ]);


        $category->update([
            'name' => $request->title,
        ]);

        return redirect()->route('admin-index')->with('status', 'La catégorie '.$category->id.' a été modifiée.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:2|required'
        ]);

        $category = new Category;

        $category->name = $request->title;

        $category->save();
        return redirect()->route('admin-index');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin-index')->with('status', 'La catégorie '.$category->name . ' a été supprimée.');
    }

    public function show(Category $category)
    {
        return view('layouts.admin.category.show', [
            'category' => $category,
            'projects' => $category->projects,
        ]);
    }
}
