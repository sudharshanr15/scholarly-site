<x-user.Layout>
    <h1>Create new School</h1>

    <form action="" method="POST">
        @csrf
        <div>
            <label for="">School Name: </label>
            <input type="text" name="name">

            @error("name")
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="">Select Campus: </label>
            <select name="campus_id" id="">
                @foreach($campuses as $campus)
                <option value="{{ $campus['id'] }}">{{ $campus['name'] }}</option>
                @endforeach
            </select>
            @error("campus_id")
            <p>{{ $message }}</p>
            @enderror
        </div>

        <input type="submit" name="submit">
    </form>


    <h1>All Schools</h1>
    <div>
        @foreach($schools as $school)
        <div>
            <h2>
                {{ $school["id"] . ". " . $school['name'] }}
                <a href="{{ route('school.edit', $school['id']) }}">edit</a>
            </h2>
        </div>
        @endforeach
    </div>
</x-user.Layout>