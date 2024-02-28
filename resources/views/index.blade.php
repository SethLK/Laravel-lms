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
    <div class="m-4">
        @foreach($courses as $course)
            <h3>{{$course->title}}</h3>
        @endforeach
        {{ $courses->links() }}
    </div>
@endauth

@include("layouts.foot")
