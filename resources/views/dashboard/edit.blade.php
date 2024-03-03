@include("layouts.head")

<div class="m-4 border rounded pl-4 pt-4">
    <h4>Course Create</h4>
    <form action="{{ route('update_Course', ['course_id' => $course->id]) }}" class="form-container" method="POST">
    @csrf
        @method('PUT')
        <div class="form-group m-4">
            <input type="text" placeholder="Course title" class="form-control-plaintext" name="title" value="{{$course->title}}">
        </div>
        @error('title')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group m-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
