<div id="notification-add-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="notification-add-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="notification-add-modal-label" class="font-bold text-gray-800">
                    {{ $notification ? 'Update Notifikasi' : 'Tambah Notifikasi' }}
                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#notification-add-modal">
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

                <form action="" class="space-y-4 mb-4 relative" wire:submit="storeNotification">

                    <x-utilities.success />
                    <x-utilities.error />

                    @csrf

                    <!-- Class Selection -->
                    @if (!$notification)
                        <div class="relative z-[200]" wire:ignore>
                            <select wire:model.live='class_id'
                                data-hs-select='{
                            "hasSearch": true,
                            "searchLimit": 5,
                            "searchPlaceholder": "Search...",
                            "searchClasses": "focus:outline-none block w-full sm:text-sm border border-gray-200 rounded-lg before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3 focus:border-teal-500 focus:ring-teal-500",
                            "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
                            "placeholder": "Pilih Kelas...",
                            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800\" data-title></span></button>",
                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500",
                            "dropdownClasses": "absolute mt-2 max-h-52 pb-1 px-1 space-y-0.5 z-[300] w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-teal-100",
                            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800\" data-title></div></div></div>",
                            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                            }'
                                class="hidden focus:border-teal-500 focus:ring-teal-500">
                                <option value="">Pilih Kelas (Opsional)</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->grade . ' ' . $class->majors->name . ' ' . $class->class }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endif

                    <!-- User Selection -->
                    @if ($class_id)
                        <select wire:model='user_id'
                            class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">
                            <option value="" selected>Pilih Siswa (Kosongkan akan mengirimkan ke satu kelas)
                            </option>

                            @foreach ($users as $cl)
                                <option value="{{ $cl->id }}">
                                    {{ $cl->name }}</option>
                            @endforeach
                        </select>

                        @error('user_id')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    @endif

                    <!-- Date Input -->
                    <div class="relative">
                        <input wire:model='sent_at' type="date" min="{{ date('Y-m-d') }}"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                            value="{{ now()->toDateString() }}">
                        @error('sent_at')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Message Textarea -->
                    <div class="relative z-[100]">
                        <textarea wire:model='message'
                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                            rows="4" placeholder="Isi Pesan Notifikasi"></textarea>
                        @error('message')
                            <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#notification-add-modal">
                            Close
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-utilities.loading />
</div>
