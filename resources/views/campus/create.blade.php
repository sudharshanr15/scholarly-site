<x-console.layout>
    <h1 class="heading-1">Create Campus</h1>
    <div class="card">
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
            <x-button type="submit">CREATE</x-button>
        </form>
    </div>
</x-console.layout>
