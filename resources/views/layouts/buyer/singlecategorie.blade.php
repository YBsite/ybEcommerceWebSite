@extends('layouts.buyer.templates.app')
@section('homepage')

<!-- component -->
<!-- Create By Joker Banny -->
<style>
    @layer utilities {
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  }
</style>


<div class="container w-full max-w-screen-xl mx-auto p-4">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center pt-5 pb-5">
            <h1 class="mb-10 text-center text-2xl font-bold">{{$category->category_name}}</h1>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Product Card Loop -->
        @foreach ($products as $product)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <img class="w-full h-48 object-cover object-center" src="{{ asset($product->product_image) }}" alt="Product Image">
            <div class="p-4">
                <!-- Product Name -->
                <div class="h-24">
                    <h2 class="text-gray-900 font-bold text-xl mb-2">{{ substr($product->product_name, 0, 65) }}</h2>
                </div>
                <!-- Product Description -->
                <div class="h-32">
                    <p class="text-gray-600 text-sm">{{ substr($product->product_description, 0, 197) }}...</p>
                </div>
                <!-- Product Price and Buttons -->
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-gray-900 font-bold text-sm">{{ $product->price }} $</span>
                    <!-- Add to Cart Button -->
                    <a href="{{ route('viewpro', [$product->id, $product->slug]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                            <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                        </svg>
                        Buy now
                    </a>
                    <!-- Add to Favorite Button -->
                   
                </div>
            </div>

        </div>
        @endforeach

    </div>
    <div class="mr-2 pt-4 mt-4">
        {{$products->links()}}
    </div>

</div>


@endsection

