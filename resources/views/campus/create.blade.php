<x-console.layout>
    <h1 class="heading-2">Campus</h1>

    <div class="card">
        <h2 class="text-headline-sm font-semibold leading-none mb-6">Create Campus</h2>
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
            <x-button class="mt-6" type="submit">CREATE</x-button>
        </form>
    </div>
</x-console.layout>
