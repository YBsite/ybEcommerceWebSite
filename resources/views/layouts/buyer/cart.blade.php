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

<body>
  <div class="h-screen bg-gray-100 pt-20">
    <!-- Display success message if exists -->
    @if(session('success_message'))
    <div id="successMessage" class="bg-green-200 text-green-700 p-4 text-center mb-4">
        {{ session('success_message') }}
    </div>
    @endif

    <!-- Display danger message if exists -->
    @if(session('danger_message'))
    <div id="dangerMessage" class="bg-red-200 text-red-700 p-4 text-center mb-4">
        {{ session('danger_message') }}
    </div>
    @endif

    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">

    @if($cart_items->isEmpty())
        <div class="text-center">Your cart is empty.</div>
    @else

      <div class="rounded-lg md:w-2/3">
        @php
        $total = 0
        @endphp

       @foreach ($cart_items as $item)
       <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
        @php
                $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                $product_image = App\Models\Product::where('id',$item->product_id)->value('product_image')

            @endphp

        <img src="{{ asset($product_image)}}" alt="product-image" class="w-full h-28 rounded-lg sm:w-40" />
        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
          <div class="mt-5 sm:mt-0">
            <h2 class="text-lg font-bold text-gray-900">@php
                $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                $product_image = App\Models\Product::where('id',$item->product_id)->value('product_image')

            @endphp
             {{$product_name}}</h2>
            <p class="mt-1 text-xs text-gray-700">{{$item->quantity}}</p>
          </div>
          <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">

            <div class="flex items-center space-x-4">
              <p class="text-sm">$ {{$item->price}}</p>
              <form id="deleteForm" action="{{ route('carts.destroy', $item->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('deleteForm').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>

            </div>
          </div>
        </div>
      </div>
      @php
      $total = $total +  $item->price
      @endphp
      @endforeach
      {{ $cart_items->links() }}
    </div>


      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Subtotal</p>
          <p class="text-gray-700">$ {{$total}}</p>
        </div>
        <div class="flex justify-between">
          <p class="text-gray-700">Shipping</p>
          <p class="text-gray-700">$4.99</p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Total</p>
          <div class="">
            <p class="mb-1 text-lg font-bold">${{ $total + 4.99 }}</p>

            <p class="text-sm text-gray-700">including VAT</p>
          </div>
        </div>
        <a type="button" href="/shipping/{{$item->id}}" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</a>
      </div>
    </div>
    @endif
  </div>

</body>

<script>
    setTimeout(function() {
      var successMessage = document.getElementById('successMessage');
      successMessage.classList.add('animate__animated', 'animate__fadeIn');

      setTimeout(function() {
        successMessage.classList.remove('animate__animated', 'animate__fadeIn');
      }, 6000); // Remove animation after 6 seconds
    }, 0); // Add animation after 0 milliseconds (immediately after rendering)
  </script>

@endsection

