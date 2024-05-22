@extends('layouts.buyer.templates.app')
@section('homepage')

<div class="bg-gradient-to-r from-blue-500 to-purple-600 relative">
    <div class="container mx-auto px-4 py-12 flex flex-col lg:flex-row items-center justify-center">
      <div class="max-w-lg mx-auto text-center lg:text-left lg:mr-8 lg:order-2">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4">Virtual Shop: Bringing Your Favorites Home with Ease!</h1>
        <p class="text-lg lg:text-xl text-white mb-8">Discover a world of convenience and endless choices.</p>
        <a href="#" class="bg-white text-blue-600 hover:bg-blue-700 hover:text-white px-6 py-3 rounded-lg font-semibold transition duration-300 ease-in-out inline-block mr-4 mb-4 lg:mb-0">Explore Now</a>
        <a href="#" class="bg-blue-600 text-white hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold transition duration-300 ease-in-out inline-block">Shop Now</a>
      </div>
      <!-- Add your image here -->
      <div class="lg:w-1/2">
        <img src="https://c0.wallpaperflare.com/preview/447/552/983/ecommerce-online-shop-euro.jpg" alt="Description of the image" class="max-w-full mx-auto lg:mx-0 mt-8 lg:mt-0 rounded-lg shadow-lg">
      </div>
    </div>
  </div>
  <div class="container w-full max-w-screen-xl mx-auto p-4">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center pt-5 pb-5">
            <svg class="w-6 h-6 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14M5 12h14"></path>
            </svg>
            <h2 class="text-2xl font-bold">Recent Added</h2>
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
    <div class="pt-4 pb-4">
        <a href={{ route('products.all') }} class="flex items-center text-indigo-700 border border-indigo-600 py-2 px-6 gap-2 rounded inline-flex items-center">
            <span>
                View More
            </span>
            <svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-6 h-6 ml-2">
                <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>

</div>

<div class="container w-full max-w-screen-xl mx-auto p-4">
    <div class="flex items-center pt-5 pb-5">
    <div class="w-6 h-6 mr-2  text-yellow-500">
        <i class="fa-solid fa-plug"></i>
    </div>
        <h2 class="text-2xl font-bold">Electronic</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <!-- Product Card Loop -->
        @foreach ($elec as $item)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <img class="w-full h-48 object-cover object-center" src="{{ asset($item->product_image) }}" alt="Product Image">
            <div class="p-4">
                <!-- Product Name -->
                <div class="h-24">
                    <h2 class="text-gray-900 font-bold text-xl mb-2">{{ substr($item->product_name, 0, 65) }}</h2>
                </div>
                <!-- Product Description -->
                <div class="h-32">
                    <p class="text-gray-600 text-sm">{{ substr($item->product_description, 0, 197) }}...</p>
                </div>
                <!-- Product Price and Buttons -->
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-gray-900 font-bold text-sm">{{ $item->price }} $</span>
                    <!-- Add to Cart Button -->
                    <a href="{{ route('viewpro', [$item->id, $item->slug]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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

    <div class="pt-4 pb-4">
        <a  href="/single-categorie/{{ $item->category_id }}" class="flex items-center text-indigo-700 border border-indigo-600 py-2 px-6 gap-2 rounded inline-flex items-center">
            <span>
                View More
            </span>
            <svg class="w-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-6 h-6 ml-2">
                <path d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>


</div>







@endsection
