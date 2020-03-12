@extends('layouts.app')

@section('content')
  <h1>Edit a post</h1>
  <div class="form-group">
    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    {!! Form::label('content', 'Content') !!}
    {!! Form::text('content', null, ['class'=>'form-control']) !!}
    {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['PostsController@destroy', $post->id]]) !!}
    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
  </div>

@endsection
