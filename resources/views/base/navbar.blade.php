<!-- start navbar -->
<div class="flex items-center justify-between bg-white p-3 border-b border-gray-300">
  <div class="flex">
    <div class="flex-grow text-center md:hidden">
      <strong class="capitalize animate__animated animate__bounce">Media Order Monitoring</strong>
    </div>
    <!-- end title -->
    <!-- hamburger icon -->
    <div class="ml-10 mt-3">
      <button id="sliderBtn" class="text-gray-900">
        <i id="list-icon" class="fad fa-list-ul fa-xl"></i>
      </button>
    </div>
    <!-- end hamburger icon -->
  </div>
    
    <!-- title -->
  <div class="flex-grow text-center">
    <strong class="capitalize animate__animated animate__bounce">Dashboard</strong>
  </div>
  <!-- end title -->

  <!-- profile dropdown -->
  <div class="relative">
    <button id="profileBtn" class="flex items-center text-gray-900 focus:outline-none">
      <i class="fad fa-user-circle fa-2x"></i>
    </button>
    <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg">
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Settings</a>
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
    </div>
  </div>
  <!-- end profile dropdown -->
</div>
<!-- end navbar -->
