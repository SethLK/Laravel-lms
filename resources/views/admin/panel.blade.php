@include("layouts.head")
<script>
    @if (session('success'))
    alert("{{ session('success') }}");
    @endif
</script>
@include("layouts.navbar")
<h1>Admin panel</h1>

<h1>Users List</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Promote</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr  scope="row">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td><a href="/promote/{{ $user->id }}">Promote</a> </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include("layouts.foot")
