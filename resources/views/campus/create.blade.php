<x-console.layout>
    <h1 class="mb-6 text-2xl font-semibold">Create Campus</h1>
    <div class="bg-light-fg dark:bg-dark-fg p-6 rounded">
        <form action="" method="POST">
            @csrf
            <div class="mb-4">
                <x-form.label for="name">Campus Name</x-form.label>
                <x-form.input id="name" name="name" value="{{ old('name') }}" />
                <x-form.error name="name" />
            </div>
            <div>
                <x-form.label for="address">Campus Address</x-form.label>
                <x-form.input id="address" name="address" value="{{ old('address') }}" />
                <x-form.error name="address" />
            </div>
            <button class="bg-primary text-white rounded-lg w-full p-2 mt-6" type="submit">Create Campus</button>
        </form>
    </div>
</x-console.layout>
