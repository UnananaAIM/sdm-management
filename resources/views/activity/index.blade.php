<x-app-layout>
    {{-- Slot untuk header, jika layout Anda memilikinya --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Bagian Filter --}}
                    <div class="mb-6">
                        <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>
                    </div>

                    {{-- Grid untuk Kartu Karyawan --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($employees as $employee)
                            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition-shadow duration-300">
                                {{-- Info Header Kartu --}}
                                <div class="flex items-center space-x-4 mb-4">
                                    <img class="h-16 w-16 rounded-full object-cover" src="{{ $employee->avatar }}" alt="{{ $employee->name }}">
                                    <div>
                                        <p class="font-bold text-lg text-gray-800">{{ $employee->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $employee->role }}</p>
                                    </div>
                                </div>

                                {{-- Statistik --}}
                                <div class="grid grid-cols-3 gap-4 text-center border-t border-b border-gray-200 py-4 my-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Project</p>
                                        <p class="text-2xl font-bold text-gray-800">{{ $employee->projects }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Tasks done</p>
                                        <p class="text-2xl font-bold text-gray-800">{{ $employee->tasks_done }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Leave entitlement</p>
                                        <p class="text-2xl font-bold text-gray-800">{{ $employee->leave_entitlement }}</p>
                                    </div>
                                </div>

                                {{-- Progress Bar Jam Kerja --}}
                                <div>
                                    <p class="text-sm text-gray-500 mb-2">Work hours</p>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        @php
                                            $progressBarWidth = min($employee->work_hours_percentage, 100);
                                            $progressBarColor = $employee->work_hours_percentage > 100 ? 'bg-red-500' : 'bg-blue-600';
                                        @endphp
                                        <div class="{{ $progressBarColor }} h-2.5 rounded-full" style="width: {{ $progressBarWidth }}%"></div>
                                    </div>
                                    <div class="flex justify-between items-center mt-1">
                                        <span class="text-sm font-medium text-gray-600">{{ $employee->work_hours_percentage }}%</span>
                                        @if ($employee->work_hours_percentage > 100)
                                            <span class="text-xs font-semibold text-red-600 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Over work
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>