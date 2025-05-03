<div class="p-6 min-h-screen font-sans">
    <h1 class="text-3xl font-semibold mb-6">Manajemen Notifikasi</h1>

    <!-- Filter Controls -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-4 mb-8">
        <!-- Search Input -->
        <div class="relative col-span-12 sm:col-span-6 lg:col-span-3">
            <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search"
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
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

    <!-- Table Section -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border border-gray-200 rounded-lg overflow-hidden dark:border-neutral-700 text-left">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Receiver</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Sender</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">XI RPL 3</td>
                                <td class="px-6 py-4 text-sm text-gray-800">32</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Rp. 100.000</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 text-right">
                                    <div class="flex justify-end items-center gap-4">
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">More</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Update</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">XI RPL 3</td>
                                <td class="px-6 py-4 text-sm text-gray-800">32</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Rp. 100.000</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 text-right">
                                    <div class="flex justify-end items-center gap-4">
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">More</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Update</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">XI RPL 3</td>
                                <td class="px-6 py-4 text-sm text-gray-800">32</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Rp. 100.000</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 text-right">
                                    <div class="flex justify-end items-center gap-4">
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">More</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Update</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800">XI RPL 3</td>
                                <td class="px-6 py-4 text-sm text-gray-800">32</td>
                                <td class="px-6 py-4 text-sm text-gray-800">Rp. 100.000</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800 text-right">
                                    <div class="flex justify-end items-center gap-4">
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">More</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Update</a>
                                        <a href="#" class="text-blue-600 hover:underline whitespace-nowrap">Delete</a>
                                    </div>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-start p-4 border-t border-gray-300 bg-white">
        <nav class="inline-flex items-center gap-2 text-sm text-gray-700">
            <button class="px-2 py-1 border border-gray-300 rounded-md hover:bg-gray-100">&laquo;</button>
            <button class="px-3 py-1 rounded-md border border-gray-300 bg-gray-100 font-medium text-emerald-700">1</button>
            <span class="text-gray-500">of</span>
            <span class="text-gray-700 font-medium">3</span>
            <button class="px-2 py-1 border border-gray-300 rounded-md hover:bg-gray-100">&raquo;</button>
        </nav>
    </div>
</div>
