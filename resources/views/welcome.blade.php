@extends('base.appLogin')

@section('login')
<div class="flex h-screen">
    <!-- Left Side -->
    <div class="w-full md:w-1/2 flex items-center justify-center bg-white">
        <div class="w-full max-w-md p-8">
            <div class="text-center mb-8">
                <img src="/src/img/logo.png" alt="Logo" class="w-12 h-12 mx-auto mb-4">
                <h1 class="text-3xl font-bold text-gray-900">Media Order Monitoring</h1>
                <p class="text-gray-500 mt-2">Monitoring Anywhere Anytime</p>
            </div>
            <form action="/list-user" method="get">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your Username">
                </div>
                <div class="mb-6 relative">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
                    <button type="button" class="absolute right-3 top-10">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">Login</button>
                <div class="text-center my-4 text-gray-500">OR</div>
                <div class="flex justify-between">
                    <button type="button" class="flex items-center justify-center bg-white border border-gray-300 rounded py-2 px-4 w-1/2 mr-2">
                        <img src="/src/img/logo.png" alt="Google" class="w-5 h-5 mr-2">
                        Google
                    </button>
                    <button type="button" class="flex items-center justify-center bg-white border border-gray-300 rounded py-2 px-4 w-1/2 ml-2">
                        <img src="/src/img/logo.png" alt="Apple" class="w-5 h-5 mr-2">
                        Apple
                    </button>
                </div>
            </form>
            <div class="text-center mt-4 text-gray-500">
                Don't Have An Account? <a href="#" class="text-blue-500">Sign Up</a>
            </div>
        </div>
    </div>
    <!-- Right Side -->
    <div class="hidden md:flex md:w-1/2 bg-cover bg-center" style="background-image: url('/src/img/wp_login.jpg');">
        <div class="flex items-center justify-center w-full h-full bg-opacity-50 bg-black">
            <h1 class="text-5xl font-bold text-white">Welcome Back!</h1>
        </div>
    </div>
</div>
@endsection
