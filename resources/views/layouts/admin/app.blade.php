<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/3163/3163478.png" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:wght@200;400;500;700&family=Rubik:wght@300;400;500;600;700&family=Varela+Round&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
        }
    </style>
</head>
<body>
   <!-- Add a button to toggle navigation visibility -->
   <button id="navToggle" class="lg:hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
    </svg>
</button>

<div class="flex">
    <nav id="mainNav" class="flex flex-col w-64 min-h-screen bg-blue-900 dark:bg-gray-800 hidden lg:flex">
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b border-gray-300 dark:border-gray-700">
            <a href="#" class="text-2xl font-bold text-gray-100 dark:text-gray-200">Market Dashboard</a>
        </div>

        <!-- Navigation links -->
        <ul class="flex flex-col py-4">
            <li class="px-4 py-2 border-b border-gray-300 dark:border-gray-700">
                <a href="/dashboard" class="text-gray-100 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300">Dashboard</a>
            </li>
            <li class="px-4 py-2 border-b border-gray-300 dark:border-gray-700">
                <a href="/dashboard/products" class="text-gray-100 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300">products</a>
            </li>
            <li class="px-4 py-2 border-b border-gray-300 dark:border-gray-700">
                <a href="/dashboard/categories" class="text-gray-100 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300">Categories</a>
            </li>
            <li class="px-4 py-2 border-b border-gray-300 dark:border-gray-700">
                <a href="/dashboard/subcategories" class="text-gray-100 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300">Sub Categories</a>
            </li>

            <li class="px-4 py-2 border-b border-gray-300 dark:border-gray-700">
                <a href="#" class="text-gray-100 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300">Orders</a>
            </li>
        </ul>

        <!-- User profile section -->
        <div class="flex items-center justify-center mt-auto py-4 border-t border-gray-300 dark:border-gray-700">
            <!-- User avatar -->
            <img src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg" class="w-10 h-10 rounded-full" alt="User Avatar">
            <!-- User name -->
            <span class="ml-2 text-gray-100 dark:text-gray-200">{{ Auth::user()->name }}</span>
            <!-- Logout button -->

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button onclick="logout()" class="ml-2 text-xs px-4 py-2 bg-red-500 text-white rounded-md"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
              </form>
        </div>



    </nav>

    <!-- Yield content -->
    <div class="flex flex-col flex-grow">
      <div class="p-2">
        @yield('dashboard')
      </div>
    </div>
</div>




    <script>
        document.getElementById('navToggle').addEventListener('click', function() {
            var nav = document.getElementById('mainNav');
            nav.classList.toggle('hidden');
        });
    </script>

</body>
</html>




