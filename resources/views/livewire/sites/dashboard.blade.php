@php
    use Carbon\Carbon;
@endphp

<div class="font-sagoe p-4 sm:p-6 text-gray-800 dark:text-gray-200">
    <h1 class="text-lg sm:text-xl font-semibold mb-4 dark:text-white">Selamat pagi, {{ Auth::user()->name }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="bg-white dark:bg-neutral-800 rounded-xl shadow p-4 lg:col-span-2">
            @if ($user->hasRole('teacher'))
                {{-- <h2 class="text-sm font-bold mb-4 dark:text-gray-200">Statistik Tabungan XI RPL 3</h2> --}}
                <livewire:charts.class-balance-chart />
            @endif

            @if ($user->hasRole('student'))
                <livewire:charts.student-balance-chart />
            @endif

        </div>

        <div class="bg-white dark:bg-neutral-800 rounded-xl shadow flex flex-col overflow-hidden">
            <div class="bg-teal-700 text-white text-center p-4">
                <div class="w-16 h-16 bg-red-300 rounded-full mx-auto mb-2"></div>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm">{{ $class->class . ' ' . $class->majors }}</p>
            </div>
            <div class="text-center p-4">

                @if ($user->hasRole('teacher'))
                    <p class="text-sm text-gray-600 dark:text-gray-400">Saldo Keseluruhan</p>
                @endif

                @if ($user->hasRole('student'))
                    <p class="text-sm text-gray-600 dark:text-gray-400">Sisa Saldo</p>
                @endif

                <p class="text-2xl font-bold text-gray-800 dark:text-white">Rp.
                    {{ number_format($balance, 0, ',', '.') }}</p>

            </div>
            <div class="p-4 mt-auto">
                @if ($user->hasRole('student'))
                    <button class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold">
                        Cetak Laporan
                    </button>
                @endif

                @if ($user->hasRole('teacher'))
                    <button class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="transaction-add-modal"
                        data-hs-overlay="#transaction-add-modal">
                        Tambah Transaksi
                    </button>
                @endif
            </div>
        </div>
    </div>

    @if ($user->hasRole('student'))
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
            <div class="bg-white dark:bg-neutral-800 rounded-xl shadow p-4 min-h-[150px] lg:col-span-2">
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-4">
                    <div class="bg-white dark:bg-neutral-800 rounded-xl shadow p-4 min-h-[150px]">
    @endif
    <h2 class="text-sm font-semibold mb-2 dark:text-gray-200">Informasi Terakhir</h2>
    <div class="overflow-x-auto">
        @if ($user->hasRole('teacher'))
            <table
                class="w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg border border-gray-200 dark:border-gray-700 table-auto">
                <thead class="bg-gray-50 dark:bg-[#23304d]">
                    <tr>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Transaksi</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Tanggal</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Nominal</th>
                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Siswa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($transaction as $tr)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">
                                {{ Str::upper($tr->type) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">
                                {{ Carbon::parse($tr->created_at)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">Rp.
                                {{ number_format($tr->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-end text-sm text-gray-800 dark:text-gray-300">
                                {{ $tr->student->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if ($user->hasRole('student'))
            <table
                class="w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg border border-gray-200 dark:border-gray-700 table-auto">
                <thead class="bg-gray-50 dark:bg-[#23304d]">
                    <tr>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Transaksi</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Tanggal</th>
                        <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Nominal</th>
                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Pencatat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($transaction as $tr)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">
                                {{ Str::upper($tr->type) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">
                                {{ Carbon::parse($tr->created_at)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-300">Rp.
                                {{ number_format($tr->amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-end text-sm text-gray-800 dark:text-gray-300">
                                {{ $tr->teacher->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
</div>

@if ($user->hasRole('teacher'))
    <div class="bg-white dark:bg-neutral-800 rounded-xl shadow p-4">
        <h2 class="text-sm font-semibold mb-2 dark:text-gray-200">Peringkat Siswa</h2>
        <div class="overflow-x-auto">
            <table
                class="min-w-full table-auto divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 text-sm">
                <thead class="bg-gray-50 dark:bg-[#23304d]">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">
                            Peringkat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Anisa Putri</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">1</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Rafi Ahmad</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">2</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Nadira Salsabila</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">3</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Bima Putra</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">4</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Salsa Aulia</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">5</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">Rizky Maulana</td>
                        <td class="px-4 py-2 text-gray-800 dark:text-gray-300">6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif

</div>

<livewire:modals.transaction.store />

{{-- Loading Spinner --}}
<x-utilities.loading />

</div>
