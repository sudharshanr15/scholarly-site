<x-layout>
    <div class="w-full">
        <div class="container mx-auto p-4">
            <form method="GET" >
                <div class="relative flex items-center mt-2">
                    <input
                        placeholder="Search..."
                        class="block w-full py-2.5 text-dark-fg placeholder-dark-fg/70 dark:placeholder-light-fg/70 bg-light-fg border border-gray-200 rounded-lg pr-11 pl-5 dark:bg-dark-fg dark:text-light-bg dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                        name="query"
                        value="{{ request()->input("query") ?? "" }}"
                    />
                    <button type="submit" class="absolute right-0">
                        <span class="">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 mr-4"
                            >
                              <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                              />
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
            <div class="mt-8">
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">Showing {{ $articles->perPage() * ($articles->currentPage() - 1) + 1 }} to {{ min($articles->perPage() * $articles->currentPage(), $articles->total()) }} of {{ $articles->total() }} results</p>
                <div class="mt-7">
                    @foreach($articles as $article)
                        <div class="mb-7">
                            <h2>
                                <a href="{{ $article->link }}" class="text-blue-300 hover:underline">{{ $article->title }}</a>
                            </h2>
                            <p>By {{ $article->full_name }}</p>
                            <p>Last updated at: {{ $article->updated_at }}</p>
                        </div>
                    @endforeach
                    <p>
                        <a href="{{ $articles->withQueryString()->previousPageUrl() }}" class="mr-8">Previous</a>
                        <a href="{{ $articles->withQueryString()->nextPageUrl() }}">Next</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
