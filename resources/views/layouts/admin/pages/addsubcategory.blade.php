@extends('layouts.admin.app')
@section('dashboard')








<div class="container mx-auto px-4">
    <div class="p-2 max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-5">Add New Subcategory</h2>
        <form method="POST" action="{{ route('subcategories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-bold mb-2">Select Category</label>
                <select name="category_id" id="category_id" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="subcategory_name" class="block text-gray-700 font-bold mb-2">Subcategory Name</label>
                <input type="text" name="subcategory_name" id="subcategory_name" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
                @error('subcategory_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="img" class="block text-gray-700 font-bold mb-2">Subcategory Image</label>
                <input type="file" name="img" id="img" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                @error('img')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-8">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Add Subcategory</button>
            </div>
        </form>
    </div>
</div>





@endsection
