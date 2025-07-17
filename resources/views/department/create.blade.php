<x-console.layout>
    <h1 class="heading-2">Department</h1>

    <div class="card">
        <h2 class="text-headline-sm font-semibold leading-none mb-6">Create Department</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <x-form.label for="name">Department Name</x-form.label>
                <x-form.input id="name" name="name" value="{{ old('name') }}" />
                <x-form.error name="name" />
            </div>
            <div class="mb-4">
                <x-form.label for="school_id">Select School</x-form.label>
                <select
                    class="mt-2 w-full block p-2 text-sm rounded text-dark-text dark:text-light-text outline outline-gray-400 focus:outline-3 dark:outline-[#4c4f52] dark:outline-gray-700 dark:bg-[#24262d]"
                    name="school_id"
                    id="school_id"
                >
                    @foreach($schools as $school)
                    <option value="{{ $school['id'] }}">{{ $school['name'] }}</option>
                    @endforeach
                </select>
                <x-form.error name="school_id" />
            </div>
            <x-button class="mt-2" type="submit">CREATE</x-button>
        </form>
    </div>
</x-console.layout>
