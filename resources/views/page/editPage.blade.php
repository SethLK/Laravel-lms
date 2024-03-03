@include("layouts.head")
@include("layouts.navbar")

<div class="m-4 border rounded pl-4 pt-4">
    <h4>Update Page</h4>
    <form action="{{ route('update_page', ['course_id' => $course->id, 'page_id' => $page->id]) }}" method="post" class="form-container" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="form-group m-4">
            <input type="text" placeholder="Page title" class="form-control-plaintext" name="title" value="{{ $page->title }}">
        </div>
        @error('title')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group m-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="6">{{ $page->content }}</textarea>
        </div>
        @error('description')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary m-4">Update</button>
    </form>
</div>

@include("layouts.foot")
