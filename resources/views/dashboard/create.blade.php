

<div class="m-4 border rounded pl-4 pt-4">
    <h4>Course Create</h4>
    <form action= {{ route('create.course') }} method="post" class="form-container">
        @csrf
        <div class="form-group m-4">
            <input type="text" placeholder="Course title" class="form-control-plaintext" name="title">
        </div>
        @error('title')
        <div style="color: red">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-primary m-4">Create</button>
    </form>

</div>

