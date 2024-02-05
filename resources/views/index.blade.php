@include("layouts.head")

@auth
    <h1>Hello {{ auth()->user()->name }}</h1>
@else
    <h1>Hello Guest</h1>
@endauth

@include("layouts.foot")
