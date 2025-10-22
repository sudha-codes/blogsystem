@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h3>Your Posts</h3>
  <a href="{{ route('posts.create') }}" class="btn btn-primary">+ New</a>
</div>
@if(session('success'))<div class="alert alert-success mt-2">{{ session('success') }}</div>@endif
<table class="table mt-3">
  <thead><tr><th>Title</th><th>Category</th><th>Actions</th></tr></thead>
  <tbody>
  @foreach($posts as $post)
  <tr>
    <td>{{ $post->title }}</td>
    <td>{{ $post->category->name }}</td>
    <td>
      <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('posts.destroy',$post->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection
