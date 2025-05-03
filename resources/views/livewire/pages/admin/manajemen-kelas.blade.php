<div class="p-6 min-h-screen font-sans">
    <h1 class="text-3xl font-semibold mb-6">Manajemen Kelas</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="relative col-span-1">
        <x-lucide-search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
        <input type="text" placeholder="Search"
          class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="col-span-1">
        <select
          class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option selected disabled>Jurusan</option>
        </select>
      </div>

      <div class="col-span-1">
        <select
          class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option selected disabled>Kelas</option>
        </select>
      </div>

      <div class="col-span-1 flex sm:justify-end items-center">
        <button
        class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 min-w-[150px] rounded-lg text-sm font-medium whitespace-nowrap">
        Tambah Akun
        </button>
      </div>
    </div>

    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="border border-gray-200 rounded-lg overflow-hidden dark:border-neutral-700">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead>
                <tr>
                  <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Name</th>
                  <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Teacher</th>
                  <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Count</th>
                  <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Balanace</th>
                  <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 text-sm font-medium text-gray-800">John Brown</td>
                  <td class="px-6 py-4 text-sm text-gray-800">admin@gmail.com</td>
                  <td class="px-6 py-4 text-sm text-gray-800">0009321234</td>
                  <td class="px-6 py-4 text-sm text-gray-800">Teacher</td>
                  <td class="px-6 py-4 text-end text-sm font-medium">
                    <div class="flex justify-end gap-2">
                    <a href="#" class="text-blue-600 hover:underline">More</a>
                    <a href="#" class="text-blue-600 hover:underline">Update</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 text-sm font-medium text-gray-800">Jim Green</td>
                  <td class="px-6 py-4 text-sm text-gray-800">admin@gmail.com</td>
                  <td class="px-6 py-4 text-sm text-gray-800">0009321234</td>
                  <td class="px-6 py-4 text-sm text-gray-800">Teacher</td>
                  <td class="px-6 py-4 text-end text-sm font-medium">
                    <div class="flex justify-end gap-2">
                    <a href="#" class="text-blue-600 hover:underline">More</a>
                    <a href="#" class="text-blue-600 hover:underline">Update</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 text-sm font-medium text-gray-800">Joe Black</td>
                  <td class="px-6 py-4 text-sm text-gray-800">admin@gmail.com</td>
                  <td class="px-6 py-4 text-sm text-gray-800">0009321234</td>
                  <td class="px-6 py-4 text-sm text-gray-800">Admin</td>
                  <td class="px-6 py-4 text-end text-sm font-medium">
                    <div class="flex justify-end gap-2">
                    <a href="#" class="text-blue-600 hover:underline">More</a>
                    <a href="#" class="text-blue-600 hover:underline">Update</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4 text-sm font-medium text-gray-800">Edward King</td>
                  <td class="px-6 py-4 text-sm text-gray-800">admin@gmail.com</td>
                  <td class="px-6 py-4 text-sm text-gray-800">0009321234</td>
                  <td class="px-6 py-4 text-sm text-gray-800">Admin</td>
                  <td class="px-6 py-4 text-end text-sm font-medium">
                    <div class="flex justify-end gap-2">
                    <a href="#" class="text-blue-600 hover:underline">More</a>
                    <a href="#" class="text-blue-600 hover:underline">Update</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="flex justify-between items-center mt-6 text-sm text-gray-600">
      <div>
        <span class="cursor-pointer hover:text-gray-800">«</span>
        <span class="mx-2 font-semibold text-gray-800">1</span>
        <span class="cursor-pointer hover:text-gray-800">of 3 »</span>
      </div>
    </div>
  </div>
