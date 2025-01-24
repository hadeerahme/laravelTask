@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Student Details</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <p>{{ $student->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <p>{{ $student->email }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Track:</label>
                <p>{{ $student->track->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Courses:</label>
                <p>
                    @foreach ($student->courses as $course)
                        <span class="badge bg-secondary">{{ $course->name }}</span>
                    @endforeach
                </p>
            </div>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection