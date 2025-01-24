@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Track</th>
                <th>Courses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->track->name }}</td>
                    <td>
                        @foreach ($student->courses as $course)
                            <span class="badge bg-secondary">{{ $course->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection