<div class="p-6 min-h-screen font-sans">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Kelas</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="relative col-span-1">
            <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search" wire:model.live='search'
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

        <div class="col-span-1 w-full flex sm:justify-end items-center">
            <button aria-controls="classes-add-modal" data-hs-overlay="#classes-add-modal"
                wire:click="$dispatch('classSelected', { id: null })"
                class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
                Tambah Kelas
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
                        <td class="px-3 py-3">Rp.
                            {{ number_format($this->getBalance($cl->id), 0, ',', thousands_separator: '.') }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('management-students', ['id' => $cl->id]) }}"
                                class="text-teal-600 hover:underline">Lihat Kelas</a>
                            <button aria-controls="classes-add-modal" data-hs-overlay="#classes-add-modal"
                                class="text-blue-600 hover:underline"
                                wire:click="$dispatch('classSelected', { id: '{{ $cl->id }}' })">Update</button>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate -->
        <div class="p-4 border-t border-gray-300 bg-white">
            {{ $class->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <livewire:modals.classes.store />
</div>
