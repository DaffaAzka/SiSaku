<div id="user-password-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="user-password-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="user-password-modal-label" class="font-bold text-gray-800">
                    Ganti password
                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#user-password-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">

                <form action="" class="space-y-4 mb-4 relative" wire:submit="submit">

                    <x-utilities.success />
                    <x-utilities.error />

                    <div class="relative">
                        <input wire:model='password' type="password" id="hs-inline-leading-pricing-select-label"
                            name="password"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Password">

                        @error('password')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="relative">
                        <input wire:model='password_confirmation' type="password"
                            id="hs-inline-leading-pricing-select-label" name="password_confirmation"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Konfirmasi Password">

                        @error('password_confirmation')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#user-password-modal">
                            Close
                        </button>

                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none">
                            Save
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <x-utilities.loading />
</div>
