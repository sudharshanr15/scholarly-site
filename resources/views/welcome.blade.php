@guest
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
