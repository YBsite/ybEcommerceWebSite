<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingInfoController extends Controller
{
    public function index()
    {
        return view('layouts.buyer.shippinginfo');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'phone_number' => 'required|string',
            'city_name' => 'required|string',
            'postal_code' => 'required|string',
            'state' => 'required|string',
            'address' => 'required|string',
            // Add any additional validation rules as needed
        ]);

        // Create a new ShippingInfo instance
        $shippingInfo = new ShippingInfo();
        $shippingInfo->user_id = auth()->id(); // Assuming the user is authenticated
        $shippingInfo->phone_number = $validatedData['phone_number'];
        $shippingInfo->city_name = $validatedData['city_name'];
        $shippingInfo->postal_code = $validatedData['postal_code'];
        $shippingInfo->state = $validatedData['state'];
        $shippingInfo->address = $validatedData['address'];

        // Save the ShippingInfo instance
        $shippingInfo->save();

        // Redirect the user to a relevant page (e.g., order confirmation page)
        return redirect()->route('checkout');
    }
    public function checkoutPage(){
        $user_id = Auth::id();
        $cart = Cart::where('user_id',$user_id)->get();

        $shippingInfo = ShippingInfo::where('user_id', Auth::user()->id)->latest()->firstOrFail();

        return view('layouts.buyer.checkout',compact('cart','shippingInfo'));
    }


    public function PlaceOrder(Request $request){
        $user_id =  Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        $shipping_ad = ShippingInfo::where('user_id',$user_id)->first();

        foreach($cart_items as $item){
            Order::insert([
                'user_id'=>$user_id,
                'shipping_phoneNumber'=>$shipping_ad->phone_number,
                'shipping_postalcode'=>$shipping_ad->postal_code,
                'shipping_city'=>$shipping_ad->city_name,
                'shipping_address'=>$shipping_ad->address, // Adding shipping address
                'shipping_state'=>$shipping_ad->state, // Adding shipping state
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        // Remove the line below if you don't want to delete the shipping info after placing the order
        $shipping_ad->delete();

        return redirect()->route('history')->with('success_message','Your Order Has Been Placed Successfully');
    }
    public function History(){
        $id = Auth::user()->id;

        $orders = Order::where('user_id',$id)->latest()->get();
        return view('layouts.buyer.history',compact('orders'));
    }
    public function showStatus($id){
         // Assuming the request ID is passed as 'id'

        $orders = Order::findOrfail($id);
        $product = $orders->product;


        return view('layouts.buyer.showStatus',compact('orders','product'));
    }

}
