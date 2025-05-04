<div class="font-sagoe p-4 sm:p-6 text-gray-800 dark:text-gray-200 space-y-6">
    <h1 class="text-lg sm:text-xl font-semibold mb-4 dark:text-white">Manajemen Siswa
        {{ $class->class . ' ' . $class->majors }}</h1>

    <!-- Search dan laporan -->
    <div class="flex flex-col md:flex-row md:items-center gap-4">
        <div class="flex flex-1 relative">
            <span class="absolute left-3 top-2.5 text-gray-400">
                <x-lucide-search class="w-4 h-4" />
            </span>
            <input type="text" placeholder="Search" wire:model.live='search'
                class="w-full pl-9 pr-4 py-1.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-emerald-600 focus:outline-none" />
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
                @foreach ($studentClass as $s)
                    <tr>
                        <td class="px-3 py-3">{{ $s->name }}</td>
                        <td class="px-3 py-3">{{ $s->email }}</td>
                        <td class="px-3 py-3">{{ $s->nisn }}</td>
                        <td class="px-3 py-3">{{ $s->birth_date }}</td>
                        <td class="px-3 py-3">
                            {{ number_format($this->getBalance($s->id), 0, ',', thousands_separator: '.') }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <button class="text-emerald-600 hover:underline" aria-haspopup="dialog"
                                wire:click="$dispatch('studentSelected', { studentId: '{{ $s->id }}' })"
                                aria-expanded="false" aria-controls="transaction-add-modal"
                                data-hs-overlay="#transaction-add-modal">
                                Tambah Saldo
                            </button>
                            <button class="text-blue-600 hover:underline">Update</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{ $studentClass->links('vendor.pagination.tailwind') }}
    </div>

    <livewire:modals.transaction.store />
</div>
