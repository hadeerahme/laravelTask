@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Edit Student</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="track_id" class="form-label">Track:</label>
                    <select name="track_id" id="track_id" class="form-select" required>
                        @foreach ($tracks as $track)
                            <option value="{{ $track->id }}" {{ $student->track_id == $track->id ? 'selected' : '' }}>{{ $track->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="courses" class="form-label">Courses:</label>
                    <select name="courses[]" id="courses" class="form-select" multiple required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ in_array($course->id, $student->courses->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection