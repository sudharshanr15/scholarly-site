@guest('users_faculty')
<p>
    <a href="/faculty/login">Faculty Login</a>
</p>
@endguest

@guest("users_admin")
<p>
    <a href="/admin/login">Admin Login</a>
</p>
@endguest

@auth("users_admin")
<form action="/admin/logout" method="POST">
    @csrf
    <button type="submit">Admin Logout</button>
</form>
@endauth

@auth("users_faculty")
<form action="/faculty/logout" method="POST">
    @csrf
    <button type="submit">Faculty Logout</button>
</form>
@endauth
