@extends('layouts.app')

@section('content')
  <h1>{{ $post->title }}</h1>
  <img width="30%" src="{{ $post->path }}" alt="">
  <h2>{{ $post->content }}</h2>
  <a href="{{route('posts.edit', $post->id)}}">Edit post..</a>

@endsection
