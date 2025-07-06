<p><a href="/">Home</a></p>

<h1>Register Faculty</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Full Name: </label>
        <input type="text" name="full_name">
        @error("full_name")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Email: </label>
        <input type="email" name="email">
        @error("email")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Select Department: </label>
        <select name="department_id" id="">
            @foreach($departments as $dept)
            <option value="{{ $dept['id'] }}">{{ $dept['name'] }}</option>
            @endforeach
        </select>
        @error("department_id")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
        @error("password")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Mobile No:</label>
        <input type="text" name="mobile">
        @error("mobile")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <input type="submit" name="Submit">
</form>
<p>Already a user? <a href="/faculty/login">Login</a></p>