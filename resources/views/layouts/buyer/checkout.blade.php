@extends('layouts.buyer.templates.app')

@section('homepage')

<div class="bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-3xl mx-auto p-8">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Order Summary</h1>

            <!-- Buyer Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Buyer Information</h2>

                <!-- Display buyer information here -->
                <!-- For example: -->
                <p>Name: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>Phone Number: {{ $shippingInfo->phone_number }}</p>
    <p>Address: {{ $shippingInfo->address }}</p>
    <p>City: {{ $shippingInfo->city_name }}</p>
    <p>Postal Code: {{ $shippingInfo->postal_code }}</p>
                <!-- Add more buyer information fields as needed -->
            </div>

            <!-- Products List -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Products</h2>

                <!-- Display products list here -->
                <!-- For example: -->
                @php
                $total = 0
                @endphp
                @foreach ($cart as $item)
                <div class="flex items-center mb-4">
                    @php
                    $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                    $product_image = App\Models\Product::where('id',$item->product_id)->value('product_image')

                @endphp
        <img src="{{ asset($product_image)}}" alt="Product 2" class="w-16 h-16 mr-4">
                    <div>
                        <p>@php
                            $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                            $product_image = App\Models\Product::where('id',$item->product_id)->value('product_image')

                        @endphp
                         {{$product_name}}</p>
                        <p>Price: ${{$item->price}}</p>
                        <p>Quantity: {{$item->quantity}}</p>
                    </div>
                </div>
                @php
                $total = $total +  $item->price
                @endphp
                @endforeach

                <!-- Add more products as needed -->
            </div>

            <!-- Total -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Total</h2>

                <!-- Display total amount here -->
                <!-- For example: -->
                <p>Total: $ {{ $total + 4.99 }}</p>
            </div>

            <!-- Delivery Tax -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Delivery Tax</h2>

                <!-- Display delivery tax here -->
                <!-- For example: -->
                <p>Delivery Tax: $4.99</p>
            </div>

            <!-- Confirm Button -->
            <form action="{{ route('place.order') }}" method="POST">
                @csrf
            <div class="flex justify-end">
                <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-700 dark:bg-teal-600 dark:text-white dark:hover:bg-teal-900">Confirm Order</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
