<!-- resources/views/courses/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1 class="text-center mt-5">All Courses</h1>

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3 d-block mx-auto" style="width: 200px;">Create New Course</a>

<table class="table table-bordered w-75 m-auto">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->description }}</td>
            <td><img src="{{ $course->logo }}" alt="Course Logo" width="100"></td>
            <td>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
