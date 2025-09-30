<x-app-layout>
    <div x-data="{ 
            activeTab: 'ready', 
            allTasks: {{ Js::from($allTasks) }} 
         }" 
         class="space-y-8">

        <div class="flex items-center space-x-2">
            <button @click="activeTab = 'ready'" 
                    :class="activeTab === 'ready' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm">
                Ready
            </button>
            <button @click="activeTab = 'standby'" 
                    :class="activeTab === 'standby' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm">
                Stand by
            </button>
            <button @click="activeTab = 'notready'" 
                    :class="activeTab === 'notready' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm">
                Not ready
            </button>
            <button @click="activeTab = 'complete'" 
                    :class="activeTab === 'complete' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm">
                Complete
            </button>
             <button @click="activeTab = 'absent'" 
                    :class="activeTab === 'absent' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700'"
                    class="px-4 py-2 text-sm font-semibold rounded-lg shadow-sm">
                Absent
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <template x-for="task in allTasks" :key="task.id">
                        <div x-show="activeTab === task.status" x-transition class="bg-white p-4 rounded-lg shadow-sm space-y-3">
                            <div class="flex items-center space-x-3">
                                <img src="https://i.pravatar.cc/40?u=${{ rand(1, 15) }}" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-semibold text-sm text-gray-800" x-text="task.user_name"></p>
                                    <p class="text-xs text-gray-500" x-text="task.user_role"></p>
                                </div>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900" x-text="task.title"></p>
                                <p class="text-sm text-gray-600 mt-1" x-text="task.description"></p>
                            </div>
                            <div class="flex items-center justify-between pt-2">
                                <button class="text-xs text-gray-600 bg-gray-100 px-3 py-1 rounded-md hover:bg-gray-200">Review</button>
                                <span class="text-xs font-bold px-2 py-1 rounded-md"
                                      :class="{
                                          'bg-yellow-100 text-yellow-800': task.priority === 'Medium',
                                          'bg-red-100 text-red-800': task.priority === 'High',
                                          'bg-blue-100 text-blue-800': task.priority === 'Low',
                                          'bg-green-100 text-green-800': task.status === 'complete'
                                      }"
                                      x-text="task.status === 'complete' ? 'Complete' : task.priority">
                                </span>
                            </div>
                        </div>
                    </template>
                </div>
                 {{-- Pesan jika tidak ada task --}}
                <div x-show="!allTasks.some(task => task.status === activeTab)" class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" /></svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900" x-text="`No tasks ${activeTab}`"></h3>
                </div>
            </div>

            <div class="flex space-x-6">
    {{-- Task --}}
    <div style="background-color: #7DB546" class="p-4 rounded-lg shadow-sm flex-1">
        <h3 class="font-bold text-gray-800">🗒️ Tasks</h3>
        <div class="space-y-3 mt-4">
            <div class="bg-gray-50 p-3 rounded-md">
                <p class="text-sm font-semibold">Create filter to find data resource</p>
                <span class="text-xs font-bold px-2 py-1 rounded-md bg-blue-100 text-blue-800 mt-2 inline-block">Low</span>
            </div>
            <div class="bg-gray-50 p-3 rounded-md">
                <p class="text-sm font-semibold">Displaying and merging data</p>
                <span class="text-xs font-bold px-2 py-1 rounded-md bg-yellow-100 text-yellow-800 mt-2 inline-block">Medium</span>
            </div>
        </div>
    </div>

    {{-- Project --}}
    <div style="background-color: #FFB42E" class="p-4 rounded-lg shadow-sm flex-1">
        <h3 class="font-bold text-gray-800">📂 Project</h3>
        <div class="bg-orange-50 p-3 rounded-md mt-4">
            <p class="text-sm font-semibold">CODESHOP</p>
            <p class="text-xs text-gray-600 mt-1">
                Create a web, to buy mod game GTA V. Payment must use Dana/Paypal/Steam
            </p>
            <div class="flex items-center justify-between mt-3">
                <span class="text-xs font-bold px-2 py-1 rounded-md bg-orange-100 text-orange-800">On create</span>
                <div class="flex -space-x-2">
                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://i.pravatar.cc/24?u=1" alt="">
                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://i.pravatar.cc/24?u=2" alt="">
                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://i.pravatar.cc/24?u=3" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Activity (tetap di bawah) --}}
<div class="bg-white p-4 rounded-lg shadow-sm mt-6">
    <h3 class="font-bold text-gray-800">📈 Activity</h3>
    <div class="mt-4 text-center text-gray-400">
        <p>(Grafik akan ditampilkan di sini)</p>
    </div>
</div>

        </div>
    </div>
</x-app-layout>