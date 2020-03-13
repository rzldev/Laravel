@extends('layouts.admin');

@section('content')

  <h1>Create Post</h1>

  <div class="row">

    {!! Form::open(['method'=>'POST', 'action'=>'PostController@store', 'files'=>true]) !!}

      {{ csrf_field() }}

      <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', null, ['class'=>'form-control', 'rows'=>3]) !!}
      </div>

      <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', [''=>'Choose category'] + $categories, null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('photo', 'Photo') !!}
        {!! Form::file('photo', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
      </div>

    {!! Form::close() !!}

  </div>

  <div class="row">

    @include('includes.form_error')

  </div>

@endsection
