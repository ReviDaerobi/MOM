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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/src/css/loader.css">
<style>

thead tr th span {
  display: block;
  text-align: center;
}

.dt-column-title {
  text-align: center;
}
.dt-length select {
    margin-left: 0.5rem;
}

.group.selected ul {
  display: block !important;
}

.group.selected i.fa-arrow-right {
  transform: rotate(90deg);
}

#profileDropdown {
  background-color: white; /* Solid background */
  z-index: 50; /* Ensure it's above other content */
}

  .nunito-sans-base {
    font-family: "Nunito Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    font-variation-settings:
      "wdth" 100,
      "YTLC" 500;
  }
  /* En
  sure main content has enough padding to not be covered by the sidebar */

  .sidebar-height {
  height: calc(100vh - 4rem); /* Adjust '4rem' based on the actual height of your navbar */
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

<body class="bg-white nunito-sans-base">
  <div class="container loader">
    <div class="loader"></div>
    <div class="loader"></div>
    <div class="loader"></div>
  </div>

  <header>
    @yield('header')
  </header>
  <div class="h-full flex w-full flex-row">
    <section class="ml-2">

      @yield('sidebar')
    </section>
    <main class=" grow transition-all duration-300 overflow-auto" id="mainContent">

       <!-- Breadcrumb section -->
       <div class="mb-4">
        @yield('breadcrumb')
    </div>
 <!-- Main content -->
 <div>
  @yield('konten')
</div>
      </main>
  </div>

    @stack('scripts')

    <script>
      document.onreadystatechange = function () {
              if (document.readyState !== "complete") {
                  document.querySelector(
                      "body").style.visibility = "hidden";
                  document.querySelector(
                      ".loader").style.visibility = "visible";
              } else {
                  document.querySelector(
                      ".loader").style.display = "none";
                  document.querySelector(
                      "body").style.visibility = "visible";
              }
          };

      
    </script>
    
</body>
</html>