<p><a href="/">Home</a></p>

<h1>Register</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Full Name: </label>
        <input type="text" name="full_name">
        @error('full_name')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Email: </label>
        <input type="email" name="email">
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Mobile: </label>
        <input type="text" name="mobile_no">
        @error('mobile')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <input type="submit" name="Submit">
</form>

<p>Already a user? <a href="/admin/login">Login</a></p>