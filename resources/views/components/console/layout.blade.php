<x-layout>
        <x-slot:script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    </x-slot>

    <x-console.sidebar></x-console.sidebar>
    <main class="flex-1">
        <x-layout.Topbar></x-layout.Topbar>
        <div class="my-6 mx-auto container max-w-7xl px-6">
            {{ $slot }}
        </div>
    </main>
</x-layout>
