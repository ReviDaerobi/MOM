<div id="sideBar" class="mt-5 mb-10 relative hidden flex flex-col bg-white border border-gray-300 p-7 flex-none w-64 md:fixed md:top-0 md:left-0 md:z-30 md:shadow-xl animate__animated sidebar-height">
  <!-- Profile Component -->
  <div class="flex items-center mb-6">
    <div class="w-12 h-12 bg-gray-200 flex-shrink-0">
      <!-- Replace with user's profile photo -->
      <img src="{{ Auth::user()->profileLink ? asset('/storage/' . Auth::user()->profileLink) : 'https://via.placeholder.com/80' }}" alt="Profile Photo" class="w-full h-full object-cover">
    </div>
    <div class="ml-4">
      <h2 class="text-sm text-gray-700 font-semibold">Welcome, {{ Auth::user()->username }}!</h2>
      <h2 class="text-xs text-gray-500">{{ Auth::user()->userAs }}</h2>
    </div>
  </div>

  <!-- Sidebar Content -->
  <div class="flex-grow flex flex-col">
    <ul class="mt-4 flex-grow">
      <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Base</p>
      <li class="mb-1 group active">
        <a href="./index.html" class="flex items-center py-2 px-4 hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300">
          <i class="fad fa-chart-pie text-xs mr-2"></i>                
          Parameter
        </a>
      </li>
      <li class="mb-1 group">
        <a href="#" class="flex items-center py-2 px-4 hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" id="sidebar-dropdown-toggle">
          <i class="fad fa-shopping-cart text-xs mr-2"></i>
          <span>Master</span>
          <i class="fa-solid fa-arrow-right ml-auto group-[.selected]:rotate-90"></i>
        </a>
        <ul class="pl-7 mt-2 hidden group-[.selected]:block" id="sidebar-dropdown">
          <li class="mb-3">
            <a class="text-gray-600 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="/list-user">list user</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="/list-materi">list materi</a>
          </li>
          <!-- Add more links as needed -->
        </ul>
      </li>
      <!-- end link -->
    </ul>
    <div class="mt-auto">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full py-2 px-4 text-gray-700 hover:text-white bg-red-600 hover:bg-red-700 rounded focus:outline-none focus:shadow-outline">
          <i class="fad fa-sign-out-alt text-xs mr-2"></i>
          Logout
        </button>
      </form>
    </div>
  </div>
  <!-- end sidebar content -->
</div>
<!-- end sidebar -->

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  var btn = document.getElementById('sliderBtn');
  var sideBar = document.getElementById('sideBar');
  var listIcon = document.getElementById('list-icon');
  var mainContent = document.getElementById('mainContent');

  // Toggle sidebar
  btn.addEventListener('click', function() {
      if (sideBar.classList.contains('hidden')) {
          // Show sidebar with slideInLeft animation
          sideBar.classList.remove('hidden');
          sideBar.classList.add('flex', 'animate__slideInUp');
          sideBar.classList.remove('animate__slideOutDown');
          mainContent.classList.add('ml-64'); // shift content right
      } else {
          // Hide sidebar with slideOutLeft animation
          sideBar.classList.remove('animate__slideInUp');
          sideBar.classList.add('animate__slideOutDown');
          mainContent.classList.remove('ml-64'); // reset content shift
          // Ensure the sidebar is hidden after the animation ends
          sideBar.addEventListener('animationend', function() {
              if (sideBar.classList.contains('animate__slideOutDown')) {
                  sideBar.classList.add('hidden');
                  sideBar.classList.remove('flex');
              }
          }, { once: true });
      }
      // Toggle icon
      listIcon.classList.toggle('fa-list-ul');
      listIcon.classList.toggle('fa-xmark');
      listIcon.classList.toggle('fa-solid');
  });

  // Dropdown toggle inside sidebar
  document.querySelectorAll('#sidebar-dropdown-toggle').forEach(function(item) {
    item.addEventListener('click', function(e) {
      e.preventDefault();
      var parent = item.closest('.group');
      if (parent.classList.contains('selected')) {
        parent.classList.remove('selected');
      } else {
        document.querySelectorAll('#sidebar-dropdown-toggle').forEach(function(i) {
          i.closest('.group').classList.remove('selected');
        });
        parent.classList.add('selected');
      }
    });
  });
});
</script>
@endpush
