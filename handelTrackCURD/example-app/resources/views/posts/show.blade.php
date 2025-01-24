@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            track Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
            @if ($post->image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Track Image" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            @endif
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            track student Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found'}}</h5>
            <p class="card-text">Email: {{$post->user ? $post->user->email: 'not found'}}</p>
            <p class="card-text">Created At: {{$post->user ? $post->user->created_at: 'not found'}}</p>
        </div>
    </div>
@endsection