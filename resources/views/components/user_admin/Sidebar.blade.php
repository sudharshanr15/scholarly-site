<?php

$pages = [
    "Faculty" => [
        "route" => "user_admin.faculty.index"
    ],
]

?>

<div class="relative hidden md:block transition duration-150 z-20 min-h-screen w-min">
    <aside class="absolute md:relative bg-light-fg h-full dark:bg-dark-fg">
        <div class="w-64 overflow-y-auto py-4">
            <ul class="mt-6 text-gray-500 dark:text-gray-400">
                @foreach($pages as $page => $val)
                <li class="relative px-6 py-3">
                    @if(request()->routeIs($val['route']))
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg"
                    >
                    </span>
                    @endif
                    <a href="{{ route($val['route']) }}" class="{{ 'inline-flex items-center w-full font-semibold transition duration-150 hover:text-dark-text dark:hover:text-light-text' . (request()->routeIs($val['route']) ? ' text-dark-text dark:text-light-text' : '') }}">
                        {{ $page }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>