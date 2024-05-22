@extends('layouts.posts.app')
@section('content')

<div class="p-6 flex flex-wrap">
    @forelse ($posts as $item)
    <div class="w-full md:w-1/2 lg:w-1/3 px-2 mb-4">
       
       <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        <a href="#" class="hover:opacity-75">
            <img class="w-full h-48 object-cover" src="/images/{{$item->image_path}}">
        </a>
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$item->category->name}}</a>
            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ strlen($item->title) > 10 ? substr($item->title, 0, 70) . '...' : $item->title }}</a>
            <p href="#" class="text-sm pb-3">
                By <a href="#" class="font-semibold hover:text-gray-800">{{$item->user->name}}</a>, Published on {{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('MMMM Do, YYYY') }}  
            </p>
            <a href="#" class="pb-6">{{ strlen($item->description) > 10 ? substr($item->description, 0, 175) . '...' : $item->description }}</a>
            <a href="/blog/{{$item->slug}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>
       
    </div>
    @empty
                <p class="pt-5">No Posts available.</p>
    @endforelse   
    
    <!-- Repeat the above div structure two more times for the other two divs -->
    <!-- ... -->
</div>
<div class="m-4 text-center">
    {{ $posts->links() }}
</div>


 
@endsection