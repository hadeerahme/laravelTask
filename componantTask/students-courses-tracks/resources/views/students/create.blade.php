@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Add Student</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="track_id" class="form-label">Track:</label>
                    <select name="track_id" id="track_id" class="form-select" required>
                        @foreach ($tracks as $track)
                            <option value="{{ $track->id }}">{{ $track->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="courses" class="form-label">Courses:</label>
                    <select name="courses[]" id="courses" class="form-select" multiple required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection