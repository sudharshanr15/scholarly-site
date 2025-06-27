@guest
@endguest

@auth("users_admin")
<form action="/admin/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@endauth
