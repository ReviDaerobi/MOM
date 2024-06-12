<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @stack('styles')
  @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-900 font-mono">

  <div class=" mx-auto flex">
    <header style="background-color: #fff">
      @yield('header')
    </header>

    <section >
      @yield('sidebar')
    </section>
    
    <main style="">
      <div class="mt-4">
        <div class="bg-white rounded-lg shadow-md ml-10 p-4">
          @yield('konten')

        </div>

      </div>
    </main>
    
  </div>

    @stack('scripts')
</body>
</html>