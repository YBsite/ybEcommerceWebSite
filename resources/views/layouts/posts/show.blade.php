@extends('layouts.posts.app')
@section('content')
<section class="w-3/4 flex flex-col items-center px-3 mx-auto">

    <div class=" p-6 ">
        
    </div>
    <div class="w-full px-2 mb-4">
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img class="w-full" src="/images/{{$post->image_path}}" alt="{{$post->title}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post->category->name}}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                <p class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{ \Carbon\Carbon::parse($post->updated_at)->isoFormat('MMMM Do, YYYY') }}  
                </p>
                <p class="pb-6">{{$post->description}}</p>
                @if (Auth::user() && Auth::user()->id == $post->user_id)
                <div class="flex space-x-4">
                    <!-- Edit Button -->
                    <a  href="/blog/{{$post->slug}}/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                
                    <!-- Delete Button -->
                    <form action="/blog/{{$post->slug}}" method="post" class="inline-block">@csrf @method('delete')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center">
                            <i class="fas fa-trash-alt mr-2"></i> Delete
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </article>
    </div>
    

    

    

    

    

     

 </section>

@endsection




