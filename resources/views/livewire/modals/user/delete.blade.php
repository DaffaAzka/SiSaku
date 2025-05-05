<div id="user-delete-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="user-delete-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div
            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4">
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#user-delete-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto space-y-8">

                <div class="relative flex items-center justify-center">
                    <div class="absolute w-20 h-20 bg-yellow-100 rounded-full opacity-50"></div>
                    <div
                        class="relative flex items-center justify-center w-16 h-16 bg-yellow-50 rounded-full border-2 border-yellow-200">
                        <div class="text-yellow-500">
                            <x-lucide-alert-triangle class="w-8 h-8" />
                        </div>
                    </div>
                </div>

                <div class="space-y-2 text-center px-8">
                    <h2 class="font-bold text-xl">Konfirmasi</h2>
                    <p class="text-sm">Apakah anda yakin ingin menghapus siswa?</p>
                </div>


                <div class="flex justify-center items-center gap-x-2 mb-8">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 "
                        data-hs-overlay="#user-delete-modal">
                        Close
                    </button>
                    <button type="submit" wire:click='delete'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Delete
                    </button>
                </div>


            </div>
        </div>
    </div>

    <x-utilities.loading />
</div>
