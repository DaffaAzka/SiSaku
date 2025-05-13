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
            <button aria-controls="notification-add-modal" data-hs-overlay="#notification-add-modal"
                class="bg-emerald-700 hover:bg-emerald-800 text-white px-6 py-2 min-w-[150px] rounded-md text-sm font-medium whitespace-nowrap">
                Tambah Notifikasi
            </button>
        </div>
    </div>

    <div class="mb-4">
        <x-utilities.error />
    </div>

    <div class="overflow-x-auto border border-gray-300 rounded-md bg-white">

        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">Name</th>
                    <th class="px-3 py-3">Receiver</th>
                    <th class="px-3 py-3">Sender</th>
                    <th class="px-3 py-3">Send Date</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($notifications as $notification)
                    <tr>
                        <td class="px-3 py-3">{{ $notification->header }}</td>
                        @if ($notification->user_id)
                            <td class="px-3 py-3">{{ $notification->user->name }}</td>
                        @elseif ($notification->class_id)
                            <td class="px-3 py-3">
                                {{ $notification->classes->grade . ' ' . $notification->classes->majors->name . ' ' . $notification->classes->class }}
                            </td>
                        @endif
                        <td class="px-3 py-3">{{ $notification->sender->name }}</td>
                        <td class="px-3 py-3">{{ $notification->sent_at }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <a href="#" class="text-purple-600 hover:underline">More</a>
                            <button class="text-blue-600 hover:underline"
                                wire:click="$dispatch('notificationSelected', { id: '{{ $notification->id }}' })"
                                aria-expanded="false" aria-controls="notification-add-modal"
                                data-hs-overlay="#notification-add-modal">Update</button>
                            <button class="text-red-600 hover:underline"
                                wire:click="$dispatch('deleteSelected', { id: '{{ $notification->id }}' })"
                                aria-expanded="false" aria-controls="notification-delete-modal"
                                data-hs-overlay="#notification-delete-modal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginate -->
        <div class="m-4">
            {{ $notifications->links('vendor.pagination.tailwind') }}
        </div>
    </div>

    <livewire:modals.notification.store />
    <livewire:modals.notification.delete />
</div>
