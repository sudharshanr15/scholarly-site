<x-faculty.layout>
    <h1 class="mb-6 text-2xl font-semibold">Edit Article</h1>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded">
        <form action="{{ route("article.edit", $article["id"]) }}" method="POST">
            @csrf
            <div class="flex gap-4">
                <div class="mb-4 flex-1">
                    <x-form.label for="name">Article Title</x-form.label>
                    <x-form.input id="name" name="name" value="{{ $article['title'] }}" />
                    <x-form.error name="name"></x-form.error>
                </div>
                <div class="mb-4 flex-1">
                    <x-form.label for="type">Article Type</x-form.label>
                    <x-form.input id="type" name="type" value="{{ $article['type'] }}" />
                    <x-form.error name="type"></x-form.error>
                </div>
            </div>
            <div class="mb-4">
                <x-form.label for="link">Article Link</x-form.label>
                <x-form.input id="link" name="link" value="{{ $article['link'] }}" />
                <x-form.error name="link"></x-form.error>
            </div>
            <div class="flex gap-4">
                <div class="flex-1 mb-4">
                    <x-form.label for="indexed_in">Indexed in</x-form.label>
                    <x-form.input id="indexed_in" name="indexed_in" value="{{ $article['indexed_in'] }}" />
                    <x-form.error name="indexed_in"></x-form.error>
                </div>
                <div class="flex-1 mb-4">
                    <x-form.label for="published_year">Published Year</x-form.label>
                    <x-form.input id="published_year" name="published_year" value="{{ $article['published_year'] }}" />
                    <x-form.error name="published_year"></x-form.error>
                </div>
            </div>
            <div class="mb-4">
                <x-form.label for="apa">APA</x-form.label>
                <x-form.input id="apa" name="apa" value="{{ $article['apa'] }}" />
                <x-form.error name="apa"></x-form.error>
            </div>

            <button class="bg-primary text-white rounded-lg w-full p-2 mt-6" type="submit">Edit Article</button>
        </form>
    </div>
</x-faculty.layout>
