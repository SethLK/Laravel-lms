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
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach($courses as $course)
        <div class="col">
            <div class="card m-3" style="max-width: 464px">
                <div class="card-body">
                    <h5 class="card-title">{{$course->title}}</h5>
                    <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                    </p>
                    <a href="/course/{{ $course->id }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div
        @endforeach
        {{ $courses->links() }}
    </div>
@endauth

@include("layouts.foot")
