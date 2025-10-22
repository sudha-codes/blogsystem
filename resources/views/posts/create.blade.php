@extends('layouts.app')
@section('content')
<h3>Create Post</h3>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3"><label>Title</label><input name="title" class="form-control" required></div>
  <div class="mb-3"><label>Content</label><textarea name="content" class="form-control" rows="5" required></textarea></div>
  <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-select" required>
      @foreach($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Tags</label><br>
    @foreach($tags as $t)
      <label class="me-2"><input type="checkbox" name="tags[]" value="{{ $t->id }}"> {{ $t->name }}</label>
    @endforeach
  </div>
  <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control" accept="image/*"></div>
  <button class="btn btn-success">Publish</button>
</form>
@endsection
