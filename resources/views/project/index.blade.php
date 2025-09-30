<x-app-layout>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Projects</h1>
        
        <div class="flex items-center space-x-4">
            <button class="flex items-center space-x-2 px-4 py-2 border border-gray-300 rounded-lg bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                </svg>
                <span>Filter</span>
            </button>

            @hasanyrole('Admin|Project Director')
                <div x-data="{ openProject: false }">
                    <!-- Trigger Button -->
                    <a href="#" @click.prevent="openProject = true"
                        class="flex items-center space-x-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Create project</span>
                    </a>

                    <!-- Modal Overlay -->
                    <div x-show="openProject" x-transition
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
                        
                        <!-- Modal Box -->
                        <div class="bg-white rounded-2xl shadow-lg w-full max-w-5xl p-8 relative">
                            <!-- Close Button -->
                            <button @click="openProject = false"
                                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✕</button>

                            <h2 class="text-2xl font-bold mb-6">New Project</h2>

                            <form action="
                            {{-- {{ route('projects.store') }} --}}
                             " method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                    <!-- LEFT SIDE -->
                                    <div class="space-y-4">
                                        <!-- Project name -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1">Project</label>
                                            <input type="text" name="project_name" placeholder="Project name..."
                                                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                        </div>

                                        <!-- Date -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1">Date</label>
                                            <div class="flex gap-3">
                                                <input type="date" name="start_date"
                                                    class="w-1/2 border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                                <input type="date" name="end_date"
                                                    class="w-1/2 border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                            </div>
                                        </div>

                                        <!-- Level Project -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1">Level Project</label>
                                            <select name="level"
                                                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                                <option value="Low">Low</option>
                                                <option value="Medium" selected>Medium</option>
                                                <option value="High">High</option>
                                            </select>
                                        </div>

                                        <!-- About Project -->
                                        <div>
                                            <label class="block text-sm font-medium mb-1">About Project</label>
                                            <textarea name="about" placeholder="about project..."
                                                class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300"></textarea>
                                        </div>
                                    </div>

                                    <!-- RIGHT SIDE (SDM) -->
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium mb-1">Project Director</label>
                                            <select name="director" class="w-full border rounded-lg px-3 py-2">
                                                <option>Dodi Saputra</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Engineer Web</label>
                                                <select name="engineer_web" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Bagas</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Analis</label>
                                                <select name="analis" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Septian</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Engineer Android</label>
                                                <select name="engineer_android" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Ahmad</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Content Creator</label>
                                                <select name="content_creator" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Bobi</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Engineer IOS</label>
                                                <select name="engineer_ios" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Riko</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Copywriter</label>
                                                <select name="copywriter" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Agus</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium mb-1">UI/UX</label>
                                                <select name="uiux" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Riko</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Tester</label>
                                                <select name="tester" class="w-full border rounded-lg px-3 py-2">
                                                    <option>Rani</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="flex justify-end gap-4 pt-6">
                                    <button type="button" @click="openProject = false"
                                        class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-100">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-900">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endhasanyrole
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Project Name</th>
                        <th scope="col" class="px-6 py-3">Start Date</th>
                        <th scope="col" class="px-6 py-3">Deadline</th>
                        <th scope="col" class="px-6 py-3">Project Director</th>
                        <th scope="col" class="px-6 py-3">Level</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $project)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-bold text-gray-800">{{ $project['name'] }}</td>
                        <td class="px-6 py-4">{{ $project['start_date'] }}</td>
                        <td class="px-6 py-4">{{ $project['deadline'] }}</td>
                        <td class="px-6 py-4">{{ $project['director'] }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 font-semibold text-xs rounded-full 
                                @if($project['level'] == 'High') bg-red-100 text-red-800 @endif
                                @if($project['level'] == 'Medium') bg-yellow-100 text-yellow-800 @endif
                                @if($project['level'] == 'Low') bg-blue-100 text-blue-800 @endif">
                                {{ $project['level'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 font-semibold text-xs rounded-full
                                @if($project['status'] == 'Running') bg-blue-100 text-blue-800 @endif
                                @if($project['status'] == 'Maintenance') bg-orange-100 text-orange-800 @endif
                                @if($project['status'] == 'To do') bg-gray-200 text-gray-800 @endif">
                                {{ $project['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>