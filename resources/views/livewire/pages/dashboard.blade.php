<div class="font-sagoe bg-white p-4 sm:p-6">
    <h1 class="text-lg sm:text-xl font-semibold mb-4">Selamat pagi, Guru</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
      <div class="bg-white rounded-xl shadow p-4 lg:col-span-2">
        <h2 class="text-sm font-bold mb-4">Statistik Tabungan XI RPL 3</h2>
        <div id="hs-single-area-chart" class="h-64 w-full"></div>
      </div>

      <div class="bg-white rounded-xl shadow flex flex-col overflow-hidden">
        <div class="bg-teal-700 text-white text-center p-4">
          <div class="w-16 h-16 bg-red-300 rounded-full mx-auto mb-2"></div>
          <p class="font-semibold">H. Syamsuni S.Pd</p>
          <p class="text-sm">Wali Kelas XI RPL 3</p>
        </div>
        <div class="text-center p-4">
          <p class="text-sm text-gray-600">Saldo Keseluruhan</p>
          <p class="text-2xl font-bold text-gray-800">Rp. 1.000.000</p>
        </div>
        <div class="p-4 mt-auto">
          <button class="w-full bg-teal-700 hover:bg-teal-800 text-white py-2 rounded-md font-semibold">
            Cetak Laporan
          </button>
        </div>
      </div>
    </div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div class="bg-white rounded-xl shadow p-4 min-h-[150px]">
      <h2 class="text-sm font-semibold mb-2">Informasi Terakhir</h2>
      <table class="w-full divide-y divide-gray-200 rounded-lg border border-gray-200 table-auto">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Judul</th>
            <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
            <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Hapus</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 text-sm text-gray-800">Pembagian Buku Tabungan</td>
            <td class="px-6 py-4 text-sm text-gray-800">01 Mei 2025</td>
            <td class="px-6 py-4 text-end text-sm text-red-600 hover:underline cursor-pointer">Hapus</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm text-gray-800">Kelas Tambahan Pagi</td>
            <td class="px-6 py-4 text-sm text-gray-800">30 April 2025</td>
            <td class="px-6 py-4 text-end text-sm text-red-600 hover:underline cursor-pointer">Hapus</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm text-gray-800">Pengumpulan Buku Tabungan</td>
            <td class="px-6 py-4 text-sm text-gray-800">29 April 2025</td>
            <td class="px-6 py-4 text-end text-sm text-red-600 hover:underline cursor-pointer">Hapus</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm text-gray-800">Sosialisasi Menabung</td>
            <td class="px-6 py-4 text-sm text-gray-800">28 April 2025</td>
            <td class="px-6 py-4 text-end text-sm text-red-600 hover:underline cursor-pointer">Hapus</td>
          </tr>
          <tr>
            <td class="px-6 py-4 text-sm text-gray-800">Pemberitahuan Kelas Online</td>
            <td class="px-6 py-4 text-sm text-gray-800">27 April 2025</td>
            <td class="px-6 py-4 text-end text-sm text-red-600 hover:underline cursor-pointer">Hapus</td>
          </tr>
        </tbody>
      </table>
    </div>

      <div class="bg-white rounded-xl shadow p-4">
        <h2 class="text-sm font-semibold mb-2">Peringkat Siswa</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto divide-y divide-gray-200 border border-gray-200 text-sm">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peringkat</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr><td class="px-4 py-2">Anisa Putri</td><td class="px-4 py-2">1</td></tr>
              <tr><td class="px-4 py-2">Rafi Ahmad</td><td class="px-4 py-2">2</td></tr>
              <tr><td class="px-4 py-2">Nadira Salsabila</td><td class="px-4 py-2">3</td></tr>
              <tr><td class="px-4 py-2">Bima Putra</td><td class="px-4 py-2">4</td></tr>
              <tr><td class="px-4 py-2">Salsa Aulia</td><td class="px-4 py-2">5</td></tr>
              <tr><td class="px-4 py-2">Rizky Maulana</td><td class="px-4 py-2">6</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ApexChart Script -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var options = {
          chart: { height: 300, type: 'area', toolbar: { show: false }, zoom: { enabled: false } },
          series: [{ name: 'Tabungan', data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70] }],
          xaxis: {
            categories: ['25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan', '31 Jan', '1 Feb', '2 Feb', '3 Feb', '4 Feb', '5 Feb'],
            labels: { style: { colors: '#9ca3af', fontSize: '13px', fontFamily: 'Inter', fontWeight: 400 } }
          },
          yaxis: {
            labels: {
              formatter: (value) => value >= 1000 ? `${value / 1000}k` : value,
              style: { colors: '#9ca3af', fontSize: '13px', fontFamily: 'Inter', fontWeight: 400 }
            }
          },
          dataLabels: { enabled: false },
          stroke: { curve: 'smooth', width: 2 },
          fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.1, opacityTo: 0.6, stops: [0, 90, 100] } },
          grid: { strokeDashArray: 2, borderColor: '#e5e7eb' },
          tooltip: { x: { format: 'dd MMM' } },
          responsive: [{
            breakpoint: 768,
            options: {
              chart: { height: 250 },
              xaxis: { labels: { style: { fontSize: '11px' } } },
              yaxis: { labels: { style: { fontSize: '11px' } } }
            }
          }]
        };

        var chart = new ApexCharts(document.querySelector("#hs-single-area-chart"), options);
        chart.render();
      });
    </script>
  </div>
