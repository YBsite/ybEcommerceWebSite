@extends('layouts.admin.app')
@section('dashboard')
<div class="bg-gradient-to-br from-blue-900 via-purple-700 to-pink-500 text-white py-8 rounded-md">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome Back!</h1>
        <p class="text-lg mb-8">We're glad to see you again.</p>
        <!-- Hey emoji with size -->
        <div>
            <span class="text-6xl mb-4" role="img" aria-label="Hey">👋</span>
        </div>
        <!-- Button with Font Awesome icon -->
       <div class="pt-5">
        <a href="categories/create" class="bg-white text-blue-900 py-2 px-4 rounded-lg hover:bg-gray-200 transition duration-300">
            <i class="fas fa-plus-circle mr-2"></i> Add New Category
        </a>
       </div>
    </div>
</div>



<div class="container py-8">
    <h1 class="text-xl container ps-6">
        recent added
    </h1>
</div>

<div class="container w-full max-w-screen-xl mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

    @foreach ($categories as $category)
    <!-- Category Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Category Image -->
        <img class="w-full h-48 object-cover object-center" src="{{asset($category->img)}}" alt="Category Image">
        <div class="p-4">
            <!-- Category Name -->
            <h2 class="text-gray-900 font-bold text-l mb-2">{{ $category->category_name }}</h2>

            <!-- Edit and Delete Buttons -->
            <div class="mt-4 flex items-center justify-between">
                <!-- Edit Button -->
                <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-600 text-white hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold transition duration-300 ease-in-out inline-block text-xs">Edit</a>
                <!-- Delete Button -->

                <a href="#" class="bg-red-600 text-white hover:bg-red-700 px-6 py-3 rounded-lg font-semibold transition duration-300 ease-in-out inline-block text-xs" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category?')) { document.getElementById('deleteCategoryForm{{ $category->id }}').submit(); }" >Delete</a>

<!-- Delete Form (Hidden) -->
<form id="deleteCategoryForm{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
            </div>
        </div>
    </div>
@endforeach


</div>



@endsection
