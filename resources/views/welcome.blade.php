<x-layouts.app>

    <!-- Hero Section -->
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 min-h-screen items-center px-4 sm:px-6 py-12 gap-8">
        <!-- Gambar -->
        <div class="order-2 sm:order-1 flex justify-center">
            <img src="{{ asset('assets/char.png') }}" alt="Ilustrasi"
                class="w-full max-w-[260px] sm:max-w-[300px] md:max-w-[360px] lg:max-w-[420px] xl:max-w-[440px] 2xl:max-w-[460px] object-contain">
        </div>

        <!-- Teks -->
        <div class="order-1 sm:order-2 flex flex-col justify-center space-y-4 text-center sm:text-left px-2">
            <h1 class="font-sagoe text-2xl sm:text-3xl md:text-4xl font-semibold text-teal-700 leading-tight">
                Pantau perkembangan siswa tabungan dengan mudah dan transparan.
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-teal-500 font-normal mt-1.5 font-sagoe">
                Membangun finansial sehat untuk siswa SMKN 4 Kota Tangerang
            </p>
        </div>
    </div>


    <!-- Keuntungan Menggunakan SiSaku -->
    <div class="w-full bg-teal-500 py-16 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-10 font-sagoe">Keuntungan Menggunakan SiSaku
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-white text-gray-800 p-6 rounded-lg shadow">
                    <h3 class="font-bold mb-2 font-sagoe">Transparansi Total</h3>
                    <p class="mb-4 text-sm font-sagoe font-normal">
                        Pantau perkembangan tabungan dengan mudah dan transparan. Orang tua dan guru dapat mengakses
                        laporan kapan saja.
                    </p>
                    <a href="#" class="text-teal-600 text-sm font-medium flex items-center gap-1.5">
                        Lanjutkan <x-lucide-chevron-right class="w-4 h-4" />
                    </a>
                </div>
                <div class="bg-white text-gray-800 p-6 rounded-lg shadow">
                    <h3 class="font-bold mb-2 font-sagoe">Edukasi Finansial Sejak Dini</h3>
                    <p class="mb-4 text-sm font-sagoe font-normal">
                        Ajarkan siswa-siswi nilai menabung dan mengelola keuangan dengan cara yang menyenangkan dan
                        interaktif.
                    </p>
                    <a href="#" class="text-teal-600 text-sm font-medium flex items-center gap-1.5">
                        Lanjutkan <x-lucide-chevron-right class="w-4 h-4" />
                    </a>
                </div>
                <div class="bg-white text-gray-800 p-6 rounded-lg shadow">
                    <h3 class="font-bold mb-2 font-sagoe">Pengelolaan yang Efisien</h3>
                    <p class="mb-4 text-sm font-sagoe font-normal">
                        Guru dapat mengelola tabungan kelas dengan mudah, tanpa kertas dan pencatatan manual. Semua
                        melalui satu website.
                    </p>
                    <a href="#" class="text-teal-600 text-sm font-medium flex items-center gap-1.5">
                        Lanjutkan <x-lucide-chevron-right class="w-4 h-4" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Fitur Unggulan SiSaku -->
    <div class="w-full bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-center text-teal-700 mb-12 font-sagoe">
                Fitur Unggulan SiSaku
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Placeholder Gambar -->
                <img src="{{ asset('assets/dash.png') }}" alt=""
                    class="h-72 w-full rounded-lg flex items-center justify-center">

                <!-- Daftar Fitur -->
                <div class="space-y-6">
                    <div>
                        <h3 class="font-bold text-lg text-teal-700 font-sagoe">Akses Multiperan</h3>
                        <p class="text-sm text-teal-600 font-sagoe font-normal">
                            Fitur khusus untuk admin sekolah, guru, dan siswa dengan hak akses yang sesuai.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-teal-700 font-sagoe">Laporan Visual</h3>
                        <p class="text-sm text-teal-600 font-sagoe font-normal">
                            Lihat perkembangan tabungan dalam bentuk grafik yang menarik dan mudah dipahami.
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-teal-700 font-sagoe">Notifikasi Melalui Email</h3>
                        <p class="text-sm text-teal-600 font-sagoe font-normal">
                            Pengingat setoran dan informasi penting lainnya langsung dikirim ke perangkat anda melalui
                            email.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Developer Section -->
    <div class="w-full bg-teal-600 py-16 text-white">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-semibold font-sagoe">Our Developer</h2>

            <div class="flex justify-center items-center mt-6 mx-8 p-8">
                <img src="{{ asset('assets/team.jpeg') }}" alt="Ilustrasi"
                    class="max-h-72 w-full rounded-lg flex items-center justify-center object-contain">

            </div>


        </div>
    </div>

</x-layouts.app>
