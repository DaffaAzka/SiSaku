<div class="p-6 space-y-6">
    <h2 class="text-2xl font-semibold text-gray-800">Notifikasi</h2>

    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Card Notif -->
        @for ($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-lg shadow border border-gray-200 p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Jangan Lupa Menabung</h3>
                <p class="text-sm text-gray-600 mb-3">
                    Segera hubungi wali kelasmu untuk menabung walaupun hanya sebesar Rp. 2.000
                </p>
                <p class="text-xs text-gray-500">By admin | 5 Minutes ago</p>
            </div>
        @endfor
    </div>
</div>
