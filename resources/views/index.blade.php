@include("layouts.head")

<script>
    @if (session('error'))
    alert("{{ session('error') }}");
    @endif
</script>

@include("layouts.navbar")

@auth
    <h1>Hello {{ auth()->user()->name }}</h1>
    <h4>Role: {{ auth()->user()->role }}</h4>
@else
    <h1>Hello</h1>
@endauth

@include("layouts.foot")
