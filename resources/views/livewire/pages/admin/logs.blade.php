<div class="p-6 space-y-6">
    <!-- Judul -->
    <h1 class="text-2xl font-semibold text-gray-800">Logs</h1>

    <!-- Tabel -->
    <div class="overflow-x-auto border border-gray-300 rounded-md">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">NAME</th>
                    <th class="px-3 py-3">USER</th>
                    <th class="px-3 py-3">IP</th>
                    <th class="px-3 py-3">BALANCE</th>
                    <th class="px-3 py-3">ACTION</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @for ($i = 0; $i < 4; $i++)
                    <tr>
                        <td class="px-3 py-3">Membuat user baru</td>
                        <td class="px-3 py-3">H. Syamsuni S.Pd</td>
                        <td class="px-3 py-3">127.0.0.1</td>
                        <td class="px-3 py-3">Rp. 100.000</td>
                        <td class="px-3 py-3">
                            <a href="#" class="text-blue-600 hover:underline">Detail</a>
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
