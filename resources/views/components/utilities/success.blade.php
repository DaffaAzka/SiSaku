<div>

    @if (session()->has('success'))
        <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1"
            aria-labelledby="hs-bordered-success-style-label">
            <div class="flex">
                <div class="shrink-0">

                    <x-lucide-check-circle class="shrink-0 size-4 text-teal-500 dark:text-teal-400" />

                </div>
                <div class="ms-3">
                    <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
                        {{ session('success.title') }}
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-neutral-400">
                        {{ session('success.message') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

</div>
