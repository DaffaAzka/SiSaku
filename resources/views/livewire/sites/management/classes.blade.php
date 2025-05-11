<div class="p-6 min-h-screen font-sans">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Kelas</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

        <div class="col-span-1">
            <select wire:model.live='major_id'
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Jurusan</option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-1">
            <select wire:model.live='grade'
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
                <option value="XIII">XIII</option>
            </select>
        </div>

        <div class="col-span-1 w-full flex sm:justify-end items-center">
            <button aria-controls="classes-add-modal" data-hs-overlay="#classes-add-modal"
                wire:click="$dispatch('classSelected', { id: null })"
                class="w-full bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
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
                    <th class="px-3 py-3">Students</th>
                    <th class="px-3 py-3">Balance</th>
                    <th class="px-3 py-3">Monitoring</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($class as $cl)
                    <tr>
                        <td class="px-3 py-3">{{ $cl->grade . ' ' . $cl->majors->name . ' ' . $cl->class }}</td>
                        <td class="px-3 py-3">{{ $cl->teacher->name ?? 'N/A' }}</td>
                        <td class="px-3 py-3">{{ $cl->students->count() }}</td>
                        <td class="px-3 py-3">Rp.
                            {{ number_format($this->getBalance($cl->id), 0, ',', thousands_separator: '.') }}</td>

                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('monitoring-balance', ['id' => $cl->id]) }}"
                                class="text-purple-600 hover:underline">Tabungan</a>
                        </td>

                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="{{ route('management-students', ['id' => $cl->id]) }}"
                                class="text-teal-600 hover:underline">Lihat Kelas</a>
                            <button aria-controls="classes-add-modal" data-hs-overlay="#classes-add-modal"
                                class="text-blue-600 hover:underline"
                                wire:click="$dispatch('classSelected', { id: '{{ $cl->id }}' })">Update</button>
                            <button aria-controls="classes-delete-modal" data-hs-overlay="#classes-delete-modal"
                                wire:click="$dispatch('deleteSelected', { classId: '{{ $cl->id }}' })"
                            class="text-red-600 hover:underline">Delete</button>
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
    <livewire:modals.classes.delete />
</div>
