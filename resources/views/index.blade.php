@include("layouts.head")

@auth
    <h1>Hello {{ auth()->user()->name }}</h1>
@else
    <h1>Hello</h1>
@endauth

@include("layouts.foot")
