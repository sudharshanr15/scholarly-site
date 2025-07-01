<h1>Update School</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">School Name: </label>
        <input type="text" name="name" value="{{ $school['name'] }}">

        @error("name")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="">Select Campus: </label>
        <select name="campus_id" id="">
            @foreach($campuses as $campus)
            <option value="{{ $campus['id'] }}" {{ $campus['id'] == $school["id"] ? "selected" : "" }}>{{ $campus['name'] }}</option>
            @endforeach
        </select>
        @error("campus_id")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <input type="submit" name="submit">
</form>