@extends('layouts.app')
@section('content')
<h3>Edit Post</h3>
<form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3"><label>Title</label><input name="title" class="form-control" value="{{ $post->title }}" required></div>
  <div class="mb-3"><label>Content</label><textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea></div>
  <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-select" required>
      @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ $post->category_id == $c->id ? 'selected':'' }}>{{ $c->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Tags</label><br>
    @foreach($tags as $t)
      <label class="me-2"><input type="checkbox" name="tags[]" value="{{ $t->id }}" {{ in_array($t->id, $post->tags->pluck('id')->toArray()) ? 'checked':'' }}> {{ $t->name }}</label>
    @endforeach
  </div>
  <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control" accept="image/*">@if($post->image)<p>Current: <img src="{{ asset('uploads/'.$post->image) }}" style="max-width:120px"></p>@endif</div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
