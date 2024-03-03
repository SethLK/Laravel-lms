

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

{{--        'description' => $request->description,--}}
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary m-4">Create</button>
    </form>

</div>

