@extends('layouts.app')
@section('content')
<h2>All Blog Posts</h2>
<div class="row">
    @if($posts->isEmpty())
        <p>No posts available.</p>
    @endif
    @foreach($posts as $post)
    <div class="col-md-4 mb-3">
        <div class="card">
        @if($post->image)
            <img src="{{ asset('uploads/'.$post->image) }}" class="card-img-top">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ Str::limit($post->content,120) }}</p>
            <p class="mb-0"><small>By {{ $post->user->name }} | {{ $post->category->name }}</small></p>
        </div>
        </div>
    </div>
    @endforeach
</div>
{{ $posts->links() }}
@endsection
