@include("layouts.head")
@include("layouts.navbar")

<div class="m-4">
    <h1>Title: {{ $course->title }}</h1>
    <p>Description: {{ $course->description }}</p>

    @if(auth()->check() && $course->instructor_id == auth()->user()->id)
        <div class="m-4 border rounded pl-4 pt-4">
            <h4>Add Pages</h4>
            <form action="{{ route('page.course', ['course_id' => $course->id]) }}" method="post" class="form-container" enctype="multipart/form-data">
                <div class="form-group m-4">
                    <input type="text" placeholder="Page title" class="form-control-plaintext" name="title">
                </div>
                @error('title')
                <div style="color: red">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group m-4">
                    <label for="description" class="form-label">page_content</label>
                    <textarea class="form-control" id="description" name="page_content" rows="6"></textarea>
                </div>
                @error('description')
                <div style="color: red">
                    {{ $message }}
                </div>
                @enderror

                <button type="submit" class="btn btn-primary m-4">Create</button>
            </form>
        </div>
    @endif

    <h3>Pages</h3>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($course->pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td><a href="{{ $course->id }}/page/{{ $page->id }}">{{ $page->title }}</a></td>
                <td>
                    <a href="{{ $course->id }}/page/{{ $page->id }}">View</a>
                    <a href="/edit/course/{{ $course->id }}/page/{{ $page->id }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include("layouts.foot")

<script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-with-image-resize@12.4.0/build/ckeditor.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    });
</script>
