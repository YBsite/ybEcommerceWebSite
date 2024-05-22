<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('layouts.admin.pages.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.pages.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',

            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        // Create new category
        $slug = strtolower(str_replace(' ', '-', $request->category_name));

        // Create new category
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = $slug;

        // Handle image upload if provided

        $image = $request->file('img');
$img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
$image->move(public_path('upload'), $img_name);
$img_url = 'upload/' . $img_name;
$category->img = $img_url;


        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('layouts.admin.pages.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        // Find the category by ID
        $category = Category::findOrFail($id);

        // Update category name
        $category->category_name = $request->category_name;

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $img_name);
            $img_url = 'upload/' . $img_name;
            $category->img = $img_url;
        }

        $category->save();

        return redirect()->route('dashboard')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('danger', 'Category deleted successfully.');
    }
}
