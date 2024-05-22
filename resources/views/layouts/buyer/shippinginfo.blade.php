@extends('layouts.buyer.templates.app')
@section('homepage')

<div class="bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-3xl mx-auto p-8">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Checkout</h1>

            <!-- Shipping Address Form -->
            <form action="{{ route('shipping.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Shipping Address</h2>

                    <div class="mt-4">
                        <label for="phone_number" class="block text-gray-700 dark:text-white mb-1">Phone Number</label>
                        <input type="tel" id="phone_number" name="phone_number" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none" placeholder="e.g. +1234567890">
                    </div>

                    <div class="mt-4">
                        <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label>
                        <input type="text" id="address" name="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                    </div>

                    <div class="mt-4">
                        <label for="city" class="block text-gray-700 dark:text-white mb-1">City</label>
                        <input type="text" id="city" name="city_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="postal_code" class="block text-gray-700 dark:text-white mb-1">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                        </div>
                        <div>
                            <label for="state" class="block text-gray-700 dark:text-white mb-1">State</label>
                            <input type="text" id="state" name="state" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-700 dark:bg-teal-600 dark:text-white dark:hover:bg-teal-900">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
