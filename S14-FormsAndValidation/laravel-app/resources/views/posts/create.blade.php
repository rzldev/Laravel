@extends('layouts.app')

@section('content')
  <h1>Create a post</h1>
  <form class="" action="/posts" method="post">
    {{csrf_field()}}
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="content" placeholder="Content">
    <button type="submit" name="submit">Submit</button>
  </form>

@endsection
