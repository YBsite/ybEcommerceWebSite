@extends('layouts.posts.app')
@section('content')
<div class="m-auto text-center pt-14 pb-5">
    
</div>
<div class="w-full lg:w-2/4 bg-white shadow-md flex flex-col items-center px-3 mx-auto pb-5">
    <form action="/blog" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="p-4 text-center">
        <h1 class="font-bold text-2xl">
          Add new post
        </h1>
      </div>

      <!-- Title -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="title">
          Title
        </label>
        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" type="text" placeholder="Enter title" name="title">
        @error('title')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Description -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="equipe">
          Description
        </label>
        <textarea class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" cols="30" rows="10" id="equipe" type="text" placeholder="Enter a description" name="description"></textarea>
        @error('description')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Post Image -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">
          Post Image
        </label>
        <input type="file" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" name="image">
        @error('image')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <!-- Category -->
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="category">
          Category
        </label>
        <select class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('category') border-red-500 @enderror" id="category" name="category">
          <option value="1">News</option>
          <option value="2">Atlas Lions</option>
          <option value="3">Atlas Lionsses</option>
          <option value="4">Youth</option>
          <option value="5">Futsal</option>
        </select>
        @error('category')
          <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
      </div>

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Add Post</button>
    </form>
</div>
@endsection
