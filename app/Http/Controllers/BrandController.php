<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('layouts.admin.brands', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return view('layouts.admin.brands.create');
    }

    public function edit(Brand $brand)
    {
        return view('layouts.admin.brands.edit', [
            'brand' => $brand,
        ]);
    }

    public function update(Brand $brand, Request $request)
    {
        $request->validate([
            'title' => 'min:2|required',
            'picture' => 'min:2|image|max:2048|required',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = '/storage/'.$request->file('picture')->store('picture');
        }

        $brand->update([
            'title' => $request->name,
            'image' => $validated['picture'],
        ]);

        return redirect()->route('admin-index')->with('status', 'Le membre ' . $brand->name .' a été modifiée.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:2|required'
        ]);

        $brand = new Brand;

        $brand->name = $request->title;

        $brand->save();
        return redirect()->route('admin-index');
    }

    public function delete(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin-index')->with('status', 'La catégorie '.$brand->name . ' a été supprimée.');
    }

    public function show(Brand $brand)
    {
        return view('layouts.admin.brands.show', [
            'brand' => $brand,
        ]);
    }
}
