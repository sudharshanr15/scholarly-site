<!-- <x-layout>
    @guest('users_faculty')
    <p>
        <a href="/faculty/login">Faculty Login</a>
    </p>
    @endguest
    
    @auth
    <p>SuperUser is logged in</p>
    <form action="/maintainer/logout" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
    @endauth
    
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
</x-layout> -->
<x-layout>
    <x-user.Sidebar></x-user.Sidebar>
    <main>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo magnam, alias illo repudiandae iure iste inventore vel commodi error, ipsum accusantium. Amet quod fuga explicabo reiciendis mollitia blanditiis aliquid voluptates itaque doloremque vel soluta eius maxime excepturi, adipisci repellat odit repudiandae. Suscipit voluptas architecto quas iure itaque modi ut dicta ipsam sed, nobis ex! Distinctio sequi natus illum culpa enim dolores voluptate accusantium omnis, itaque sint explicabo in, ullam vel ipsa obcaecati illo ducimus officia ad voluptates incidunt quod ab doloremque! Rem cupiditate odit porro eligendi molestiae! Dolorem, voluptatum beatae praesentium tenetur recusandae debitis magnam. Expedita quasi laboriosam eligendi nihil vitae, recusandae corrupti voluptate repellendus neque perferendis odio architecto rem illum delectus ullam, harum error nostrum est sit ipsum. Debitis corrupti assumenda vero eaque, officiis dignissimos explicabo quidem sit qui corporis nesciunt culpa tempora adipisci alias odio illum incidunt. Minima aspernatur laudantium dolores, iusto impedit quaerat non excepturi distinctio veritatis animi culpa, laborum, molestiae assumenda consequatur nulla? Cupiditate vitae corrupti tenetur nam reiciendis, dignissimos, mollitia ipsam facere consequuntur natus consectetur tempora fugit iure provident accusantium veniam itaque amet qui? Laborum, velit officia? Quisquam libero voluptate cumque, corporis eum ipsam veniam dignissimos voluptatem sit culpa qui architecto placeat quae pariatur cupiditate!</p>
    </main>
</x-layout>