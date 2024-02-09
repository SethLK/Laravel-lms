@include("layouts.head")

<nav>
    <ul>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <ul>
        @auth
            <li>
                <form action="{{ route("_logout_") }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route("login") }}">Login</a>
            </li>
        @endauth


    </ul>
</nav>
@auth
    <h1>Hello {{ auth()->user()->name }}</h1>
    <h4>Role: {{ auth()->user()->role }}</h4>
@else
    <h1>Hello</h1>
@endauth

@include("layouts.foot")
