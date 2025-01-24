@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Course Details</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <p>{{ $course->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Description:</label>
                <p>{{ $course->description }}</p>
            </div>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection