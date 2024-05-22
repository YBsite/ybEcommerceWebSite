<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Apply 'auth' middleware to create and edit methods
        $this->middleware('auth')->only(['create', 'edit']);
    }
    public function index()
    {
        return view('layouts.interviews.index')->with('interviews', Interview::latest()->paginate(6));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.interviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jped|max:5048',
            'video'=>'required'
        ]);

        $slug = Str::slug($request->title,'-');
        $newImageName = uniqid().'-'.$slug.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
        
        Interview::create([
            'title' =>$request->input('title'),
            'description' =>$request->input('description'),
            'slug'=>$slug,
            'image'=>$newImageName,
            'user_id'=>auth()->user()->id,
            'video_src'=>$request->input('video')
        ]);
        return redirect('/interviews'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        return view('layouts.interviews.show')
        ->with('interviews',Interview::where('slug',$slug)->first());
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        return view('layouts.interviews.edit')
        ->with('interviews',Interview::where('slug',$slug)->first());
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jped|max:5048',
            'video'=>'required'
        ]);
        $newImageName = uniqid().'-'.$slug.'.'.$request->image->extension();
        $request->image->move(public_path('images'),$newImageName);
    
        Interview::where('slug',$slug)->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image'=>$newImageName,
            'slug'=>$slug,
            'video_src'=>$request->input('video'),
            'user_id'=>auth()->user()->id,
        ]);
        return redirect('/interviews/' .$slug)->with('message','updated succefuly');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        Interview::where('slug',$slug)->delete();
        return redirect('/interviews/')->with('message','the post has deleted');  
    }
}
