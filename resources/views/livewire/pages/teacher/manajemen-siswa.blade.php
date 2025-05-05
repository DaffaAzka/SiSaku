<div class="p-6 space-y-6">
    <!-- Judul -->
    <h1 class="text-2xl font-semibold text-gray-800">Manajemen Siswa</h1>

    <!-- Search dan laporan -->
    <div class="flex flex-col md:flex-row md:items-center gap-4">
        <div class="flex flex-1 relative">
            <span class="absolute left-3 top-2.5 text-gray-400">
                <x-lucide-search class="w-4 h-4" />
            </span>
            <input type="text" placeholder="Search"
                class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:ring-2 focus:ring-emerald-600 focus:outline-none" />
        </div>
        <div>
            <button
                class="w-full md:w-auto bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2 rounded-md text-sm font-medium">
                Tambah Siswa
            </button>
        </div>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto border border-gray-300 rounded-md">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">Name</th>
                    <th class="px-3 py-3">Email</th>
                    <th class="px-3 py-3">NISN</th>
                    <th class="px-3 py-3">Birth Date</th>
                    <th class="px-3 py-3">Balance</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @for ($i = 0; $i < 4; $i++)
                    <tr>
                        <td class="px-3 py-3">John Brown</td>
                        <td class="px-3 py-3">admin@gmail.com</td>
                        <td class="px-3 py-3">0009321234</td>
                        <td class="px-3 py-3">31/04/30</td>
                        <td class="px-3 py-3">Rp. 100.000</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="#" class="text-emerald-600 hover:underline">Tambah Saldo</a>
                            <a href="#" class="text-blue-600 hover:underline">Update</a>
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
