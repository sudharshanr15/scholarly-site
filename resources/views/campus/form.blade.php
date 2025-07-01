<h1>Create new campus</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Campus Name: </label>
        <input type="text" name="name">

        @error("name")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Campus Address: </label>
        <input type="text" name="address">
        @error("address")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <input type="submit" name="submit">
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