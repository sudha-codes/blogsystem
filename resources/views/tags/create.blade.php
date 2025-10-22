@extends('layouts.app')
@section('content')
<h3>Create Tag</h3>
<form action="{{ route('tags.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <button class="btn btn-success">Save</button>
</form>
@endsection
