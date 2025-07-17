<header class="z-10 py-4 navbar border-b">
    <div class="container flex items-center justify-between mx-auto">
        <div></div>
        <div class="flex gap-12 items-center">
{{--            <form action="{{ route('logout') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <button type="submit">Logout</button>--}}
{{--            </form>--}}
            <button class="block">
                <x-icon.contrast />
            </button>
            <button class="inline-flex items-center gap-4">
                <span class="h-12 inline-flex items-center justify-center aspect-square bg-primary rounded-full">
                    <span class="font-bold text-label-lg">
                        A
                    </span>
                </span>
                <span class="inline-block text-label-lg">Admin</span>
                <span class="inline-block">
                    <x-icon.arrow-drop-down />
                </span>
            </button>
        </div>
    </div>
</header>
