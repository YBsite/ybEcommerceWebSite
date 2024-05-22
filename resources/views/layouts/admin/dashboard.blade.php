@extends('layouts.admin.app')
@section('dashboard')

<div class="p-2 bg-gradient-to-br from-blue-900 via-purple-700 to-pink-500 text-white py-8 rounded-md">
    @if(Session::has('success'))
    <div id="successMessage" class="w-full flex items-center justify-center mb-4">
        <div class="bg-gradient-to-br from-green-400 to-green-600 text-white px-4 py-2 rounded-md">
            {{ Session::get('success') }}
        </div>
    </div>
    @endif
    @if(Session::has('danger'))
    <div id="dangerMessage" class="w-full flex items-center justify-center mb-4">
        <div class="bg-gradient-to-br from-red-400 to-red-600 text-white px-4 py-2 rounded-md">
            {{ Session::get('danger') }}
        </div>
    </div>
    @endif

    <h2 class="text-xl font-semibold mb-4">Dashboard</h2>

    <div class="grid grid-cols-3 gap-4">
        <!-- Leads -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Leads</h3>
            <p class="text-xl">{{$approvedOrdersCount}}</p>
        </div>

        <!-- Earnings -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Earnings</h3>
            <p class="text-xl">${{$dailyRevenue}}</p>
        </div>

        <!-- EPC (Earnings Per Click) -->
        <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">EPC</h3>
            <p class="text-xl"> ${{$totalPrice / $approvedOrdersCount}}</p>
        </div>

        <!-- Revenue of the Month -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Revenue (Month)</h3>
            <p class="text-xl">${{$monthlyRevenue}}</p>
        </div>

        <!-- Revenue of the Week -->
        <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Revenue (Week)</h3>
            <p class="text-xl">${{$weeklyRevenue}}</p>
        </div>

        <!-- Revenue of the Year -->
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Revenue (Year)</h3>
            <p class="text-xl">${{ number_format($yearlyRevenue, 2) }}</p>
        </div>

        <!-- Revenue All-time -->
        <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-md p-4">
            <h3 class="text-lg font-semibold mb-2">Revenue (All-time)</h3>
            <p class="text-xl">${{$totalPrice}}</p>
        </div>
    </div>
</div>

<div class="container w-full max-w-screen-xl mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    <!-- Order Table -->
    <div class="col-span-4">
        <h2 class="text-xl font-semibold mb-4">Orders</h2>
        @if ($orders->isEmpty())
            <p class="text-lg text-gray-500">No new orders.</p>
        @else
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping City</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shipping Address</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($orders as $order)
                            <tr class="bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$order->product->product_name}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">$ {{ $order->total_price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->shipping_city }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->shipping_phoneNumber }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->shipping_address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('orders.approve', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md mr-2">
                                            <i class="fas fa-check-circle"></i> Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('orders.decline', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md">
                                            <i class="fas fa-times-circle"></i> Decline
                                        </button>
                                    </form>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex mt-2">
                                    <a href="https://api.whatsapp.com/send?phone={{ $order->shipping_phoneNumber }}&text=🎉 Hello!%0A%0AWe are excited to inform you that your reservation for the product {{ $order->product->product_name }} has been successfully confirmed! 🛍️%0A%0A🕒 Reservation Time: {{ now()->format('F j, Y, g:i a') }}%0A%0AFor any questions or further assistance, feel free to contact us. 😊" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md mr-2"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                                        <a href="tel:{{ $order->shipping_phoneNumber }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md"><i class="fas fa-phone-alt"></i> Call</a>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $orders->links() }} <!-- Pagination links -->
                </div>
            </div>
        @endif
    </div>
</div>


<script>
    // Hide success message after 5 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.remove();
        }
    }, 8000);

    setTimeout(function() {
        var dangerMessage = document.getElementById('dangerMessage');
        if (dangerMessage) {
            dangerMessage.remove();
        }
    }, 5000); // Adjust the timeout duration as needed
</script>

@endsection
