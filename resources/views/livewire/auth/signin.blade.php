<div class="min-h-screen bg-teal-500 flex items-center justify-center px-4">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 w-full max-w-4xl">

        <!-- Form Section -->
        <div class="p-8 flex flex-col justify-center sm:h-[50vh]">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Sign In</h2>

            <form action="#" method="POST" class="space-y-4" wire:submit.prevent="login">
                <!-- Email -->
                <div class="relative">
                    <input type="email" name="email" required wire:model="email"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="you@email.com" />
                    <div class="absolute left-3 top-3 text-gray-400">
                        <x-lucide-mail class="w-4 h-4" />
                    </div>

                    @error('email')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="relative">
                    <input type="password" name="password" required wire:model="password"
                        class="w-full border border-gray-300 rounded-md px-4 py-2 pl-10 focus:outline-none focus:ring-2 focus:ring-teal-500"
                        placeholder="• • • • • • • •" />
                    <div class="absolute left-3 top-3 text-gray-400">
                        <x-lucide-lock class="w-4 h-4" />
                    </div>

                    @error('password')
                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-teal-700 text-white py-2 rounded-md hover:bg-teal-800 transition duration-200">
                    Sign In
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-4">
                Belum punya akun?
                <a href="#" class="text-teal-700 hover:underline">Hubungi operator sekolah</a>
            </p>
        </div>

        <!-- Image Section -->
        <div class="hidden sm:block">
            <img src="{{ asset('assets/signin.jpg') }}" alt="Login Image" class="w-full h-full object-cover" />
        </div>
    </div>
</div>
