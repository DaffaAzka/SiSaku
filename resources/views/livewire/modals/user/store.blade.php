<div id="user-store-modal" wire:ignore.self
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[90] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="user-store-modal-label">
    <div
        class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                <h3 id="user-store-modal-label" class="font-bold text-gray-800">
                    @if ($roleOption == '1')
                        {{ $student->name ?? 'Tambah siswa baru' }}
                    @else
                        {{ $student->name ?? 'Tambah user baru' }}
                    @endif
                </h3>
                <button type="button"
                    class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#user-store-modal">
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

                <form action="" class="space-y-4 mb-4 relative" wire:submit="store">

                    <x-utilities.success />
                    <x-utilities.error />

                    @if ($user->hasRole('admin'))
                        <div class="relative">
                            <select wire:model.live='roleOption'
                                class="border border-gray-300 rounded-lg px-4 py-3 text-sm w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option selected value="">Role</option>
                                <option selected value="3">Admin</option>
                                <option selected value="2">Teacher</option>
                                <option selected value="1">Student</option>

                            </select>
                        </div>
                    @endif

                    @if ($roleOption)


                        <div class="relative">
                            <input wire:model='name' type="text" id="hs-inline-leading-pricing-select-label"
                                name="name"
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
                            <input wire:model='password' type="password" id="hs-inline-leading-pricing-select-label"
                                name="password"
                                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Password">

                            @error('password')
                                <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        @if ($roleOption == 1 && $user->hasRole('admin'))
                            <select id="hs-select-gender" wire:model='class'
                                class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" selected>Pilih Kelas</option>

                                @foreach ($classes as $cl)
                                    <option value="{{ $cl->id }}">
                                        {{ $cl->grade . ' ' . $cl->majors->name . ' ' . $cl->class }}</option>
                                @endforeach
                            </select>
                        @endif



                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative">

                            @if ($roleOption == 1)
                                <div class="relative">
                                    <input wire:model='nisn' type="text" id="hs-inline-leading-pricing-select-label"
                                        name="nisn"
                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="NISN Siswa">

                                    @error('nisn')
                                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @endif

                            @if ($roleOption == 2)
                                <div class="relative">
                                    <input wire:model='nip' type="text" id="hs-inline-leading-pricing-select-label"
                                        name="nip"
                                        class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="NIP Guru">

                                    @error('nip')
                                        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            @endif


                            <div class="relative">
                                <input wire:model='birth' type="date" id="hs-inline-leading-pricing-select-label"
                                    name="birth"
                                    class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">

                                @error('birth')
                                    <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 relative z-[100]">

                            <div class="">
                                <div class="relative">
                                    <input wire:model='phone' type="text"
                                        id="hs-inline-leading-pricing-select-label" name="phone"
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
                                <select id="hs-select-gender" wire:model='gender'
                                    class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-teal-500 focus:ring-teal-500 disabled:opacity-50 disabled:pointer-events-none">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>

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
                                data-hs-overlay="#user-store-modal">
                                Close
                            </button>

                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-hidden focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save
                            </button>
                        </div>

                    @endif



                </form>

            </div>
        </div>
    </div>


    <x-utilities.loading />

</div>
