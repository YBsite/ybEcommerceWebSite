<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::latest()->get();
        return view('layouts.admin.pages.subcategories',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('layouts.admin.pages.addsubcategory',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the request data
         $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if provided
        $imgUrl = null;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload'), $imgName);
            $imgUrl = 'upload/' . $imgName;
        }
        $slug = strtolower(str_replace(' ', '-', $request->subcategory_name));

        // Create new subcategory
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->subcategory_name;
        $subcategory->slug = $slug;
        $subcategory->img = $imgUrl;
        $subcategory->save();

        return redirect()->route('dashboard')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return view('layouts.admin.pages.editsubcategory',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the subcategory by ID
        $subcategory = SubCategory::findOrFail($id);

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('upload'), $imgName);
            $imgUrl = 'upload/' . $imgName;
            $subcategory->img = $imgUrl;
        }

        // Update the subcategory name
        $subcategory->name = $request->name;

        // Save the updated subcategory
        $subcategory->save();

        return redirect()->route('dashboard')->with('success', 'Subcategory updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the subcategory by ID
        $subcategory = SubCategory::findOrFail($id);

        // Delete the subcategory
        $subcategory->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Subcategory deleted successfully.');
    }
}
