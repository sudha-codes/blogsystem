@extends('layouts.app')
@section('content')
<h3>Edit Tag</h3>
<form action="{{ route('tags.update', $tag->id) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $tag->name }}" required>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
