@extends('layouts.app')
@section('content')
<h3>Create Category</h3>
<form action="{{ route('categories.store') }}" method="POST">
  @csrf
  <div class="mb-3"><label>Name</label><input name="name" class="form-control" required></div>
  <button class="btn btn-success">Save</button>
</form>
@endsection
