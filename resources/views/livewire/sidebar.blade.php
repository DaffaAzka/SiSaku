<div>
    <nav
        class="lg:hidden fixed top-0 inset-x-0 bg-teal-500 z-50">
        <div class="flex justify-end items-center px-4 h-16">

            <!-- Hamburger Toggle -->
            <button type="button"
                class="p-2 inline-flex justify-center items-center gap-x-2 text-white rounded-lg border border-teal-600 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-400"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-sidebar-collapsible-group"
                data-hs-overlay="#hs-sidebar-collapsible-group">
                <svg class="hs-collapse-open:hidden size-4" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                <svg class="hs-collapse-open:block hidden size-4" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
    </nav>
    <!-- End Navbar Mobile -->

    <!-- Sidebar -->
    <div id="hs-sidebar-collapsible-group"
        class="hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-60
        hs-overlay-open:translate-x-0
        -translate-x-full transition-all duration-300 transform
        h-full
        hidden
        fixed top-0 start-0 bottom-0 z-80
        bg-teal-600"
        role="dialog" tabindex="-1" aria-label="Sidebar">

        <!-- Header Sidebar -->
        <header class="p-2 flex justify-between items-center gap-x-2 bg-teal-500">
           <a class="flex-none text-xl font-semibold text-white focus:outline-hidden focus:opacity-80" href="/"
                aria-label="Brand">
                <span class="inline-flex items-center text-xl font-semibold text-white">
                    <img class="w-10 h-10" src="{{ asset('logo_transparant.svg') }}" >
                    SiSaku
                </span>
            </a>
        </header>
        <!-- End Header Sidebar -->

        <!-- Body Sidebar -->
        <nav
            class="h-full px-1 py-2 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-teal-700 [&::-webkit-scrollbar-thumb]:bg-teal-400">

            <div class="pb-0 px-2 w-full flex flex-col flex-wrap">
                <!-- FITUR UTAMA Section -->
                <div class="px-2 py-2 text-xs uppercase text-white font-semibold">FITUR UTAMA</div>
                <ul class="space-y-1">
                    <li>
                        <a class="flex items-center gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700"
                            href="{{ Route('management-users') }}">
                            <x-lucide-users-round class="w-4 h-4" />
                            Manajemen Akun
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700"
                            href="{{ Route('management-classes') }}">
                            <x-lucide-briefcase class="w-4 h-4" />
                            Manajemen Kelas
                        </a>
                    </li>
                    <li class="relative">
                        <button type="button"
                            class="w-full text-start flex items-center justify-between gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700">
                            <div class="flex items-center gap-x-3">
                                <x-lucide-shield class="w-4 h-4" />
                                Hak Akses
                            </div>
                        </button>
                    </li>
                    {{-- <li>
                        <a class="flex items-center gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700"
                            href="#">
                            <x-lucide-eye class="w-4 h-4" />
                            Monitoring Tabungan
                        </a>
                    </li> --}}
                </ul>

                <div class="px-2 pt-5 pb-2 text-xs uppercase text-white font-semibold">FITUR SEKUNDER</div>
                <ul class="space-y-1">
                    <li>
                        <a class="flex items-center gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700"
                            href="#">
                            <x-lucide-archive class="w-4 h-4" />
                            Manajemen Notifikasi
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center gap-x-3 py-2 px-3 text-sm font-medium text-white rounded-lg hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700"
                            href="{{ route('monitoring-logs') }}">
                            <x-lucide-logs class="w-4 h-4" />
                            Logs
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>
