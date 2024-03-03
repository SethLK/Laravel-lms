@include("layouts.head")
@include("layouts.navbar")

<div class="m-4 border rounded pl-4 pt-4">
    <h4>Update Page</h4>
    <form action="{{ route('update_page', ['course_id' => $course->id, 'page_id' => $page->id]) }}" method="post" class="form-container" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group m-4">
            <label>
                <input type="text" placeholder="Page title" class="form-control-plaintext" name="title" value="{{ $page->title }}">
            </label>
        </div>
        @error('title')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group m-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="page_content" rows="6">{{ $page->content }}</textarea>
        </div>
        @error('description')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary m-4">Update</button>
    </form>
</div>

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
@include("layouts.foot")
