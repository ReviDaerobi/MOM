<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @stack('styles')
  @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-900 font-mono">

  <div class=" mx-auto flex">
    <header>
      @yield('header')
    </header>

    <section >
      @yield('sidebar')
    </section>
    <main class="flex-grow">
      @yield('konten')
    </main>
  </div>

  @yield('login')

    @stack('scripts')
</body>
</html>