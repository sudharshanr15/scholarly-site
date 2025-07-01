<h1>Update campus</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Campus Name: </label>
        <input type="text" name="name" value="{{ $campus['name'] }}">

        @error("name")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Campus Address: </label>
        <input type="text" name="address" value="{{ $campus['address'] }}">
        @error("address")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <input type="submit" name="submit">
</form>