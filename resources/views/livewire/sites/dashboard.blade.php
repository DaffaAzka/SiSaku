@php
    use Carbon\Carbon;
    use App\Models\Classes;
    use App\Models\User;
    use App\Models\Transaction;
@endphp

<div class="font-sagoe p-4 sm:p-6 text-gray-800 ">
    <h1 class="text-lg sm:text-xl font-semibold mb-4">Selamat pagi, {{ Auth::user()->name }}</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        @if (!$user->hasRole('admin'))
            <div class="bg-white rounded-xl shadow p-4 lg:col-span-2" wire:ignore>
                @if ($user->hasRole('teacher'))
                    {{-- <h2 class="text-sm font-bold mb-4 ">Statistik Tabungan XI RPL 3</h2> --}}
                    <livewire:charts.class-balance-chart />
                @endif

                @if ($user->hasRole('student'))
                    <livewire:charts.student-balance-chart />
                @endif
            </div>
        @endif

        @if ($user->hasRole('admin'))
            <div class="bg-white rounded-xl shadow p-4 lg:col-span-2">
                <h2 class="text-lg font-medium mb-4">Aktivitas Terakhir</h2>
                <div class="overflow-y-auto max-h-[50vh] md:max-h-[45vh]">
                    <table class="w-full divide-y divide-gray-200 rounded-lg border border-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    Transaksi</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    Tanggal</th>
                                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    Nominal</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                    Siswa</th>
                                <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                    Pencatat</th>
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
                                    <td class="px-6 py-4 text-end text-sm text-gray-800">
                                        {{ $tr->student->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-end text-sm text-gray-800">
                                        {{ $tr->teacher->name ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $transaction->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow flex flex-col overflow-hidden">
            <div class="bg-teal-700 text-white text-center p-4">
                <span
                    class="mb-2 inline-flex items-center justify-center size-11 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ Str::ucfirst(Auth::user()->name[0]) }}
                </span>
                <p class="font-semibold">{{ Auth::user()->name }}</p>

                @if (!$user->hasRole('admin'))
                    <p class="text-sm">{{ $class->grade . ' ' . $class->majors->name . ' ' . $class->class }}</p>
                @endif

            </div>
            <div class="text-center p-4">

                @if ($user->hasRole('teacher') || $user->hasRole('admin'))
                    <p class="text-sm text-gray-600">Saldo Keseluruhan</p>
                @endif

                @if ($user->hasRole('student'))
                    <p class="text-sm text-gray-600">Sisa Saldo</p>
                @endif

                <p class="text-2xl font-bold text-gray-800">Rp.
                    {{ number_format($balance, 0, ',', thousands_separator: '.') }}</p>

            </div>
            <div class="p-4 mt-auto">
                @if ($user->hasRole('student'))
                    <button wire:click="$dispatch('studentExportSelected', { id: {{ Auth::id() }} })"
                        aria-controls="transaction-export-modal" data-hs-overlay="#transaction-export-modal"
                        class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold">
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

                @if ($user->hasRole('admin'))
                    <div class="space-y-2">
                        <button aria-controls="transaction-export-modal" data-hs-overlay="#transaction-export-modal"
                            class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold">
                            Cetak Laporan
                        </button>

                        <button wire:click='logout'
                            class="w-full bg-red-700 hover:bg-red-800 text-white py-2 rounded-md font-semibold">
                            Keluar
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if ($user->hasRole('student') || $user->hasRole('teacher'))
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
            <div class="bg-white space-y-4 rounded-xl shadow p-4 min-h-[150px] lg:col-span-2">
                <h2 class="text-sm font-semibold mb-2 ">Transaksi Terakhir</h2>
                <div class="overflow-x-auto">
                    @if ($user->hasRole('teacher'))
                        <table class="w-full divide-y divide-gray-200 rounded-lg border border-gray-200 table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Transaksi</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Tanggal</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Nominal</th>
                                    <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                        Siswa</th>
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
                                        <td class="px-6 py-4 text-end text-sm text-gray-800">
                                            {{ $tr->student->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    @if ($user->hasRole('student'))
                        <table class="w-full divide-y divide-gray-200 rounded-lg border border-gray-200 table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Transaksi</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Tanggal</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Nominal</th>
                                    <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                        Pencatat</th>
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
                                        <td class="px-6 py-4 text-end text-sm text-gray-800">
                                            {{ $tr->teacher->name ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>

                <div class="">
                    {{ $transaction->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endif

    @if ($user->hasRole('admin'))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

            <div class="mt-2 bg-blue-100 border border-blue-200 text-sm text-blue-800 rounded-lg p-4" role="alert"
                tabindex="-1" aria-labelledby="hs-soft-color-info-label">
                <p id="hs-soft-color-info-label" class="font-bold">Jumlah Seluruh Kelas</p>
                <h3 class="font-bold text-2xl">{{ Classes::count() }}</h3>
                <p class="mt-1 text-sm">Dengan saldo rata-ratanya Rp.
                    {{ number_format($total, 0, ',', thousands_separator: '.') }}</p>
            </div>

            <div class="mt-2 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert"
                tabindex="-1" aria-labelledby="hs-soft-color-success-label">
                <p id="hs-soft-color-info-label" class="font-bold">Jumlah Semua Guru</p>
                <h3 class="font-bold text-2xl">{{ User::role('teacher')->count() }}</h3>
                <p class="mt-1 text-sm"></p>
            </div>

            <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert"
                tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                <p id="hs-soft-color-info-label" class="font-bold">Jumlah Semua Siswa</p>
                <h3 class="font-bold text-2xl">{{ User::role('student')->count() }}</h3>
                {{-- <p class="mt-1 text-sm">Dengan saldo rata-ratanya Rp.
                    {{ number_format($balance, 0, ',', thousands_separator: '.') }}</p> --}}

            </div>

            <div class="mt-2 bg-yellow-100 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4"
                role="alert" tabindex="-1" aria-labelledby="hs-soft-color-warning-label">
                <p id="hs-soft-color-info-label" class="font-bold">Jumlah Seluruh Transaksi</p>
                <h3 class="font-bold text-2xl">{{ Transaction::count() }}</h3>

            </div>

        </div>
    @endif

    <livewire:modals.transaction.store />
    <livewire:modals.report.index>

        {{-- Loading Spinner --}}
        <x-utilities.loading />

</div>
