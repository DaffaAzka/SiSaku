<div class="">
    <div id="profile-modal" wire:ignore.self
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="profile-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4">
                    <h3 id="profile-modal-label" class="font-bold text-gray-800">
                        Profile User
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#profile-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-2 overflow-y-auto">

                    <form action="" class="space-y-4 mb-4 relative" wire:submit="store">

                        <x-utilities.success />
                        <x-utilities.error />

                        <div class="relative">
                            <input wire:model='name' type="text" id="hs-inline-leading-pricing-select-label"
                                name="name" disabled
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Nama">

                            @error('name')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="relative">
                            <input wire:model='email' type="email" id="hs-inline-leading-pricing-select-label"
                                name="email"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Email">

                            @error('email')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="relative">
                            <input wire:model='class' type="text" id="hs-inline-leading-pricing-select-label"
                                name="class" disabled
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Class">

                            @error('class')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="relative">
                            <input wire:model='nisn' type="text" id="hs-inline-leading-pricing-select-label"
                                name="nisn" disabled
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="NISN Siswa">

                            @error('nisn')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-[100]">

                            <div class="">
                                <div class="relative">
                                    <input wire:model='phone' type="text" id="hs-inline-leading-pricing-select-label"
                                        name="phone"
                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Nomor Telepon">

                                    @error('phone')
                                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="relative">
                                <input wire:model='gender' type="text" id="hs-inline-leading-pricing-select-label"
                                        name="gender" disabled
                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Jenis Kelamin">

                                    @error('gender')
                                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>
                        </div>

                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                data-hs-overlay="#profile-modal">
                                Close
                            </button>

                            <button type="button" aria-expanded="false" aria-controls="user-password-modal"
                                data-hs-overlay="#user-password-modal"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                Ganti Password
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

    <livewire:modals.user.forgot-password :id="Auth::id()" />

</div>
