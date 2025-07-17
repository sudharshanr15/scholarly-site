<?php

$pages = [
    "Dashboard" => [
        "route" => "console.index"
    ],
    "Campus" => [
        "route" => "campus.index"
    ],
    "School" => [
        "route" => "school.index"
    ],
    "Department" => [
        "route" => "department.index"
    ],
    "Department Users" => [
        "route" => "console.admin.index"
    ]
]

?>

<div class="relative top-0 hidden md:block transition duration-150 z-20 min-h-screen w-min">
    <aside class="absolute md:relative h-full navbar border-r">
        <div class="w-64 overflow-y-auto py-4">
            <ul class="mt-6 text-dark-text/75 dark:text-light-text/75">
                @foreach($pages as $page => $val)
                <li @class([
                        "relative text-title-sm" => true,
                        "transition duration-150 group hover:text-dark-text hover:dark:bg-dark-dp3 hover:dark:text-white" => true,
                        "dark:bg-dark-dp3/50" => request()->routeIs($val['route'])
                    ])
                >
                    @if(request()->routeIs($val['route']))
                    <span
                        class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg"
                    >
                    </span>
                    @endif
                    <a href="{{ route($val['route']) }}" class="{{ 'px-6 py-4 inline-flex items-center gap-3 w-full font-semibold' . (request()->routeIs($val['route']) ? ' text-dark-text dark:text-light-text' : '') }}">
                        <span class="">
                            <x-icon.home @class([
                                'h-6 group-hover:fill-dark-text group-hover:dark:fill-light-text' => true,
//                                "fill-dark-text dark:fill-light-text" => request()->routeIs($val['route']),
                                "fill-dark-text/55 dark:fill-light-text/50" => !request()->routeIs($val['route'])
                            ])/>
                        </span>
                        <span>
                            {{ $page }}
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
</div>
