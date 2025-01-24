@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Edit Course</h1>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" id="description" class="form-control">{{ $course->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection