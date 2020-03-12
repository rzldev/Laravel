@extends('layouts.app')

@section('content')
  <h1>Edit a post</h1>
  <form class="" action="/posts/{{ $post->id }}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{ $post->title }}" placeholder="Title">
    <input type="text" name="content" value="{{ $post->content }}" placeholder="Content">
    <button type="submit" name="submit">Update</button>
  </form>
  <br>
  <form class="" action="/posts/{{ $post->id }}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" name="submit">Delete</button>
  </form>

@endsection
