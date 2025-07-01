<h1>Create new Department</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Department Name: </label>
        <input type="text" name="name">

        @error("name")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="">Select School: </label>
        <select name="school_id" id="">
            @foreach($schools as $school)
            <option value="{{ $school['id'] }}">{{ $school['name'] }}</option>
            @endforeach
        </select>
        @error("school_id")
        <p>{{ $message }}</p>
        @enderror
    </div>

    <input type="submit" name="submit">
</form>


<h1>All Departments</h1>
<div>
    @foreach($departments as $department)
    <div>
        <h2>
            {{ $department["id"] . ". " . $department['name'] }}
            <a href="{{ route('department.edit', $department['id']) }}">edit</a>
        </h2>
    </div>
    @endforeach
</div>