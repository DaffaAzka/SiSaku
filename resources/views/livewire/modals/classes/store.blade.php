<div id="classes-add-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="classes-add-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div
            class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                <h3 id="classes-add-modal-label" class="font-bold text-gray-800 dark:text-white">
                    {{ $classes ? $classes->grade . ' ' . $classes->majors->name . ' ' . $classes->class : "Tambah Kelas" }}
                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                    aria-label="Close" data-hs-overlay="#classes-add-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4">

                <form action="" class="space-y-4 mb-4 relative h-fit" wire:submit="store">

                    <x-utilities.success />
                    <x-utilities.error />

                    @if ($warningTeacher)
                        <div class="bg-yellow-50 border-t-2 border-yellow-500 rounded-lg p-4 dark:bg-yellow-800/30"
                            role="alert" tabindex="-1" aria-labelledby="hs-bordered-error-style-label">
                            <div class="flex">
                                <div class="shrink-0">

                                    <x-lucide-circle-alert
                                        class="shrink-0 size-4 text-yellow-500 dark:text-yellow-400" />

                                </div>
                                <div class="ms-3">
                                    <h3 id="hs-bordered-error-style-label"
                                        class="text-gray-800 font-semibold dark:text-white">
                                        Warning
                                    </h3>
                                    <p class="text-sm text-gray-700 dark:text-neutral-400">
                                        Guru ini sudah menjadi walas dari kelas lain. Jika anda ingin melanjutkan
                                        tindakan, guru
                                        tersebut akan kehilangan akses dari kelas sebelumnya!
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @csrf

                    {{-- @if ($classes) --}}

                        <div class="{{ !$classes ? 'hidden' : 'block' }} space-y-4">
                            <div class="relative z-[300] max-h-20 overflow-x">
                                <select wire:model.live="major_id"
                                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border">
                                    <option value="">Pilih Jurusan...</option>
                                    @foreach ($majors as $m)
                                        <option value="{{ $m->id }}" @selected($m->id == $major_id)>
                                            {{ $m->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative z-[200] max-h-20 overflow-x">
                                <select wire:model.live="teacher_id"
                                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 border">
                                    <option value="">Pilih Wali Kelas...</option>
                                    @foreach ($teachers as $t)
                                        <option value="{{ $t->id }}" @selected($t->id == $teacher_id)>
                                            {{ $t->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- @else --}}
                        <div class="{{ $classes ? 'hidden' : 'block' }}">
                            <div class="relative z-[300]" wire:ignore>
                                <select wire:model.live='major_id'
                                    data-hs-select='{
                                "hasSearch": true,
                                "searchLimit": 5,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "focus:outline-none block w-full sm:text-sm border border-gray-200 rounded-lg before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3 focus:border-teal-500 focus:ring-teal-500 dark:focus:border-teal-600 dark:focus:ring-teal-600",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Jurusan...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:border-teal-600 dark:focus:ring-teal-600",
                                "dropdownClasses": "absolute mt-2 max-h-52 pb-1 px-1 space-y-0.5 z-[300] w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-teal-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-teal-900",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                }'
                                    class="hidden focus:border-teal-500 focus:ring-teal-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 z-[400]">
                                    <option>Pilih Jurusan...</option>
                                    @foreach ($majors as $m)
                                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('major_id')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>



                        <div class="">
                            <div class="relative z-[200]" wire:ignore>
                                <select wire:model.live='teacher_id'
                                    data-hs-select='{
                                "hasSearch": true,
                                "searchLimit": 5,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "focus:outline-none block w-full sm:text-sm border border-gray-200 rounded-lg before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3 focus:border-teal-500 focus:ring-teal-500 dark:focus:border-teal-600 dark:focus:ring-teal-600",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                "placeholder": "Pilih Wali Kelas...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:border-teal-600 dark:focus:ring-teal-600",
                                "dropdownClasses": "absolute mt-2 max-h-52 pb-1 px-1 space-y-0.5 z-[300] w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-teal-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-teal-900",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                }'
                                    class="hidden focus:border-teal-500 focus:ring-teal-500 dark:focus:border-teal-600 dark:focus:ring-teal-600 z-[400]">
                                    <option>Pilih Wali Kelas...</option>
                                    @foreach ($teachers as $m)
                                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('teacher_id')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- @endif --}}


                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-[100]">

                            <div class="">
                                <div class="relative">
                                    <input wire:model='class' type="number" id="hs-inline-leading-pricing-select-label"
                                        name="inline-add-on"
                                        class="py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:border-teal-600 dark:focus:ring-teal-600"
                                        placeholder="Pilih Kelas">
                                </div>

                                @error('class')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="relative">
                                <select id="hs-select-transaction" wire:model='grade'
                                    class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:border-teal-600 dark:focus:ring-teal-600">
                                    <option selected>Pilih Tingkat</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XIII">XIII</option>
                                </select>

                                @error('grade')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div
                            class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                            <button type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 "
                                data-hs-overlay="#transaction-add-modal">
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
