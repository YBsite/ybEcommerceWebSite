@extends('layouts.admin.app')
@section('dashboard')




@extends('layouts.admin.app')

@section('dashboard')

<div class="container py-8">
    <h1 class="text-xl container ps-6">
        Edit Category
    </h1>
</div>

<div class="container mx-auto px-4">
    <div class="p-2 max-w-md mx-auto my-10 bg-white p-5 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-5">Edit Category</h2>
        <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Use PUT method for update --}}
            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 font-bold mb-2">Category Name</label>
                <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300" required>
            </div>
            <div class="mb-4">
                <label for="img" class="block text-gray-700 font-bold mb-2">Category Image</label>
                <input type="file" name="img" id="img" class="border rounded-lg px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mt-8">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Update Category</button>
            </div>
        </form>
    </div>
</div>

@endsection

@endsection
