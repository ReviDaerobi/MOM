<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <link rel="stylesheet" href="/src/css/loader.css">
  <style>
      .nunito-sans-base {
    font-family: "Nunito Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 500;
    font-style: normal;
    font-variation-settings:
      "wdth" 100,
      "YTLC" 500;
  }
  </style>
</head>
<body class="bg-gray-100 nunito-sans-base">
  <div class="container loader">
    <div class="loader"></div>
    <div class="loader"></div>
    <div class="loader"></div>
  </div>
  @yield('login')

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
