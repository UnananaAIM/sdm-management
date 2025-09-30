<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leave Submission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6">Leave Submission</h3>

                    {{-- Menampilkan pesan sukses jika ada --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            <span class="font-medium">Success!</span> {{ session('success') }}
                        </div>
                    @endif
                    
                    {{-- Menampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                             <span class="font-medium">Oops! Please fix the following errors:</span>
                            <ul class="mt-1.5 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('absent.index') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <!-- Leave Category -->
                            <div>
                                <label for="leave_category" class="block text-sm font-medium text-gray-700 mb-1">Leave Category</label>
                                <select id="leave_category" name="leave_category" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="" disabled selected>Leave Category</option>
                                    @foreach ($leaveCategories as $category)
                                        <option value="{{ $category }}" {{ old('leave_category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date Range -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <input type="date" name="start_date" id="start_date" placeholder="Start" value="{{ old('start_date') }}" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <input type="date" name="end_date" id="end_date" placeholder="End" value="{{ old('end_date') }}" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="description">{{ old('description') }}</textarea>
                            </div>

                            <!-- Radio Buttons -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Do you bring laptop? <span class="text-gray-500 font-normal">(If there is a super urgent matter)</span></p>
                                    <div class="mt-2 flex items-center space-x-6 p-4 border border-gray-200 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="bring_laptop" value="yes" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('bring_laptop') == 'yes' ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700">Yes</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="bring_laptop" value="no" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('bring_laptop') == 'no' ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700">No</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Do you still be Contacted? <span class="text-gray-500 font-normal">(If there is super urgent matter)</span></p>
                                    <div class="mt-2 flex items-center space-x-6 p-4 border border-gray-200 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="can_be_contacted" value="yes" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('can_be_contacted') == 'yes' ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700">Yes</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="can_be_contacted" value="no" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('can_be_contacted') == 'no' ? 'checked' : '' }}>
                                            <span class="ml-3 text-sm text-gray-700">No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex items-center justify-center pt-6 space-x-4">
                               <button type="button" class="px-8 py-2.5 border border-gray-300 bg-white text-gray-700 font-semibold rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </button>
                                <button type="submit" class="px-8 py-2.5 border border-transparent bg-gray-800 text-white font-semibold rounded-lg shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>