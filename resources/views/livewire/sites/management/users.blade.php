<div class="p-6 min-h-screen font-sans">
    <h1 class="text-2xl font-semibold mb-6">Manajemen Akun</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="relative col-span-1">
            <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
            <input type="text" placeholder="Search" wire:model.live='search'
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-emerald-600" />
        </div>

        <div class="col-span-1">
            <select wire:model.live='major'
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected>Jurusan</option>

                @foreach ($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-1">
            <select wire:model.live='role'
                class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option selected value="">Role</option>
                <option selected value="3">Admin</option>
                <option selected value="2">Teacher</option>
                <option selected value="1">Student</option>

            </select>
        </div>

        <div class="col-span-1 flex sm:justify-end items-center">
            <button aria-expanded="false" aria-controls="user-section-modal" data-hs-overlay="#user-section-modal"
                class="w-full bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
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
                    <th class="px-3 py-3">Email</th>
                    <th class="px-3 py-3">NISN/NIP</th>
                    <th class="px-3 py-3">Birth Date</th>
                    <th class="px-3 py-3">Role</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-3 py-3">{{ $user->name }}</td>
                        <td class="px-3 py-3">{{ $user->email }}</td>
                        <td class="px-3 py-3">{{ $user->nisn ?? $user->nip }}</td>
                        <td class="px-3 py-3">{{ $user->birth_date }}</td>
                        <td class="px-3 py-3">{{ $user->getRoleNames()->first() }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <button class="text-blue-600 hover:underline"
                                wire:click="$dispatch('studentSelected', { studentId: '{{ $user->id }}' })"
                                aria-expanded="false" aria-controls="user-store-modal"
                                data-hs-overlay="#user-store-modal">Update</button>

                            <button class="text-red-600 hover:underline"
                                wire:click="$dispatch('deleteSelected', { studentId: '{{ $user->id }}' })"
                                aria-expanded="false" aria-controls="user-delete-modal"
                                data-hs-overlay="#user-delete-modal">Delete</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate -->
        <div class="p-4 border-t border-gray-300 bg-white">
            {{ $users->links('vendor.pagination.tailwind') }}
        </div>

        <livewire:modals.user.section />
        <livewire:modals.user.delete />
    </div>
</div>
