<div class="p-6 min-h-screen font-sans">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Kelas</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="relative col-span-1">
            <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search"
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-600" />
        </div>

        <div class="col-span-1">
            <select
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected disabled>Jurusan</option>
            </select>
        </div>

        <div class="col-span-1">
            <select
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected disabled>Kelas</option>
            </select>
        </div>

        <div class="col-span-1 flex sm:justify-end items-center">
            <button
                class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
                Tambah Akun
            </button>
        </div>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto border border-gray-300 rounded-md">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">Name</th>
                    <th class="px-3 py-3">Teacher</th>
                    <th class="px-3 py-3">Count</th>
                    <th class="px-3 py-3">Balance</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($class as $cl)
                    <tr>
                        <td class="px-3 py-3">{{ $cl->grade . ' ' . $cl->majors->name . ' ' . $cl->class }}</td>
                        <td class="px-3 py-3">{{ $cl->teacher->name }}</td>
                        <td class="px-3 py-3">{{ $cl->students->count() }}</td>
                        <td class="px-3 py-3">Rp. {{ number_format($this->getBalance($cl->id), 0, ',', thousands_separator: '.') }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('monitoring-balance', ['id' => $cl->id]) }}" class="text-blue-600 hover:underline">Lihat Kelas</a>
                            <a href="#" class="text-blue-600 hover:underline">Cetak Laporan</a>
                        </td>
                    </tr>
                @endforeach
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
