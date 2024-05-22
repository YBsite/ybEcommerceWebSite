<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;
use App\Models\Fixture;
use App\Models\Interview;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

use App\Models\Cart;
use App\Models\Category;

class PagesController extends Controller
{

    public function index() {
        $cartLength = Cart::count();
        $products = Product::latest()->paginate(4);
        $elec = Product::where('category_id', 1) // Assuming category ID for "electronic" is 1
        ->latest()
        ->paginate(4);

        return view('layouts.buyer.home',compact('products','cartLength','elec'));
    }
    public function allProducts(){
        $products = Product::latest()->paginate(4);
        return view('layouts.buyer.allproducts',compact('products'));
    }

    public function downloadPDF()
{
    // Render the blade file as HTML
    $html = view('invoice')->render();

    // Generate PDF from HTML using Dompdf
    $pdf = PDF::loadHTML($html);

    // Download the PDF file
    return $pdf->download('invoice.pdf');
}



    public function showLogin(){
        return view('layouts.guest.login');
    }
    public function showRegister(){
        return view('layouts.guest.register');
    }
    public function register(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    // Create a new user
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
    ]);
    $bloggerRole = Role::where('name', 'buyer')->first();
    if ($bloggerRole) {
        $user->roles()->attach($bloggerRole, ['user_type' => 'App\User']);

    }

    // Optionally, log the user in after registration
    Auth::login($user);

    // Redirect or return a response as needed
    return redirect()->route('home')->with('success', 'Registration successful!');

    // You can replace 'home' with the name of the route you want to redirect to after registration.
}

    public function bloggerLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to home route
            return redirect()->route('home');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function About(){
        return view('layouts.guest.about');
    }
    public function singleProduct($id)
    {
        $products = Product::findOrFail($id);
        return view('layouts.buyer.singleproduct',compact('products'));
    }
    public function singleCategorie($id)
    {
        $products = Product::where('category_id', $id)->latest()->paginate(4);
        $category = Category::findOrFail($id);


        return view('layouts.buyer.singlecategorie',compact('products','category'));
    }
}
