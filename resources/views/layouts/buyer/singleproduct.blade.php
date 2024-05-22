@extends('layouts.buyer.templates.app')
@section('homepage')

<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover transition-transform duration-300 transform hover:scale-110" src="{{ asset($products->product_image) }}" alt="Product Image">
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$products->product_name}}</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    {{$products->product_description}}
                </p>
                <div class="flex mb-4">
                    <form method="POST" action="{{ route('carts.store') }}"  enctype="multipart/form-data">
                        @csrf
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                        <span class="text-gray-600 dark:text-gray-300">${{$products->price}}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Availability:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{$products->quantity}}</span>
                        <input value="{{$products->id}}" name="product_id" class="hidden">
                        <input value="{{$products->price}}" name="price" class="hidden">
                    </div>
                </div>


                    <div class="mb-4">
                        <label for="quantity" class="mt-2 font-bold text-gray-700 dark:text-gray-300">Select Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" class="block w-full bg-gray-300 dark:bg-gray-700 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-white py-2 px-4 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:focus:border-gray-600">
                    </div>
                    <button type="submit" class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                </form>

            </div>
        </div>
    </div>
</div>








@endsection
