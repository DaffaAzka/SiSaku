{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

@php
    use Carbon\Carbon;
@endphp

<div class="p-6 space-y-6">
    <!-- Judul dan tgl -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Monitoring Tabungan
            {{ $class->grade . ' ' . $class->majors->name . ' ' . $class->class }}</h1>
        {{-- <div class="relative w-64 mt-3">
            <x-lucide-calendar
                class="absolute w-4 h-4 left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" />
            <input id="flatpickr-tanggal" type="text" placeholder="Pilih Tanggal" readonly wire:model.live="date"
                class="pl-10 py-2 px-3 block w-full border border-gray-300 rounded-md text-sm focus:border-teal-600 focus:ring-teal-600" />
        </div> --}}
    </div>

    <x-utilities.error />

    <!-- Grafik -->
    <div class="bg-white border border-gray-300 rounded-md p-4">

        @if ($user->hasRole('admin'))
            @if ($class->teacher != null)
                <livewire:charts.class-balance-chart :isDay="false" :adminId="$class->teacher->id" />
            @else
                <h2 class="text-base font-medium">Cart tidak bisa diakses, dikarenakan kelas tidak memiliki wali kelas.
                </h2>
            @endif
        @else
            <livewire:charts.class-balance-chart :isDay="false" />
        @endif

    </div>

    <!-- Search dan laporan -->
    <div class="flex flex-col md:flex-row md:items-center gap-4">
        <div class="flex flex-1 relative">
            <span class="absolute left-3 top-2.5 text-gray-400">
                <x-lucide-search class="w-4 h-4" />
            </span>
            <input type="text" placeholder="Search" wire:model.live='search'
                class="w-full pl-9 pr-4 py-1.5 rounded-md border border-gray-300 focus:ring-2 focus:ring-emerald-600 focus:outline-none" />
        </div>
        <div>
            <button
                class="w-full md:w-auto bg-emerald-700 hover:bg-emerald-800 text-white px-5 py-2 rounded-md text-sm font-medium">
                Cetak Laporan Keseluruhan
            </button>
        </div>
    </div>

    <p>{{ $date }}</p>
    <p>{{ $date }}</p>




    <!-- Tabel -->
    <div class="overflow-x-auto border border-gray-300 rounded-md">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-150 text-gray-600 font-medium">
                <tr>
                    <th class="px-3 py-3">Name</th>
                    <th class="px-3 py-3">Email</th>
                    <th class="px-3 py-3">NISN</th>
                    <th class="px-3 py-3">Birth Date</th>
                    <th class="px-3 py-3">Balance</th>
                    <th class="px-3 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($studentClass as $s)
                    <tr>
                        <td class="px-3 py-3">{{ $s->name }}</td>
                        <td class="px-3 py-3">{{ $s->email }}</td>
                        <td class="px-3 py-3">{{ $s->nisn }}</td>
                        <td class="px-3 py-3">{{ $s->birth_date }}</td>
                        <td class="px-3 py-3">
                            Rp. {{ number_format($this->getBalance($s->id), 0, ',', thousands_separator: '.') }}</td>
                        <td class="px-3 py-3 space-x-4 whitespace-nowrap">
                            <button class="text-emerald-600 hover:underline" aria-haspopup="dialog"
                                wire:click="$dispatch('studentSelected', { studentId: '{{ $s->id }}' })"
                                aria-expanded="false" aria-controls="transaction-add-modal"
                                data-hs-overlay="#transaction-add-modal">
                                Tambah Transaksi
                            </button>
                            <button class="text-blue-600 hover:underline">Laporan</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $studentClass->links('vendor.pagination.tailwind') }}
    </div>

    <div class="bg-white space-y-4 rounded-xl shadow p-4 min-h-[150px] lg:col-span-2">
        <h2 class="text-sm font-semibold mb-2 ">Daftar Transaksi Siswa</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="relative z-[50]" wire:ignore>
                <select wire:model.live='student_id'
                    data-hs-select='{
                                "hasSearch": true,
                                "searchLimit": 5,
                                "searchPlaceholder": "Search...",
                                "searchClasses": "focus:outline-none block w-full sm:text-sm border border-gray-200 rounded-lg before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3 focus:border-teal-500 focus:ring-teal-500",
                                "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
                                "placeholder": "Pilih Siswa...",
                                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800\" data-title></span></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500",
                                "dropdownClasses": "absolute mt-2 max-h-52 pb-1 px-1 space-y-0.5 z-[300] w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-teal-100",
                                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800\" data-title></div></div></div>",
                                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                }'
                    class="hidden focus:border-teal-500 focus:ring-teal-500 z-[400]">
                    <option value="">Pilih Siswa...</option>
                    @foreach ($class->students()->get() as $m)
                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-span-1">
                <select wire:model.live='type_transaction'
                    class="border border-gray-300 rounded-lg px-4 py-3 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option selected value="">Tipe Transaksi</option>
                    <option value="deposit">DEPOSIT</option>
                    <option value="withdrawal">WITHDRAWAL</option>

                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full divide-y divide-gray-200 rounded-lg border border-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Transaksi</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Tanggal</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Nominal</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Siswa</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Pencatat</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($transaction as $tr)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ Str::upper($tr->type) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ Carbon::parse($tr->created_at)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">Rp.
                                {{ number_format($tr->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ $tr->student->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ $tr->teacher->name ?? 'N/A' }}</td>
                            @if ($user->hasRole('admin') || $tr->teacher_id == $user->id)
                                <td class="px-6 py-4 text-sm space-x-2 whitespace-nowrap">
                                    <button class="text-blue-600 hover:underline"
                                        wire:click="$dispatch('transactionSelected', { id: '{{ $tr->id }}' })"
                                        aria-expanded="false" aria-controls="transaction-add-modal"
                                        data-hs-overlay="#transaction-add-modal">Update</button>

                                    <button class="text-red-600 hover:underline"
                                        wire:click="$dispatch('deleteSelected', { id: '{{ $tr->id }}' })"
                                        aria-expanded="false" aria-controls="transaction-delete-modal"
                                        data-hs-overlay="#transaction-delete-modal">Delete</button>

                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $transaction->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <livewire:modals.transaction.store />
    <livewire:modals.transaction.delete>

    {{-- <script>
        flatpickr("#flatpickr-tanggal", {
            dateFormat: "d/m/Y",
            maxDate: "31-12-2050"
        });
    </script> --}}
</div>
