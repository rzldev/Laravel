@extends('layouts.app')

@section('content')

  <ul>
    <h1>Posts</h1>
    @foreach($posts as $post)
      <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
    @endforeach
  </ul>

@endsection
