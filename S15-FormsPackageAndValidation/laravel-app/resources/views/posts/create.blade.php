@extends('layouts.app')

@section('content')

  <h1>Create a post</h1>
  {!! Form::open(['method'=>'POST', 'action'=>'PostsController@store']) !!}
    <div class="form-group">
      {!! Form::label('title', 'Title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
      {!! Form::label('content', 'Content') !!}
      {!! Form::text('content', null, ['class'=>'form-control']) !!}
      {!! Form::submit('Create Post', ['class'=>'form-control']) !!}
    </div>
  {!! Form::close() !!}

  @if(count($errors) > 0)

    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>

  @endif

@endsection
