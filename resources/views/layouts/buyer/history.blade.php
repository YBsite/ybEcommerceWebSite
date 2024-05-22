@extends('layouts.buyer.templates.app')

@section('homepage')





<!-- component -->
<div class="container mx-auto px-4 items-center pt-20">
    <!-- Message Component -->
    @if(session('success_message'))
    <div id="toast-success" class="flex items-center justify-between w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="flex items-center">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Item moved successfully.</div>
        </div>
        <button type="button" class="close-button bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    <div class="relative overflow-x-auto">
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2">Order History</h2>
            <!-- Message Section -->
            <div class="flex items-center mb-2">
                <span class="text-gray-600 mr-2">Message:</span>
                <p class="text-gray-700">Your recent orders</p>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>

                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $item)
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}



                    </td>
                    <td class="px-6 py-4">$ {{$item->total_price}}</td>
                    <td class="px-6 py-4">{{$item->quantity}}</td>
                    <td class="px-6 py-4">{{$item->status}}</td>
                    <td class="px-6 py-4">

                       
                    </td>
                          <td class="px-6 py-4">
                          <div class="flex justify-end">
                            <a href="{{ url('/showStatus', $item->id) }}" class="mr-4 text-blue-500 hover:text-blue-700 focus:outline-none">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                    <path d="M6 12H18M18 12L13 7M18 12L13 17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    var closeButton = document.querySelector(".close-button");
    closeButton.addEventListener("click", function() {
        var element = document.getElementById("toast-success");
        element.parentNode.removeChild(element);
    });

    setTimeout(function() {
        var element = document.getElementById("toast-success");
        element.parentNode.removeChild(element);
    }, 6000);
    document.querySelector('.download-btn').addEventListener('click', function() {
    // Send AJAX request to download PDF
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/download-pdf', true);
    xhr.responseType = 'blob';

    xhr.onload = function() {
        if (xhr.status === 200) {
            var blob = new Blob([xhr.response], { type: 'application/pdf' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'invoice.pdf';
            link.click();
        }
    };

    xhr.send();
});
</script>









@endsection
