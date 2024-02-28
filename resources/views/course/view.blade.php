@include("layouts.head")

@include("layouts.navbar")
<h1>{{ $course->title }}</h1>

@if($course->instructor_id == auth()->user()->id)
    <h3>Add Pages</h3>

    <div class="m-4 border rounded pl-4 pt-4">
        <h4>Course Create</h4>
        <form action="{{ route('page.course', ['course_id' => $course->id]) }}" method="post" class="form-container" enctype="multipart/form-data">
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
                <div class="mb-6">
                    <label class="block">
                        <span class="text-gray-700">Description</span>
                        <textarea id="editor" class="block w-full mt-1 rounded-md" name="page_content"
                                  rows="3"></textarea>
                    </label>
                    @error('page_content')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary m-4">Create</button>
        </form>
    </div>
@else
    <!-- Display pages or other content for non-instructors -->
@endif

@foreach($pages as $page)
    <div class="ml-4">
        <a href="{{ $course->id }}/page/{{ $page->id }}">{{ $page->title }}</a>
    </div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/ckeditor5-build-classic-with-image-resize@12.4.0/build/ckeditor.min.js"></script>
<script>

    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
            }
        })
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>

