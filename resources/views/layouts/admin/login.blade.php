<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/3163/3163478.png" type="image/x-icon">
    <title>Document</title>
</head>
<body class="flex flex-col items-center justify-center w-screen h-screen bg-gray-200 text-gray-700">

	<!-- Component Start -->
	<h1 class="font-bold text-2xl">Welcome Back :)</h1>
	<form class="flex flex-col bg-white rounded shadow-lg p-12 mt-12" method="POST" action="{{ route('login') }}">
        @csrf <!-- Add CSRF token for Laravel form submission -->

        <label class="font-semibold text-xs" for="usernameField">Username or Email</label>
        <input name="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

        @error('email')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <label class="font-semibold text-xs mt-3" for="passwordField">Password</label>
        <input name="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">

        @error('password')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <button type="submit" class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Login</button>
    </form>

	<!-- Component End  -->

</body>
