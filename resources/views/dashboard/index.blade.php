@extends("base.app")

@section('sidebar')

<div class="bg-gray-800 w-64 p-4">
    <div class="text-center mb-4">
        <img src="logo.png" alt="Logo" class="w-24 h-24 rounded-full">
        <h1 class="text-white text-xl mt-2">MNC-Client</h1>
    </div>
    <ul class="list-none p-0">
        <li class="mb-2">
            <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                <i class="fas fa-home mr-2"></i> Rate Card
            </a>
        </li>
        <li class="mb-2">
            <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                <i class="fas fa-users mr-2"></i> Master Data
            </a>
            <ul class="ml-8 list-none p-0">
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-user-circle mr-2"></i> List User
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-list-ul mr-2"></i> List Materi
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> List Holding
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-building mr-2"></i> List Agency
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-user-friends mr-2"></i> List Advertiser
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-hashtag mr-2"></i> List brand
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-flag mr-2"></i> List FlagRate
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-map-marker-alt mr-2"></i> List Spot Type
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-sitemap mr-2"></i> Channel
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-tags mr-2"></i> Category
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

@endsection

@section('konten')

@php
    foreach ($datas as $data) {
        echo $data->nama;
    }
@endphp

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/ad1585c3d7.js" crossorigin="anonymous"></script>
<script src="/src/js/app.js"></script>
@endpush