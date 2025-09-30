<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Human Resources Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    <!-- Header Aksi dan Filter -->
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
                        <div class="flex items-center gap-4 w-full md:w-auto">
                            <!-- Search Input -->
                            <div class="relative flex-grow">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input type="search" placeholder="Search SDM" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <!-- Filter Dropdown -->
                             <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option>Filter by divisi</option>
                                @foreach($divisionFilters as $filter)
                                <option value="{{ $filter }}">{{ $filter }}</option>
                                @endforeach
                            </select>
                        </div>
                         <!-- Tombol Add New -->
                        <div x-data="{ open: false }">
                            <!-- Tombol Trigger -->
                            <button @click="open = true"
                                class="w-full md:w-auto flex-shrink-0 inline-flex items-center justify-center px-4 py-2 
                                    bg-gray-800 border border-transparent rounded-md font-semibold text-white 
                                    hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                                    focus:ring-gray-800 transition ease-in-out duration-150">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Add New SDM
                            </button>

                            <!-- Modal Overlay -->
                            <div x-show="open"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
                                x-transition>
                                <!-- Modal Box -->
                                <div class="bg-white rounded-2xl shadow-lg w-full max-w-3xl p-8 relative">
                                    <!-- Tombol Close -->
                                    <button @click="open = false"
                                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                                        ✕
                                    </button>

                                    <h2 class="text-2xl font-bold mb-6">Create New Account</h2>

                                    <form action="
                                    {{-- {{ route('') }} --}}
                                     " method="POST" class="space-y-6">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Username -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Username</label>
                                                <input type="text" name="username" placeholder="Enter username"
                                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                            </div>

                                            <!-- Password -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Password</label>
                                                <input type="password" name="password" placeholder="Enter password"
                                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                            </div>

                                            <!-- Email -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Email</label>
                                                <input type="email" name="email" placeholder="Enter email"
                                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                            </div>

                                            <!-- Confirm Password -->
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Confirm Password</label>
                                                <input type="password" name="password_confirmation" placeholder="Confirm password"
                                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                            </div>

                                            <!-- Division -->
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium mb-1">Division</label>
                                                <select name="division" class="w-full border rounded-lg px-3 py-2">
                                                    <option value="">Select division</option>
                                                    <option value="HR">HR</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="Tech">Tech</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Button -->
                                        <div class="flex justify-center pt-4">
                                            <button type="submit"
                                                class="px-6 py-3 bg-black text-white rounded-lg font-semibold hover:bg-gray-900">
                                                Create Account
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($sdmList as $sdm)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sdm->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sdm->division }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $sdm->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $sdm->role }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="px-4 py-1 text-sm text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No data available.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
