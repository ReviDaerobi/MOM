<div id="sideBar" class="relative hidden flex-col flex-wrap h-screen bg-sidebarColor border-r border-gray-300 p-6 flex-none w-64 md:fixed md:top-0 md:left-0 md:z-30 md:shadow-xl animate__animated">
  <!-- sidebar content -->
  <div class="flex flex-col">
    <ul class="mt-4">
      <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Base</p>
      <li class="mb-1 group active">
        <a href="./index.html" class="flex items-center py-2 px-4 text-gray hover:text-white">
          <i class="fad fa-chart-pie text-xs mr-2"></i>                
          Parameter
        </a>
      </li>
      <li class="mb-1 group">
        <a href="#" class="flex items-center py-2 px-4 text-gray hover:text-white" id="sidebar-dropdown-toggle">
          <i class="fad fa-shopping-cart text-xs mr-2"></i>
          <span>Master</span>
          <i class="fa-solid fa-arrow-right ml-auto group-[.selected]:rotate-90"></i>
        </a>
        <ul class="pl-7 mt-2 hidden group-[.selected]:block" id="sidebar-dropdown">
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-user">list user</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-materi">list materi</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-holding">list holding</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-agency">list agency</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-advertiser">list advertiser</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-brand">list brand</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-flagrate">list flagrate</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-spottype">list spottype</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-channel">list channel</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-category">list category</a>
          </li>
          <li class="mb-3">
            <a class="text-gray-300 text-sm flex items-center" href="/list-settings">list settings</a>
          </li>
        </ul>
      </li>
      <!-- end link -->
    </ul>
    </div>
    <!-- end sidebar content -->
  </div>
  <!-- end sidbar -->
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
          sideBar.classList.add('flex', 'animate__slideInLeft');
          sideBar.classList.remove('animate__slideOutLeft');
          mainContent.classList.add('ml-64'); // shift content right
      } else {
          // Hide sidebar with slideOutLeft animation
          sideBar.classList.remove('animate__slideInLeft');
          sideBar.classList.add('animate__slideOutLeft');
          mainContent.classList.remove('ml-64'); // reset content shift
          // Ensure the sidebar is hidden after the animation ends
          sideBar.addEventListener('animationend', function() {
              if (sideBar.classList.contains('animate__slideOutLeft')) {
                  sideBar.classList.add('hidden');
                  sideBar.classList.remove('flex');
              }
          }, { once: true });
      }
      // Toggle icon
      listIcon.classList.toggle('fa-list-ul');
      listIcon.classList.toggle('fa-xmark');
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