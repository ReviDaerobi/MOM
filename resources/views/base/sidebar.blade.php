@extends('base.app')

<div class="flex" x-data="{ open: false }">
    <button @click="open = !open" class="p-2 bg-blue-500 text-white">
        <i :class="{ 'fa-bars': !open, 'fa-times': open }" class="fas"></i>
    </button>
    <div :class="{'w-64' : open, 'w-0': !open}" class="bg-gray-800 w-64 p-4 h-screen overflow-auto transition-all duration-300">
        <div class="text-center mb-4 flex">
            <img src="src/img/logo.png" alt="Logo" class="w-14 h-14 rounded-full">
            <h1 class="text-white text-xl mt-2 ml-4">MNC-Client</h1>
        </div>
        <ul class="list-none p-0 mt-10" >
            <li class="mb-2">
                <a href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                    <i class="fas fa-home mr-2"></i> Parameter
                </a>
            </li>
            <li x-data="{ open: false }" class="mb-2" id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" >
                <a @click="open = !open" href="#" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                    <i class="fas fa-users mr-2"></i> Master Data
                </a>
                <ul :class="{'block opacity-100 scale-100 transform translate-y-0': open, 'hidden opacity-0 scale-0 -translate-y-2': !open}" class="hidden ml-8 list-none p-7 bg-gray-800 transition-all duration-300 origin-top" id="dropdownHover">
                    <li class="mb-2">
                        <a href="/list-user" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-user-circle mr-2"></i> List User
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-materi" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-list-ul mr-2"></i> List Materi
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-holding" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-file-alt mr-2"></i> List Holding
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-agency" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-building mr-2"></i> List Agency
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-advertiser" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-user-friends mr-2"></i> List Advertiser
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-brand" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-hashtag mr-2"></i> List brand
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-flagrate" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-flag mr-2"></i> List FlagRate
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-spottype" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-map-marker-alt mr-2"></i> List Spot Type
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-channel" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-sitemap mr-2"></i> Channel
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-category" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-tags mr-2"></i> Category
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/list-settings" class="block px-4 py-2 text-gray-400 hover:bg-gray-700 hover:text-white rounded-md">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    </div>