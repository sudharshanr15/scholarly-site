<x-layout>
    <x-user.Sidebar></x-user.Sidebar>
    <main class="flex-1">
        <x-layout.Topbar></x-layout.Topbar>
        <div class="my-6 mx-auto container max-w-7xl px-6">
            {{ $slot }}
        </div>
    </main>
</x-layout>