<h1>Update Department</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Department Name: </label>
        <input type="text" name="name" value="{{ $department['name'] }}">

        @error("name")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="">Select School: </label>
        <select name="school_id" id="">
            @foreach($schools as $school)
            <option value="{{ $school['id'] }}" @selected($department['school_id'] == $school['id'])>{{ $school['name'] }}</option>
            @endforeach
        </select>
        @error("school_id")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <input type="submit" name="submit">
</form>