<div id="navigation">
    <div class="nav-icon" v-on:click="showNav"></div>
    <div class="container">
        <div class="nav-logo"><a href="{{ route('home') }}">KB</a></div>
        <nav class="nav-menu">
            <a href="{{ route('home') }}">Home</a>
            @if(Auth::check())
                <a href="#">Articles</a>
                <a href="{{ route('admin.index') }}">Admin</a>
                <a href="{{ route('users.logout') }}">Logout</a>
            @else
                <a href="{{ route('users.login') }}">Login</a>
                <a href="{{ route('users.signup') }}">Signup</a>
            @endif
        </nav>
    </div>
</div>
