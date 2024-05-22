@extends('layouts.buyer.templates.app')
@section('homepage')

<div class="mb-10 bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
    <h1 class="font-bold text-2xl my-4 text-center text-blue-600">Market Services</h1>
    <hr class="mb-2">
    <div class="flex justify-between mb-6">

        <div class="text-gray-700">
            <div>Date: {{ $orders->updated_at}}</div>

        </div>
    </div>
    <div class="mb-8">
        <h2 class="text-lg font-bold mb-4">Bill To:</h2>
        <div class="text-gray-700 mb-2">{{ $orders->user->name }}</div>

        <div class="text-gray-700 mb-2">{{$orders->shipping_phoneNumber}}</div>
        <div class="text-gray-700 mb-2">{{$orders->shipping_address}}</div>
        <div class="text-gray-700 mb-2">{{$orders->shipping_city}} , {{$orders->shipping_state}}</div>
        <div class="text-gray-700">{{$orders->user->email}}</div>
    </div>
    <table class="w-full mb-8">
        <thead>
            <tr>
                <th class="text-left font-bold text-gray-700">Product Name:</th>
                <th class="text-right font-bold text-gray-700">quantity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left text-gray-700">     {{ $product->product_name }}</td>
                <td class="text-right text-gray-700">{{$orders->quantity}}</td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <td class="text-left font-bold text-gray-700">Total</td>
                <td class="text-right font-bold text-gray-700">{{$orders->total_price + 4.99}}$</td>
            </tr>
        </tfoot>
    </table>
    <div class="text-gray-700 mb-2">Thank you for your order!</div>
    <div class="text-gray-700 text-sm">Our admin will contact you via WhatsApp or phone call to confirm your order details shortly.<br>
        Delivery usually takes up to 24 hours after confirmation. However, please note that during weekends or holidays, there might be a delay of one or two days.<br>
        We appreciate your patience and understanding.</div>
</div>








@endsection
