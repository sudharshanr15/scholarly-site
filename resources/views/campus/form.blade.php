<x-user.Layout>
    <h2 class="mb-6 text-2xl font-semibold">Create new campus</h2>

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

    <h1>All Campus</h1>
    <div>
        @foreach($campuses as $campus)
        <div>
            <h2>
                {{ $campus['id'] . ". " . $campus['name'] }}
                <a href="{{ route('campus.edit', $campus['id']) }}">edit</a>
            </h2>
        </div>
        @endforeach
    </div>
</x-user.Layout>