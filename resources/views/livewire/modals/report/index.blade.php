<div id="transaction-export-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="transaction-export-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="" class="font-bold text-gray-800">
                    Cetak Laporan Transaksi
                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#transaction-export-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 space-y-4">

                <x-utilities.error />

                <form action="" class="space-y-4 mb-4 relative" wire:submit='export'>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="">
                            <label for="startDate" class="block text-sm font-medium mb-2">Tanggal Mulai</label>
                            <div class="relative">
                                <input wire:model="startDate" type="date" id="startDate" name="startDate"
                                    max="{{ date('Y-m-d') }}"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">
                            </div>
                        </div>

                        <div class="">
                            <label for="endDate" class="block text-sm font-medium mb-2">Tanggal Akhir</label>
                            <div class="relative">
                                <input wire:model="endDate" type="date" id="endDate" name="endDate"
                                    max="{{ date('Y-m-d') }}"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">
                            </div>
                        </div>
                    </div>

                    @if (Auth::user()->hasRole('admin'))
                        <div class="relative z-[300]" wire:ignore>
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
                                class="hidden focus:border-teal-500 focus:ring-teal-500 z-[400]">
                                <option value="">Pilih Kelas...</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">
                                        {{ $class->grade . ' ' . $class->majors->name . ' ' . $class->class }}</option>
                                @endforeach
                            </select>
                        </div>

                    @endif

                    <div class="flex justify-center items-center gap-x-2 mb-8">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                            data-hs-overlay="#transaction-export-modal">
                            Close
                        </button>
                        <button type="submit" wire:click='export'
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-lime-600 text-white hover:bg-lime-700 focus:outline-hidden focus:bg-lime-700 disabled:opacity-50 disabled:pointer-events-none">
                            Export
                        </button>
                    </div>

                </form>


            </div>
        </div>
    </div>

    <x-utilities.loading />
</div>
