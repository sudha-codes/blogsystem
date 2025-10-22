@extends('layouts.app')
@section('content')
<h3>All Posts (Admin)</h3>
<table class="table">
  <thead><tr><th>Title</th><th>Author</th><th>Category</th></tr></thead>
  <tbody>
  @foreach($posts as $p)
  <tr><td>{{ $p->title }}</td><td>{{ $p->user->name }}</td><td>{{ $p->category->name }}</td></tr>
  @endforeach
  </tbody>
</table>
@endsection
