<!-- start navbar -->
<div id="navbar" class="sticky top-0 flex items-center justify-between bg-white p-3 border-b border-gray-300 z-50">
  <div class="flex">
    <div class="flex-grow text-center md:hidden">
      <strong class="capitalize animate__animated animate__bounce">Media Order Monitoring</strong>
    </div>
    <!-- end title -->
    <!-- hamburger icon -->
    <div class="ml-10">
      <button id="sliderBtn" class="text-gray-900">
        <i id="list-icon" class="fad fa-list-ul fa-xl"></i>
      </button>
    </div>
    <!-- end hamburger icon -->
  </div>
    
    <!-- title -->
  <div class="flex-grow text-center">
    <strong class="capitalize text-3xl animate__animated animate__bounce">Dashboard</strong>
  </div>
  <!-- end title -->

<!-- profile dropdown -->
<div class="relative">
  <button id="profileBtn" class="flex items-center text-gray-900 focus:outline-none mr-10">
    <i class="fad fa-user-circle fa-2x"></i>
  </button>
  <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-300 rounded shadow-lg z-50">
    <div class="p-4 bg-[url('/public/src/img/media.jpg')] bg-cover shadow-md">
      <a href="#" id="uploadPhotoLink">
        <img src="{{ Auth::user()->profileLink ? asset('/storage/' . Auth::user()->profileLink) : 'https://via.placeholder.com/80' }}" alt="Profile Picture" class="w-20 h-20 rounded-full mx-auto object-cover">
      </a>
    </div>
    <div class="border-t border-gray-300"></div>
    <div class="p-4 bg-white">
      <a href="#" id="profileLink" class="flex items-center text-gray-800 hover:bg-gray-100 p-2 rounded">
        <i class="fad fa-user mr-2"></i> Profile
      </a>
      <a href="#" class="flex items-center text-gray-800 hover:bg-gray-100 p-2 rounded">
        <i class="fad fa-cog mr-2"></i> Settings
      </a>
      <form action="{{ route('profile.uploadPhoto') }}" method="POST" enctype="multipart/form-data" id="uploadPhotoForm" class="hidden">
        @csrf
        <input type="file" name="photo" id="photoInput" accept="image/*" class="hidden">
      </form>
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="flex w-full items-center text-gray-800 hover:bg-gray-100 p-2 rounded">
          <i class="fad fa-sign-out-alt mr-2"></i>Logout
        </button>
      </form>  
    </div>
  </div>
</div>
</div>
<!-- end navbar -->

<!-- Profile Edit Modal -->
<div id="profileModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white rounded-lg w-1/3 p-6">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-bold">Edit Profile</h2>
      <button id="closeModal" class="text-gray-600 hover:text-gray-900">&times;</button>
    </div>
    <form action="{{ route('profile.update') }}" method="POST">
      @csrf
      <div class="mt-4">
        <label for="username" class="block text-gray-700">Username</label>
        <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" class="w-full px-3 py-2 border border-gray-300 rounded">
      </div>

      <div class="mt-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="w-full px-3 py-2 border border-gray-300 rounded">
      </div>
      <div class="mt-6 flex justify-end">
        <button type="button" id="closeModalButton" class="mr-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');
    const profileModal = document.getElementById('profileModal');
    const closeModal = document.getElementById('closeModal');
    const closeModalButton = document.getElementById('closeModalButton');
    const profileLink = document.getElementById('profileLink');

    profileBtn.addEventListener('click', function() {
      if (profileDropdown.classList.contains('hidden')) {
        profileDropdown.classList.remove('hidden');
        gsap.fromTo(profileDropdown, {opacity: 0, y: -20}, {opacity: 1, y: 0, duration: 0.3});
      } else {
        gsap.to(profileDropdown, {opacity: 0, y: -20, duration: 0.3, onComplete: () => {
          profileDropdown.classList.add('hidden');
        }});
      }
    });

    document.addEventListener('click', function(event) {
      if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
        if (!profileDropdown.classList.contains('hidden')) {
          gsap.to(profileDropdown, {opacity: 0, y: -20, duration: 0.3, onComplete: () => {
            profileDropdown.classList.add('hidden');
          }});
        }
      }
    });

    profileLink.addEventListener('click', function(event) {
      event.preventDefault();
      profileModal.classList.remove('hidden');
      gsap.fromTo(profileModal, {opacity: 0, y: -20}, {opacity: 1, y: 0, duration: 0.3});
    });

    closeModal.addEventListener('click', function() {
      gsap.to(profileModal, {opacity: 0, y: -20, duration: 0.3, onComplete: () => {
        profileModal.classList.add('hidden');
      }});
    });

    closeModalButton.addEventListener('click', function() {
      gsap.to(profileModal, {opacity: 0, y: -20, duration: 0.3, onComplete: () => {
        profileModal.classList.add('hidden');
      }});
    });

    window.addEventListener('scroll', function() {
      if (window.scrollY > 0) {
        gsap.to(navbar, {y: -10, duration: 0.3});
      } else {
        gsap.to(navbar, {y: 0, duration: 0.3});
      }
    });
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const uploadPhotoLink = document.getElementById('uploadPhotoLink');
    const photoInput = document.getElementById('photoInput');
    const uploadPhotoForm = document.getElementById('uploadPhotoForm');

    uploadPhotoLink.addEventListener('click', function(event) {
      event.preventDefault();
      photoInput.click();
    });

    photoInput.addEventListener('change', function() {
      if (photoInput.files.length > 0) {
        uploadPhotoForm.submit();
      }
    });
  });
</script>
