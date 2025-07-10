<header class="z-10 py-4 bg-light-fg dark:bg-dark-fg shadow-md">
    <div class="container flex items-center justify-between px-6 mx-auto">
        <p>search</p>
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</header>