@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h3>Tags</h3>
  <a href="{{ route('tags.create') }}" class="btn btn-primary">+ New</a>
</div>

@if(session('success'))
<div class="alert alert-success mt-2">{{ session('success') }}</div>
@endif

<table class="table mt-3">
  <thead><tr><th>Name</th><th>Actions</th></tr></thead>
  <tbody>
  @foreach($tags as $tag)
  <tr>
    <td>{{ $tag->name }}</td>
    <td>
      <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection
