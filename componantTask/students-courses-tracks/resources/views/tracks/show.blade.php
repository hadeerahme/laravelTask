@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Track Details</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <p>{{ $track->name }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label">Description:</label>
                <p>{{ $track->description }}</p>
            </div>
            <a href="{{ route('tracks.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection