<div class="p-6 min-h-screen font-sans">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Notifikasi</h1>

    <!-- Filter Controls -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-8">
        <!-- Search Input -->
        <div class="relative col-span-12 sm:col-span-6 lg:col-span-3">
            <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search"
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-600" />
        </div>

        <!-- Role Select -->
        <div class="relative col-span-12 sm:col-span-6 lg:col-span-3">
            <select
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected disabled>Role</option>
            </select>
        </div>

        <!-- Tambah Notifikasi Button -->
        <div class="col-span-12 lg:col-span-6 flex items-center justify-start lg:justify-end">
            <button
                class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
                Tambah Notifikasi
            </button>
        </div>
    </div>

   <!-- Tabel -->
   <div class="overflow-x-auto border border-gray-300 rounded-md">
    <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-150 text-gray-600 font-medium">
            <tr>
                <th class="px-3 py-3">Name</th>
                <th class="px-3 py-3">Receiver</th>
                <th class="px-3 py-3">Sender</th>
                <th class="px-3 py-3">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @for ($i = 0; $i < 4; $i++)
                <tr>
                    <td class="px-3 py-3">John Brown</td>
                    <td class="px-3 py-3">admin@gmail.com</td>
                    <td class="px-3 py-3">Guru</td>
                    <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                        <a href="#" class="text-blue-600 hover:underline">More</a>
                        <a href="#" class="text-blue-600 hover:underline">Update</a>
                        <a href="#" class="text-blue-600 hover:underline">Delete</a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>

    <!-- Paginate -->
    <div class="flex justify-start p-4 border-t border-gray-300 bg-white">
        <nav class="inline-flex items-center gap-2 text-sm text-gray-700">
            <button class="px-2 py-1 border border-gray-300 rounded-md hover:bg-gray-100">
                &laquo;
            </button>
            <button class="px-3 py-1 rounded-md border border-gray-300 bg-gray-100 font-medium text-emerald-700">
                1
            </button>
            <span class="text-gray-500">of</span>
            <span class="text-gray-700 font-medium">3</span>
            <button class="px-2 py-1 border border-gray-300 rounded-md hover:bg-gray-100">
                &raquo;
            </button>
        </nav>
        </div>
    </div>
</div>
