<x-user.Layout>
    <h1 class="mb-6 text-2xl font-semibold">Create School</h1>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded">
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
            <button class="bg-primary text-white rounded-lg w-full p-2 mt-6" type="submit">Create Campus</button>
        </form>
    </div>
</x-user.Layout>
