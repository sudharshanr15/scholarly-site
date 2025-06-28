<p><a href="/">Home</a></p>

<h1>Admin Login</h1>

<form action="" method="POST">
    @csrf
    <div>
        <label for="">Email: </label>
        <input type="email" name="email">
        @error("email")
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="">Password: </label>
        <input type="password" name="password">
    </div>

    <input type="submit" name="submit">

</form>

<p>Not registered? <a href="/admin/register">Register</a></p>