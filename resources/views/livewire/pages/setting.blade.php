<div class="p-6 space-y-6">
    <div class="bg-white p-6 rounded-xl shadow-md max-w-4xl mx-auto space-y-6">
        <!-- Judul -->
        <h2 class="text-2xl font-semibold text-gray-800">Public Profile</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-4">
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Masukkan nama lengkap">
                </div>

                <!-- NISN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Masukkan NISN">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Masukkan email aktif">
                </div>

                <!-- No -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                    <input type="text"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <!-- Profile -->
            <div class="flex flex-col items-center justify-start space-y-4">
                <div class="w-32 h-32 rounded-full overflow-hidden border border-gray-300 shadow">
                    <img src="{{ asset('assets/profile.jpeg') }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <button
                    class="px-4 py-2 text-sm bg-white text-teal-700 border border-teal-700 rounded-md hover:bg-teal-700 hover:text-white transition">
                    Edit
                </button>
            </div>
        </div>
    </div>
</div>
