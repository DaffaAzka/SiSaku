<header class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-teal-500 text-sm py-3">
    <nav class="max-w-[100rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center justify-between">
            <a class="flex-none text-xl font-semibold text-white focus:outline-hidden focus:opacity-80" href="/"
                aria-label="Brand">
                <span class="inline-flex items-center text-xl font-semibold text-white">
                    <img class="w-10 h-10" src="{{ asset('logo_transparant.svg') }}">
                    SiSaku
                </span>
            </a>

            <div class="flex items-center sm:hidden gap-x-4">
                <span class="inline-flex items-center justify-center size-9 rounded-full bg-white font-semibold">
                    AC
                </span>

                <div class="">
                    <button type="button"
                        class="hs-collapse-toggle relative size-9 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example"
                        aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                        <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
            </div>

        </div>
        <div id="hs-navbar-example"
            class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block"
            aria-labelledby="hs-navbar-example-collapse">
            <div class="flex flex-col gap-6 sm:gap-8 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
                @if (!Auth::check())
                    <a class="font-semibold text-sm text-white hover:underline focus:outline-hidden focus:text-gray-100"
                        href="#">About</a>
                    <a class="font-semibold text-sm text-white hover:underline focus:outline-hidden focus:text-gray-100"
                        href="#">Docs</a>
                    <a class="font-semibold text-sm text-white hover:underline focus:outline-hidden focus:text-gray-100"
                        href="#">Cek Akun Siswa</a>
                    <a href="{{ route('signin') }}"
                        class="py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white  hover:bg-gray-50 focus:outline-hidden  disabled:opacity-50 disabled:pointer-events-none">
                        <x-lucide-log-in class="w-4 h-4" />
                        Sign In
                    </a>
                @endif

                @if (Auth::check())

                    @if (!Auth::user()->hasRole('admin'))

                        <div class="hs-dropdown relative hidden sm:inline-flex">
                            <button id="hs-dropdown-with-dividers" type="button"
                                class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm font-semibold text-white disabled:opacity-50 disabled:pointer-events-none"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                Opsi
                                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div class="z-[100] hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200"
                                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-dividers">
                                <div class="p-1 space-y-0.5">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                        href="{{ route('notifications') }}">
                                        <x-lucide-bell class="w-4 h-4" />
                                        Notifikasi
                                    </a>

                                </div>

                                @if (Auth::user()->hasRole('teacher'))
                                    <div class="p-1 space-y-0.5">
                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                            href="{{ route('management-students') }}">
                                            <x-lucide-users class="w-4 h-4" />
                                            Manajemen Siswa
                                        </a>

                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                            href="{{ route('monitoring-balance') }}">
                                            <x-lucide-files class="w-4 h-4" />
                                            Monitoring Tabungan
                                        </a>
                                    </div>
                                @endif

                                <div class="p-1 space-y-0.5">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                        href="#">
                                        <x-lucide-settings class="w-4 h-4" />
                                        Setelan Akun
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-500 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                        wire:click="logout">
                                        <x-lucide-log-out class="w-4 h-4" />
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        </div>


                        <a class="sm:hidden flex items-center gap-x-3.5 py-2 rounded-lg font-semibold text-sm hover:underline text-white focus:outline-hidden"
                            href="{{ route('notifications') }}">
                            <x-lucide-bell class="w-4 h-4" />
                            Notifikasi
                        </a>

                        @if (Auth::user()->role == 'teacher')
                            <a class="sm:hidden flex items-center gap-x-3.5 py-2 rounded-lg font-semibold text-sm hover:underline text-white focus:outline-hidden"
                                href="#">
                                <x-lucide-users class="w-4 h-4" />
                                Manajemen Siswa
                            </a>

                            <a class="sm:hidden flex items-center gap-x-3.5 py-2 rounded-lg font-semibold text-sm hover:underline text-white focus:outline-hidden"
                                href="#">
                                <x-lucide-files class="w-4 h-4" />
                                Manajemen Tabungan
                            </a>
                        @endif

                        <a class="sm:hidden flex items-center gap-x-3.5 py-2 rounded-lg font-semibold text-sm hover:underline text-white focus:outline-hidden"
                            href="#">
                            <x-lucide-settings class="w-4 h-4" />
                            Setelan Akun
                        </a>
                        <button
                            class="sm:hidden flex items-center gap-x-3.5 py-2 rounded-lg font-semibold text-sm hover:underline text-red-500 focus:outline-hidden"
                            wire:click="logout">
                            <x-lucide-log-out class="w-4 h-4" />
                            Keluar
                        </button>
                    @endif


                    <span
                        class="hidden sm:inline-flex items-center justify-center size-10 rounded-full bg-white font-semibold">
                        AC
                    </span>
                @endif

            </div>
        </div>
    </nav>
</header>
