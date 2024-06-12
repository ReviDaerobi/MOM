<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @stack('styles')
  @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-100 font-mono">
    @yield('sidebar')
    
    @yield('konten')

    @stack('scripts')
</body>
</html>