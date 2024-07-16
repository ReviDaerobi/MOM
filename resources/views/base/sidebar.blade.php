<div id="sideBar" class="mt-5 mb-10 relative {{ session('just_logged_in') ? 'hidden' : 'flex' }} flex-col bg-white border border-gray-300 p-7 flex-none md:z-30 md:shadow-xl animate__animated h-full md:h-auto ">
  <!-- Profile Component -->
  <div class="flex items-center mb-6">
    <div class="w-12 h-12 bg-gray-200 flex-shrink-0">
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
      <li class="mb-1 group">
        <a href="/list-flagrate" class="flex items-center py-2 px-4 hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" id="sidebar-dropLeft-toggle-1">
          <i class="fad fa-chart-pie text-xs mr-2"></i>                
          <span>Parameter</span>
          <i class="fa-solid fa-arrow-right ml-auto group-[.selected]:rotate-90"></i>
        </a>
        <ul class="pl-7 mt-2 hidden group-[.selected]:block" id="sidebar-dropLeft-1">
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300 sidebar-link" data-title="Parameter" href="/list-flagrate">
              <i class="fa-solid text-sm mr-2 fa-money-bill"></i>
              <span>list flagrate</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="mb-1 group">
        <a href="#" class="flex items-center py-2 px-4 hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" id="sidebar-dropLeft-toggle-2">
          <i class="fad fa-shopping-cart text-xs mr-2"></i>
          <span>Master</span>
          <i class="fa-solid fa-arrow-right ml-auto group-[.selected]:rotate-90"></i>
        </a>
        <ul class="pl-7 mt-2 hidden group-[.selected]:block" id="sidebar-dropLeft-2">
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300 sidebar-link" data-title="Master" href="/list-user">
              <i class="fa-solid fa-user text-xs mr-2"></i>
              <span>List User</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2  text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="/list-materi">
              <i class="fa-solid fa-file-video text-xs mr-2"></i>
              <span>list materi</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2  text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-holding">
              <i class="fa-solid text-sm mr-2 fa-user-tie"></i>
              <span>list holding</span>  
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-agency">
              <i class="fa-solid text-sm mr-2 fa-building"></i>
              <span>list agency</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-advertiser">
              <i class="fa-solid text-sm mr-2 fa-rectangle-ad"></i>
              <span>list advertiser</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-brand">
              <i class="fa-solid text-sm mr-2 fa-copyright"></i>
              <span>list brand</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-spottype">
              <i class="fa-solid text-sm mr-2 fa-video"></i>
              <span>list spottype</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-channel">
              <i class="fa-solid text-sm mr-2 fa-tv"></i>
              <span>list channel</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-category">
              <i class="fa-solid text-sm mr-2 fa-layer-group"></i>
              <span>list category</span>
            </a>
          </li>
          <li class="mb-3">
            <a class="text-gray-600 py-2 px-2 ml-2 text-sm flex items-center hover:text-gray-600 hover:bg-gray-200 rounded transition-all duration-300" href="list-settings">
              <i class="fa-solid text-sm mr-2 fa-wrench"></i>
              <span>list settings</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- end link -->
    </ul>
    <div class="mt-auto">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full text-center py-2 px-2 text-gray-700 hover:scale-105 hover:-translate-y-1 transform transition duration-300 hover:bg-gray300 rounded focus:outline-none focus:shadow-outline">
          <i class="fad fa-sign-out-alt mr-1"></i>
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

    // Restore the state of the sidebar and dropdowns from session storage
    if (sessionStorage.getItem('sidebarOpen') === 'true') {
        sideBar.classList.remove('hidden');
        sideBar.classList.add('flex', 'animate__slideInLeft');
        listIcon.classList.remove('fa-list-ul');
        listIcon.classList.add('fa-xmark');
    }

    // Restore the state of dropdowns
    document.querySelectorAll('[id^="sidebar-dropLeft-toggle"]').forEach(function(item) {
        var dropdownId = item.id;
        if (sessionStorage.getItem(dropdownId) === 'true') {
            var parent = item.closest('.group');
            parent.classList.add('selected');
            item.nextElementSibling.classList.add('block');
        }
    });

    // Toggle sidebar
    btn.addEventListener('click', function() {
        if (sideBar.classList.contains('hidden')) {
            sideBar.classList.remove('hidden');
            sideBar.classList.add('flex', 'animate__slideInLeft');
            sideBar.classList.remove('animate__slideOutLeft');
            listIcon.classList.remove('fa-list-ul');
            listIcon.classList.add('fa-xmark');
            sessionStorage.setItem('sidebarOpen', 'true');
        } else {
            sideBar.classList.remove('animate__slideInLeft');
            sideBar.classList.add('animate__slideOutLeft');
            mainContent.classList.remove('ml-64'); // reset content shift
            sideBar.addEventListener('animationend', function() {
                if (sideBar.classList.contains('animate__slideOutLeft')) {
                    sideBar.classList.add('hidden');
                    sideBar.classList.remove('flex');
                    listIcon.classList.remove('fa-xmark');
                    listIcon.classList.add('fa-list-ul');
                    sessionStorage.setItem('sidebarOpen', 'false');
                }
            }, { once: true });
        }
    });

    // DropLeft toggle inside sidebar
    document.querySelectorAll('[id^="sidebar-dropLeft-toggle"]').forEach(function(item) {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            var parent = item.closest('.group');
            var dropdownId = item.id;
            if (parent.classList.contains('selected')) {
                parent.classList.remove('selected');
                sessionStorage.setItem(dropdownId, 'false');
            } else {
                document.querySelectorAll('#sidebar-dropLeft-toggle').forEach(function(i) {
                    i.closest('.group').classList.remove('selected');
                    sessionStorage.setItem(i.id, 'false');
                });
                parent.classList.add('selected');
                sessionStorage.setItem(dropdownId, 'true');
            }
        });
    });

    // Check if session variable exists
    @if(session('just_logged_in'))
        // Clear session variable
        @php
            session()->forget('just_logged_in');
        @endphp

        // Sidebar should be hidden initially
        sideBar.classList.add('hidden');
        sideBar.classList.remove('flex');
        listIcon.classList.add('fa-list-ul');
        listIcon.classList.remove('fa-xmark');
    @endif

    // Open sidebar when a link is clicked
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', () => {
            sideBar.classList.remove('hidden');
            sideBar.classList.add('flex', 'animate__slideInLeft');
            listIcon.classList.remove('fa-list-ul');
            listIcon.classList.add('fa-xmark');
            sessionStorage.setItem('sidebarOpen', 'true');
        });
    });
});
</script>
@endpush
