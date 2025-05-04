{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

<div class="p-6 space-y-6">
    <!-- Judul dan tgl -->
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Monitoring Tabungan {{ $class->class . ' ' . $class->majors }}</h1>
        {{-- <div class="relative w-64 mt-3">
            <x-lucide-calendar
                class="absolute w-4 h-4 left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" />
            <input id="flatpickr-tanggal" type="text" placeholder="Pilih Tanggal" readonly wire:model.live="date"
                class="pl-10 py-2 px-3 block w-full border border-gray-300 rounded-md text-sm focus:border-teal-600 focus:ring-teal-600" />
        </div> --}}
    </div>

    <!-- Grafik -->
    <div class="bg-white border border-gray-300 rounded-md p-4">
        <livewire:charts.class-balance-chart :isDay="false" />
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

    <p>{{$date}}</p>    <p>{{$date}}</p>




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
                            {{ number_format($this->getBalance($s->id), 0, ',', thousands_separator: '.') }}</td>
                        <td class="px-3 py-3 space-x-2 whitespace-nowrap">
                            <button class="text-emerald-600 hover:underline" aria-haspopup="dialog"
                                wire:click="$dispatch('studentSelected', { studentId: '{{ $s->id }}' })"
                                aria-expanded="false" aria-controls="transaction-add-modal"
                                data-hs-overlay="#transaction-add-modal">
                                Tambah Saldo
                            </button>
                            <button class="text-blue-600 hover:underline">Laporan</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{ $studentClass->links('vendor.pagination.tailwind') }}
    </div>

    <livewire:modals.transaction.store />

    {{-- <script>
        flatpickr("#flatpickr-tanggal", {
            dateFormat: "d/m/Y",
            maxDate: "31-12-2050"
        });
    </script> --}}
</div>
