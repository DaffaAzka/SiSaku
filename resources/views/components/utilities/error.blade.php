<div>

    @if (session()->has('error'))
        <div class="bg-red-50 border-t-2 border-red-500 rounded-lg p-4 dark:bg-red-800/30" role="alert" tabindex="-1"
            aria-labelledby="hs-bordered-error-style-label">
            <div class="flex">
                <div class="shrink-0">

                    <x-lucide-circle-x class="shrink-0 size-4 text-red-500 dark:text-red-400" />

                </div>
                <div class="ms-3">
                    <h3 id="hs-bordered-error-style-label" class="text-gray-800 font-semibold dark:text-white">
                        {{ session('error.title') }}
                    </h3>
                    <p class="text-sm text-gray-700 dark:text-neutral-400">
                        {{ session('error.message') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

</div>
