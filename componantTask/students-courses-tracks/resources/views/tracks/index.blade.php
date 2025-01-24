@extends('layouts.app')

@section('content')
<div class="mt-4">
    <h1 class="text-center mb-4">Tracks</h1>
    <a href="{{ route('tracks.create') }}" class="btn btn-primary mb-3">Add Track</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tracks as $track)
                <tr>
                    <td>{{ $track->id }}</td>
                    <td>{{ $track->name }}</td>
                    <td>{{ $track->description }}</td>
                    <td>
                        <a href="{{ route('tracks.edit', $track->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tracks.destroy', $track->id) }}" method="POST" class="d-inline">
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