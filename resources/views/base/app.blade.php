<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
<style>
  /* Ensure main content has enough padding to not be covered by the sidebar */
@media (min-width: 768px) {
  main {
    margin-left: 16rem; /* 64px sidebar width */
  }
}

/* Adjustments for smaller screens */
@media (max-width: 767px) {
  #sideBar {
    position: absolute;
    z-index: 30;
  }
}

</style>
  @stack('styles')
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-baseColor font-mono">

  <header>
    @yield('header')
  </header>
  <div class="h-screen flex flex-row flex-wrap">
    <section>

      @yield('sidebar')
    </section>
    <main class="flex-grow transition-all duration-300 overflow-auto" id="mainContent">

        @yield('konten')
      </main>
  </div>
      @yield('login')

    @stack('scripts')
</body>
</html>