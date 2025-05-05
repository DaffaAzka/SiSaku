<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<div class="min-h-screen bg-teal-500 flex items-center justify-center px-4">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 w-full max-w-4xl">

        <!-- Form -->
        <div class="p-8 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Cek Akun Anak Anda</h2>
            <p class="text-center text-sm text-gray-600 mb-6">
                Fitur ini ada untuk membantu orang tua dalam melihat data tabungan siswa meskipun tidak seluruhnya ditampilkan
            </p>

            <form action="#" method="POST" class="space-y-4" wire:submit.prevent="login">
                <!-- Nisn -->
                <div class="relative">
                    <input type="" name=""
                        class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="NISN" />
                    <div class="absolute left-3 top-3 text-gray-400">
                        <x-lucide-mail class="w-4 h-4" />
                    </div>

                    @error('')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Tgl -->
                <div class="relative">
                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" required
                        class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="Tanggal Lahir" />
                    <div class="absolute left-3 top-3 text-gray-400">
                        <x-lucide-calendar class="w-4 h-4" />
                    </div>

                    @error('')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-teal-700 text-white py-2 rounded-md hover:bg-teal-800 transition duration-200">
                    Cari
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-4">
                Lupa akun?
                <a href="#" class="text-teal-700 hover:underline">Hubungi operator sekolah</a>
            </p>
        </div>

        <!-- Foto -->
        <div class="hidden sm:block">
            <img src="{{ asset('assets/signin.jpg') }}" alt="Login Image" class="w-full h-full object-cover" />
        </div>
    </div>

    <x-utilities.loading />
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#tanggal_lahir", {
            dateFormat: "Y-m-d",
            maxDate: "today",
        });
    });
</script>
