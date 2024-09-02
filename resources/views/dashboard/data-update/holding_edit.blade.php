@extends('base.app')

@section('konten')
<div class="container mx-auto px-4 py-8">
    <form action="{{ route('holding.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{ $user->username }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="fullname" id="fullname" value="{{ $user->fullname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                <select name="position" id="position" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="Admin" {{ $user->position == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Sales Admin" {{ $user->position == 'Sales Admin' ? 'selected' : '' }}>Sales Admin</option>
                    <option value="Agencies" {{ $user->position == 'Agencies' ? 'selected' : '' }}>Agencies</option>
                </select>
            </div>
            
            <div>
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <select name="level" id="level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="Admin" {{ $user->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Sales Admin" {{ $user->level == 'Sales Admin' ? 'selected' : '' }}>Sales Admin</option>
                    <option value="Agencies" {{ $user->level == 'Agencies' ? 'selected' : '' }}>Agencies</option>
                </select>
            </div>
            
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="Admin" {{ $user->type == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="TV" {{ $user->type == 'TV' ? 'selected' : '' }}>TV</option>
                    <option value="Agencies" {{ $user->type == 'Agencies' ? 'selected' : '' }}>Agencies</option>
                </select>
            </div>
        </div>
        
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Agencies</label>
            <div class="flex space-x-4">
                <div class="w-1/3 bg-gray-100 p-4 rounded-md">
                    <h3 class="font-semibold mb-2">Available Agencies</h3>
                    <ul id="availableAgencies" class="space-y-2">
                        @foreach($availableAgencies as $agency)
                            <li class="flex items-center">
                                <input type="checkbox" id="agency{{ $agency->id }}" value="{{ $agency->id }}" class="mr-2">
                                <label for="agency{{ $agency->id }}">{{ $agency->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="w-1/3 flex flex-col justify-center items-center">
                    <button type="button" id="addAgency" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-2">Add &rarr;</button>
                    <button type="button" id="removeAgency" class="bg-red-500 text-white px-4 py-2 rounded-md">&larr; Remove</button>
                </div>
                
                <div class="w-1/3 bg-gray-100 p-4 rounded-md">
                    <h3 class="font-semibold mb-2">Selected Agencies</h3>
                    <ul id="selectedAgencies" class="space-y-2">
                        {{-- @foreach($user->AgenciesToBeHoldname as $agency)
                            <li class="flex items-center">
                                <input type="checkbox" id="selectedAgency{{ $agency->id }}" name="agencies[]" value="{{ $agency->id }}" checked class="mr-2">
                                <label for="selectedAgency{{ $agency->id }}">{{ $agency->name }}</label>
                            </li>
                        @endforeach --}}
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Update User
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('addAgency');
    const removeButton = document.getElementById('removeAgency');
    const availableAgencies = document.getElementById('availableAgencies');
    const selectedAgencies = document.getElementById('selectedAgencies');

    addButton.addEventListener('click', function() {
        moveItems(availableAgencies, selectedAgencies);
    });

    removeButton.addEventListener('click', function() {
        moveItems(selectedAgencies, availableAgencies);
    });

    function moveItems(from, to) {
        const checkedItems = from.querySelectorAll('input[type="checkbox"]:checked');
        checkedItems.forEach(item => {
            const li = item.parentElement;
            item.checked = false;
            if (to.id === 'selectedAgencies') {
                item.name = 'agencies[]';
            } else {
                item.name = '';
            }
            to.appendChild(li);
        });
    }
});
</script>
@endsection