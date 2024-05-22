<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_items = Cart::latest()->paginate(3); // Assuming 10 items per page

        return view('layouts.buyer.cart',compact('cart_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product_price= $request->price;
        $quantity = $request->quantity;
        $price = $product_price * $quantity;

        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$quantity,
            'price'=>$price

        ]);
        return redirect()->route('carts.index')->with('success_message', 'Product added to cart successfully.');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        // Redirect back with a success message, or return a JSON response
        return redirect()->back()->with('danger', 'Item removed from cart successfully');
    }
}
