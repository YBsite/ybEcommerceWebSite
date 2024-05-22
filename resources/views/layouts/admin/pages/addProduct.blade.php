@extends('layouts.admin.app')
@section('dashboard')






<div class="p-2 max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-5">Add New Product</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="product_name" class="block text-gray-700 font-bold mb-2">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
            @error('product_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="product_description" class="block text-gray-700 font-bold mb-2">Product Description</label>
            <textarea name="product_description" id="product_description" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" rows="4" required></textarea>
            @error('product_description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price</label>
            <input type="number" name="price" id="price" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" step="0.01" required>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
            @error('quantity')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Category</label>
            <select name="category_id" id="category_id" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="subcategory_id" class="block text-gray-700 font-bold mb-2">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">Select a subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
            @error('subcategory_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="img" class="block text-gray-700 font-bold mb-2">Product Image</label>
            <input type="file" name="img" id="img" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
            @error('img')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-8">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Add Product</button>
        </div>
    </form>
</div>
</div>






@endsection
