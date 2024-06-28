@extends('base.appLogin')

@section('login')
<div class="h-screen bg-cover bg-center md:bg-white md:bg-[url('')] bg-[url('/public/src/img/studio.jpg')]">
    <div class="flex h-full md:flex-row">
        <!-- Left Side -->
        <div class="w-full md:w-1/2 flex items-center justify-center">
            <div class="bg-opacity-10 backdrop-blur-sm w-full max-w-md p-8 bg-white rounded-lg shadow-md md:shadow-none sm:m-0 ">
                <div class="text-center mb-8">
                    <img src="/src/img/logo.png" alt="Logo" class="w-12 h-12 mx-auto mb-4">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Media Order Monitoring</h1>
                    <p class="text-gray-500 mt-2">Monitoring Anywhere Anytime</p>
                </div>
                <form action="/login" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                        <input type="text" id="username" name="username" class="hover:scale-105 hover:-translate-y-1 transform transition duration-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-dangerColor @enderror" placeholder="Enter your Username" value="{{ old('username') }}">
                        @error('username')
                            <p class="text-dangerColor text-xs italic"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6 relative">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                        <div class="relative hover:scale-105 hover:-translate-y-1 transform transition duration-300">
                            <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-dangerColor @enderror" placeholder="Enter your password">
                            <button type="button" class="absolute right-3 top-2">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-dangerColor text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-gray600 hover:scale-105 hover:-translate-y-1 transform transition duration-300 text-white font-bold py-2 px-4 w-full rounded focus:outline-none focus:shadow-outline">Login</button>
                </form>
            </div>
        </div>
        <!-- Right Side -->
        <div class="hidden md:flex md:w-1/2 bg-cover bg-center" style="background-image: url('/src/img/studio.jpg')">
            <div class="flex items-center justify-center w-full h-full bg-opacity-50 bg-black">
                <h1 class="text-3xl md:text-5xl font-bold text-white">Welcome Back!</h1>
            </div>
        </div>
    </div>
</div>
@endsection
