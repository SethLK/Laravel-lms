@include("layouts.head")

@include("layouts.navbar")
@include("dashboard.create")



<table class="table m-3">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($courses as $course)
        <tr  scope="row">
            <td>{{ $course->id }}</td>
            <td><a href="/course/{{$course->id}}">{{ $course->title }}</a></td>
            <td><a href="/edit/{{$course->id}}">Edit</a> </td>
            <td>
                <form action="{{ route('delete_course', $course->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>



@include("layouts.foot")
