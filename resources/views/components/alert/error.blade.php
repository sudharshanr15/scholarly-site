<div class="bg-light-dp1 dark:bg-dark-dp1 flex items-stretch">
    <span class="bg-alert-error px-4 inline-flex items-center">
        <x-icon.error />
    </span>
    <div class="flex justify-between gap-2 px-6 py-4 w-full">
        <div>
            <p class="text-title-md mb-1">
                <span class="text-alert-error">Error</span>
            </p>
            <p class="text-title-md">
                {{ $slot }}
            </p>
        </div>
        <button>
            <x-icon.close />
        </button>
    </div>
</div>
