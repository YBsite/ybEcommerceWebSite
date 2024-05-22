<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fixture;
use App\Models\Interview;
use App\Models\Order;
use App\Models\Post;
use App\Models\Role;
use Carbon\Carbon;

class AdminAuthController extends Controller
{

    public function create()
    {
        return view('layouts.admin.register');
    }

    public function store(Request $request)
    {
        // Validation rules can be adjusted according to your needs
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $adminRole = Role::where('name', 'admin')->first();

if ($adminRole) {
    $user->roles()->attach($adminRole, ['user_type' => 'admin']);

    // Role 'admin' is now attached to the user
} else {
    // Handle if the role doesn't exist
}

        // You can customize the logic after registration (e.g., redirecting to a dashboard)
        // For instance:
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function showLogin(){
        return view('layouts.admin.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function DashboardPage(){

       // Retrieve posts with pagination



        $orders = Order::where('status', 'pending')->paginate(4);

        $orders_item = Order::where('status', 'approved')->get();
    $totalPrice = $orders_item->sum('total_price'); // Calculate the total price
    $approvedOrdersCount = $orders_item->count();
    $currentMonth = Carbon::now()->month;
    $currentYear = Carbon::now()->year;

    // Calculate total revenue for approved orders in the current month
    $monthlyRevenue = Order::where('status', 'approved')
                           ->whereMonth('created_at', $currentMonth)
                           ->whereYear('created_at', $currentYear)
                           ->sum('total_price');
                           $startOfWeek = Carbon::now()->startOfWeek();
                           $endOfWeek = Carbon::now()->endOfWeek();

                           // Calculate total revenue for approved orders in the current week
    $weeklyRevenue = Order::where('status', 'approved')
                                                 ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                                                 ->sum('total_price');
                                                 $currentYear = Carbon::now()->year;

                                                 // Calculate total revenue for approved orders in the current year
                                                 $yearlyRevenue = Order::where('status', 'approved')
                                                                       ->whereYear('created_at', $currentYear)
                                                                       ->sum('total_price');
                                                                       $currentDate = Carbon::now()->toDateString();

                                                                       // Calculate total revenue for approved orders on the current day
                                                                       $dailyRevenue = Order::where('status', 'approved')
                                                                                            ->whereDate('created_at', $currentDate)
                                                                                            ->sum('total_price');



        return view('layouts.admin.dashboard', compact('orders','totalPrice', 'approvedOrdersCount','monthlyRevenue','weeklyRevenue','yearlyRevenue','dailyRevenue'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the user
        $user->delete();

        return redirect()->route('dashboard');
    }
}


