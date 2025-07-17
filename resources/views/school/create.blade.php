<x-console.layout>
    <h1 class="heading-2">School</h1>

    <div class="card">
        <h2 class="text-headline-sm font-semibold leading-none mb-6">Create School</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <x-form.label for="name">School Name</x-form.label>
                <x-form.input id="name" name="name" value="{{ old('name') }}" />
                <x-form.error name="name" />
            </div>
            <div class="mb-4">
                <x-form.label for="campus_id">Select Campus</x-form.label>
                <select
                    class="mt-2 w-full block p-2 text-sm rounded text-dark-text dark:text-light-text outline outline-gray-400 focus:outline-3 dark:outline-[#4c4f52] dark:outline-gray-700 dark:bg-[#24262d]"
                    name="campus_id"
                    id="campus_id"
                >
                    @foreach($campuses as $campus)
                    <option value="{{ $campus['id'] }}">{{ $campus['name'] }}</option>
                    @endforeach
                </select>
                <x-form.error name="campus_id" />
            </div>
            <x-button class="mt-2" type="submit">CREATE</x-button>
        </form>
    </div>
</x-console.layout>
