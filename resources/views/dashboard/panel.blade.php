@include("layouts.head")

@include("layouts.navbar")


<div class="drop-down">
    <button id="dropdown-btn" class="btn btn-primary ml-4 mt-4">Toggle Dropdown</button>
    <div class="drop hidden">
        @include("dashboard.create")
        <table id="course-table" class="table m-3">
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
                <tr scope="row">
                    <td>{{ $course->id }}</td>
                    <td><a href="/course/{{$course->id}}">{{ $course->title }}</a></td>
                    <td><a href="/edit/{{$course->id}}">Edit</a></td>
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
    </div>
</div>

<div>
    <h1>Your Progress</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach($enrolled_courses as $enrolled_course)
            <div class="col">
                <div class="card m-3" style="max-width: 464px">
                    <div class="card-body">
                        <h5 class="card-title">{{$enrolled_course->title}}</h5>
                        <p class="card-text">
                            {{ Illuminate\Support\Str::limit($course->description, 250) }}
                        </p>
                            <a href="/course/{{ $enrolled_course->id }}" class="btn btn-primary ml-4">Enter</a>
                    </div>
                </div>
            </div> <!-- Closing angle bracket was missing here -->
        @endforeach
    </div>
</div>

@include("layouts.foot")

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const dropdownBtn = document.getElementById("dropdown-btn");
        const courseTable = document.querySelector(".drop"); // Changed to ".drop"

        dropdownBtn.addEventListener("click", function () {
            courseTable.classList.toggle("hidden");
        });
    });
</script>
<style>
    .hidden {
        display: none;
    }
</style>
