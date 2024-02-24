@include("layouts.head")

@include("layouts.navbar")
<h1>{{ $course->title }}</h1>

@if($course->instructor_id == auth()->user()->id)
    <h3>Add Pages</h3>

    <div class="m-4 border rounded pl-4 pt-4">
        <h4>Course Create</h4>
        <form action="{{ route('page.course', ['course_id' => $course->id]) }}" method="post" class="form-container">
            @csrf

            <div class="form-group m-4">
                <input type="text" placeholder="Page title" class="form-control" name="title">
                @error('title')
                <div style="color: red">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group m-4">
                <div id="editor"></div>
                <input type="hidden" name="content" value="{{ old('content') }}">
                @error('content')
                <div style="color: red">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary m-4">Create</button>
        </form>
    </div>
@else
    <!-- Display pages or other content for non-instructors -->
@endif

@foreach($pages as $page)
    <a href="">{{ $page->title }}</a>
@endforeach

@include("layouts.foot")

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Set the initial content from the hidden input
    quill.root.innerHTML = {!! json_encode(old('content')) !!};

    // Listen for changes in the Quill editor and update the hidden input
    quill.on('text-change', function() {
        document.querySelector('input[name="content"]').value = quill.root.innerHTML;
    });

</script>
