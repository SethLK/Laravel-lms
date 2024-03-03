<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>

            @auth
                <a class="nav-item nav-link active" href="/dashboard">Dashboard<span
                        class="sr-only">(current)</span></a>
                <form action="{{ route("_logout_") }}" method="post">
                    @csrf
                    <button class="nav-item nav-link btn btn-link active" type="submit">Logout</button>
                </form>
            @else
                <a class="nav-item nav-link active" href="{{ route("login") }}">Login</a>
            @endauth
        </div>
    </div>
</nav>
