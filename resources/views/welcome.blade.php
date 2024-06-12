@extends('base.app')

@section('konten')
    
    <div class="flex flex-col md:flex-row h-screen">
        <div class="bg-cover bg-center h-full w-full md:w-1/2" style="background-image: url('./src/img/wp_login.jpg')">
            <div class="absolute bottom-0 left-0 p-4 text-white">
                <h2 class="text-2xl font-bold text-center">Media Order Monitoring</h2>
                <p class="text-lg text-center">"Mengawasi dan mengoptimalkan pesanan Anda dengan mudah"</p>
            </div>
        </div>
       
        <div class="md:w-1/2 p-20 grid grid-cols-1 gap-4">
            <div class="mt-24 text-center ">
                <div class="flex items-center mb-2">
                    <img src="./src/img/logo.png" alt="Logo" class="w-8 h-8 mr-2">
                    <h1 class="text-lg font-bold text-gray-900">Moonlord</h1>
                </div>
                <div class="flex items-start mb-2">
                    <h2 class="text-xl text-gray-600">Login Ke Akun Anda</h2>
                </div>
                <div class="flex items-start">

                    <p class="text-gray-500 mt-2">Wujudkan Mimpi Dan Permudah Dengan MOM</p>
                </div>
            </div>
            <form class="w-full max-w-md" action="/dashboard">
                <div class="grid grid-cols-1 gap-4">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Username</label>
                        <input type="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                        <input type="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password">
                    </div>
                    
                    <button type="submit" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-3 w-full rounded focus:outline-none focus-shadow-outline">Log In</button>
                </div>
            </form>
        </div>
    </div>

@endsection