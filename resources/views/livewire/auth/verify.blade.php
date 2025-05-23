<div class="min-h-screen flex items-center justify-center p-4">

    <x-particles.green/>

    <div class="grid bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl w-full grid-cols-1 sm:grid-cols-2">

        <!-- Form Verifikasi -->
        <div class="p-8 flex flex-col justify-center sm:h-[50vh]">
            <h2 class="text-2xl sm:text-4xl font-black text-black mb-6 font-sagoe">Verifikasi Email</h2>
            <p class="text-xs sm:text-sm text-gray-600 mb-4">Kode telah dikirimkan ke perangkat anda, silahkan cek inbox spam email anda
                email</p>

            <form method="POST" class="space-y-4" wire:submit.prevent="verification">
                <div class="relative">
                    <div class="flex items-center border rounded px-3 py-2 space-x-2">
                        <x-lucide-mail class="w-4 h-4" />
                        <input type="text" wire:model='code' name="code" placeholder="• • • • • •"
                            class="w-full focus:outline-none">
                    </div>

                    @error('code')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-teal-700 hover:bg-teal-500 text-white font-semibold py-2 px-4 rounded text-sm">
                    Submit
                </button>
            </form>

            <p class="text-center text-xs text-gray-500 mt-4">
                Belum menerima kode?
                <a href="#" class="text-teal-700 font-semibold hover:underline">Kirim Ulang</a>
            </p>
        </div>

        <!-- Gambar -->
        <div class="hidden sm:block">
            <img src="{{ asset('assets/verify.jpg') }}" alt="Verifikasi" class="object-cover w-full h-full">
        </div>

    </div>

    <x-utilities.loading />
</div>
