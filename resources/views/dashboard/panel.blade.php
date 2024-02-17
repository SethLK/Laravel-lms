@include("layouts.head")

@include("dashboard.create")

<div class="container">
    <ul class="list-group">
        @foreach($courses as $course)
            <li class="list-group-item">
                <a href="/edit/{{$course->id}}">{{ $course->title }}</a>
            </li>
        @endforeach

    </ul>
</div>



@include("layouts.foot")
