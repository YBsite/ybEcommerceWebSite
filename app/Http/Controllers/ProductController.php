<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('layouts.admin.pages.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('layouts.admin.pages.AddProduct', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:sub_categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if provided


        // Create new product
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->product_image = $imgUrl ?? null; // Assign image URL if provided
        $product->slug = strtolower(str_replace(' ', '-', $request->product_name));
        $image = $request->file('img');
$img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
$image->move(public_path('upload'), $img_name);
$img_url = 'upload/' . $img_name;
$product->product_image = $img_url;

        // Assuming you have authentication implemented, get the currently authenticated user
        $product->user_id = auth()->id();

        $product->save();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Product created successfully.');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('layouts.admin.pages.editProduct',compact('product','categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            // Validate the incoming request data
    $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'required|exists:sub_categories,id',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload if provided


    // Create new product
    $product = Product::findOrFail($id); // Find the existing product
    $product->product_name = $request->product_name;
    $product->product_description = $request->product_description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category_id;
    $product->subcategory_id = $request->subcategory_id;
    $image = $request->file('img');
    $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
$image->move(public_path('upload'), $img_name);
$img_url = 'upload/' . $img_name;
$product->product_image = $img_url;
    $product->slug = strtolower(str_replace(' ', '-', $request->product_name));

    // Assuming you have authentication implemented, get the currently authenticated user
    $product->user_id = auth()->id();

    $product->save();

    // Redirect back to the dashboard with a success message
    return redirect()->route('dashboard')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('danger', 'Category deleted successfully.');
    }
    public function approve($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'approved';
            $order->save();
        }
        return redirect()->back()->with('succes', 'Order approved successfully!');
    }
    public function decline($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'declined';
            $order->save();
        }
        return redirect()->back()->with('danger', 'Order declined successfully!');
    }

}
