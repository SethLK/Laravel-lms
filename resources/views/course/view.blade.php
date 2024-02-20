@include("layouts.head")

@include("layouts.navbar")
<h1>{{ $course->title }}</h1>

@if($course->instructor_id == auth()->user()->id)
    <h3> Add Pages</h3>
@else

@endif

@include("layouts.foot")
