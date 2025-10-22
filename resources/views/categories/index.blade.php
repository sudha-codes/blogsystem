@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center">
  <h3>Categories</h3>
  <a href="{{ route('categories.create') }}" class="btn btn-primary">+ New</a>
</div>
<table class="table mt-3">
  <thead><tr><th>Name</th><th>Actions</th></tr></thead>
  <tbody>
  @foreach($categories as $c)
  <tr>
    <td>{{ $c->name }}</td>
    <td>
      <a href="{{ route('categories.edit',$c->id) }}" class="btn btn-sm btn-warning">Edit</a>
      <form action="{{ route('categories.destroy',$c->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection
