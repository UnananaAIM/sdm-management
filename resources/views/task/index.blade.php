<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-4">
                <div class="relative"><input type="date" class="bg-white border border-gray-300 text-gray-700 py-1.5 px-4 rounded-lg"></div>
            </div>
            
            <div class="flex items-center space-x-2">
                @hasanyrole('Admin|Project Director')
                    <div x-data="{ openCreate: false }">
                        <!-- Tombol Trigger -->
                        <button @click="openCreate = true"
                            class="flex items-center px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Task
                        </button>

                        <!-- Modal Overlay -->
                        <div x-show="openCreate" x-transition
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
                            
                            <!-- Modal Box -->
                            <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 relative">
                                <!-- Tombol Close -->
                                <button @click="openCreate = false"
                                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✕</button>

                                <h2 class="text-xl font-bold mb-4">Create Task</h2>

                                <form action="
                                {{-- {{ route('tasks.store') }} --}}
                                " method="POST" class="space-y-4">
                                    @csrf

                                    <!-- Task Name -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Task</label>
                                        <input type="text" name="task" placeholder="Task name..."
                                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                    </div>

                                    <!-- Project -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Project</label>
                                        <select name="project_id" class="w-full border rounded-lg px-3 py-2">
                                            <option value="">Select project</option>
                                            {{-- @foreach($projects as $project) --}}
                                                <option value="
                                                {{-- {{ $project->id }} --}}
                                                ">
                                                {{-- {{ $project->name }} --}}
                                                </option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- Task Level -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Task Level</label>
                                        <div class="flex gap-4 mt-1">
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="low"> Low
                                            </label>
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="medium"> Medium
                                            </label>
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="high"> High
                                            </label>
                                        </div>
                                        <p class="text-xs text-red-500 mt-1">
                                            Low: ≤ 2 hours | Medium: ≤ 6 hours | High: ≥ 6 hours
                                        </p>
                                    </div>

                                    <!-- Submit -->
                                    <div class="flex justify-end pt-2">
                                        <button type="submit"
                                            class="px-6 py-2 bg-black text-white rounded-lg font-semibold hover:bg-gray-900">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ openCreate: false }">
                        <!-- Tombol Trigger -->
                        <button @click="openCreate = true" class="px-4 py-2 bg-white text-gray-700 border rounded-lg hover:bg-gray-100">
                            Transfer task
                        </button>

                        <!-- Modal Overlay -->
                        <div x-show="openCreate" x-transition
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
                            
                            <!-- Modal Box -->
                            <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 relative">
                                <!-- Tombol Close -->
                                <button @click="openCreate = false"
                                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">✕</button>

                                <h2 class="text-xl font-bold mb-4">Create Task</h2>

                                <form action="
                                {{-- {{ route('tasks.store') }} --}}
                                " method="POST" class="space-y-4">
                                    @csrf

                                    <!-- Task Name -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Task</label>
                                        <input type="text" name="task" placeholder="Task name..."
                                            class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-gray-300">
                                    </div>

                                    <!-- Project -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Project</label>
                                        <select name="project_id" class="w-full border rounded-lg px-3 py-2">
                                            <option value="">Select project</option>
                                            {{-- @foreach($projects as $project) --}}
                                                <option value="
                                                {{-- {{ $project->id }} --}}
                                                ">
                                                {{-- {{ $project->name }} --}}
                                                </option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium mb-1">Send to</label>
                                        <select name="project_id" class="w-full border rounded-lg px-3 py-2">
                                            <option value="">Select user</option>
                                            {{-- @foreach($users as $user) --}}
                                                <option value="
                                                {{-- {{ $user->id }} --}}
                                                ">
                                                {{-- {{ $user->name }} --}}
                                                </option>
                                            {{-- @endforeach --}}
                                        </select>
                                    </div>

                                    <!-- Task Level -->
                                    <div>
                                        <label class="block text-sm font-medium mb-1">Task Level</label>
                                        <div class="flex gap-4 mt-1">
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="low"> Low
                                            </label>
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="medium"> Medium
                                            </label>
                                            <label class="flex items-center gap-1">
                                                <input type="radio" name="level" value="high"> High
                                            </label>
                                        </div>
                                        <p class="text-xs text-red-500 mt-1">
                                            Low: ≤ 2 hours | Medium: ≤ 6 hours | High: ≥ 6 hours
                                        </p>
                                    </div>

                                    <!-- Submit -->
                                    <div class="flex justify-end pt-2">
                                        <button type="submit"
                                            class="px-6 py-2 bg-black text-white rounded-lg font-semibold hover:bg-gray-900">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endhasanyrole
                <button class="px-4 py-2 bg-white text-gray-700 border rounded-lg hover:bg-gray-100">View All Task</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $columns = [
                    'todo' => ['title' => 'To do', 'color' => 'red-500'],
                    'in-progress' => ['title' => 'In progres', 'color' => 'yellow-500'],
                    'review' => ['title' => 'Review', 'color' => 'blue-500'],
                    'completed' => ['title' => 'Completed', 'color' => 'green-500']
                ];
            @endphp

            @foreach ($columns as $status => $column)
            <div class="bg-white/60 rounded-lg shadow-sm">
                <div class="p-4 border-b border-t-4 bg-{{ $column['color'] }} rounded-t-lg">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $column['title'] }}</h3>
                </div>
                <div class="p-4 space-y-4">
                    @if (isset($task[$status]) && count($task[$status]) > 0)
                        @foreach ($task[$status] as $item)
                            @php
                                $priorityClasses = [
                                    'High' => 'text-red-800 bg-red-100',
                                    'Medium' => 'text-yellow-800 bg-yellow-100',
                                    'Low' => 'text-green-800 bg-green-100',
                                ];
                            @endphp
                            <div class="bg-white p-4 rounded-lg shadow border">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-bold text-gray-800">{{ $item['title'] }}</h4>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $priorityClasses[$item['priority']] ?? '' }}">{{ $item['priority'] }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">{{ $item['company'] }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span>{{ $item['due_date']->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex -space-x-2">
                                        @foreach ($item['assignees'] as $assignee)
                                            <img class="w-7 h-7 rounded-full border-2 border-white" src="{{ $assignee }}" alt="avatar">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-sm text-gray-500">No task in this column.</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>