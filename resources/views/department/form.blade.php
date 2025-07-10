<x-user.Layout>
    <h1 class="mb-6 text-2xl font-semibold">Create Department</h1>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded">
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
            <button class="bg-primary text-white rounded-lg w-full p-2 mt-6" type="submit">Create Campus</button>
        </form>
    </div>
</x-user.Layout>