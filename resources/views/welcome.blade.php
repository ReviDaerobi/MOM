@extends('base.appLogin')

@section('login')
<div class="flex h-screen bg-white dark:bg-gray-900">
    <!-- Left Side -->
    <div class="relative flex flex-col items-center justify-center w-1/2 bg-cover bg-center overflow-hidden">
        <!-- Heading -->
        <div class="text-center mb-8 z-10">
            <h1 class="text-4xl md:text-lg sm:text-5xl font-bold text-gray-900 dark:text-white">Media Order Monitoring</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-2">Tempat Monitoring Terlengkap Untuk Keperluan Television Anda</p>
        </div>
        <!-- Oval Shapes -->
        <div class="absolute w-full h-full">
            <div class="absolute w-96 h-96 bg-indigo-300 dark:bg-indigo-900 opacity-30 dark:opacity-100 rounded-full blur-xl left-10 top-20"></div>
            <div class="absolute w-72 h-72 bg-blue-300 dark:bg-blue-900 opacity-30 dark:opacity-100 rounded-full blur-xl right-20 top-40"></div>
            <div class="absolute w-64 h-64 bg-purple-300 dark:bg-purple-900 opacity-30 dark:opacity-100 rounded-full blur-xl left-40 bottom-48"></div>
            <div class="absolute w-64 h-64 bg-red-300 dark:bg-red-900 opacity-30 dark:opacity-100 rounded-full blur-xl right-28 bottom-52"></div>
            <div class="absolute w-80 h-80 bg-red-300 dark:bg-red-900 opacity-30 dark:opacity-100 rounded-full blur-xl left-60 top-10"></div>
        </div>
        <!-- 3D Vector Image -->
        <div class="relative z-10">
            <img src="./src/img/file.png" alt="3D Vector" style="width: 35rem; height:35rem" class="md:w-80 md:h-80">
        </div>
    </div>

    <!-- Right Side -->
    <div class="flex items-center justify-center w-1/2">
        <div class="w-1/2 lg:w-full md:w-full p-8">
            <div class="text-center mb-8">
                <img src="/src/img/logo.png" alt="Logo" class="w-12 h-12 mx-auto mb-4">
                <h1 class="md:hidden text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Media Order Monitoring</h1>
                <p class="text-gray-700 dark:text-gray-300 mt-2">Monitoring Anywhere Anytime</p>
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Username</label>
                    <div class="flex">
                        <span class="md:hidden inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </span>
                        <input type="text" id="username" name="username" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username') border-red-700 @enderror" placeholder="Enter your Username" value="{{ old('username') }}">
                    </div>
                    @error('username')
                    <p class="text-red-700 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Password</label>
                    <div class="flex">
                        <span class=" md:hidden inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                            </svg>
                        </span>
                        <input type="password" id="password" name="password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-700 @enderror" placeholder="Enter your password">
                    </div>
                    @error('password')
                    <p class="text-red-700 text-sm italic">{{ $message }}</p>
                    @enderror
                </div>
                <button class="relative inline-flex w-full items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-gray1 to-gray2 group-hover:from-gray1 group-hover:to-gray2 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-gray300 dark:focus:ring-blue-800">
                    <span class="relative px-5 py-2.5 w-full transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Login
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Dark mode toggle -->
<div class="fixed top-4 right-4">
    <button id="theme-toggle" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z"/>
          </svg>
          
          <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
          </svg>
          
    </button>
</div>
<!-- GSAP Animation Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script>
    gsap.fromTo('.absolute div', {opacity: 0, scale: 0.8}, {opacity: 1, scale: 1, duration: 1.5, stagger: 0.2});
    gsap.to('.absolute div', {scale: 1.1, duration: 2, repeat: -1, yoyo: true, ease: "power1.inOut"});
    gsap.fromTo('img', {opacity: 0, y: -50}, {opacity: 1, y: 0, duration: 1.5, delay: 1});
    gsap.to('img', {scale: 1.05, duration: 2, repeat: -1, yoyo: true, ease: "power1.inOut"});
</script>

<!-- Dark Mode Toggle Script -->
<script>
    // Check for saved user theme, if any, on page load
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        document.getElementById('theme-toggle-dark-icon').classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        document.getElementById('theme-toggle-light-icon').classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');
    var darkIcon = document.getElementById('theme-toggle-dark-icon');
    var lightIcon = document.getElementById('theme-toggle-light-icon');

    themeToggleBtn.addEventListener('click', function() {
        // toggle icons inside button
        darkIcon.classList.toggle('hidden');
        lightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });
</script>
@endsection
